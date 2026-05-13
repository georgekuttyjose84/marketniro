<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\CurrencyRate;
use App\Domain\Repository\CurrencyRateRepositoryInterface;
use DateTimeImmutable;
use DateTimeZone;
use PDO;

class CurrencyRateRepository implements CurrencyRateRepositoryInterface
{
    public function __construct(private PDO $pdo) {}

    public function all(): array
    {
    	$results = $this->pdo
        	->query("SELECT * FROM currency_rate  ORDER BY created_at DESC LIMIT 300")
        	->fetchAll(PDO::FETCH_ASSOC);

        $objectsList = [];

        foreach($results as $result){
            $objectsList[] = $this->map($result);
        }

        return $objectsList;
    }

    public function save(CurrencyRate $rate): void
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO currency_rate (base_currency, target_currency, rate)
             VALUES (:base, :target, :rate)"
        );

        $stmt->execute([
            'base' => $rate->baseCurrency,
            'target' => $rate->targetCurrency,
            'rate' => $rate->rate
        ]);
    }

    public function find(string $base, string $target): ?CurrencyRate
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM currency_rate
             WHERE base_currency = :base AND target_currency = :target
             ORDER BY created_at DESC
             LIMIT 1"
        );

        $stmt->execute([
            'base' => $base,
            'target' => $target
        ]);

        $row = $stmt->fetch();

        if (!$row) {
            return null;
        }

        return new CurrencyRate(
            $row['base_currency'],
            $row['target_currency'],
            (float)$row['rate']
        );
    }


    public function getRowsSince(int $sinceEpoch): array
    {
        $stmt = $this->pdo->prepare(
            "SELECT id, base_currency, target_currency, rate, created_at
             FROM currency_rate
             WHERE created_at >= :since
             ORDER BY created_at ASC, id ASC"
        );

        $stmt->execute([
            'since' => $sinceEpoch,
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buildChartData(array $pairs, string $period): array
    {
        $since = $this->periodToSince($period);
        $rows = $this->getRowsSince($since);

        $snapshots = [];
        foreach ($rows as $row) {
            $ts = (int) $row['created_at'];
            $base = strtoupper(trim((string) $row['base_currency']));
            $target = strtoupper(trim((string) $row['target_currency']));
            $rate = (float) $row['rate'];

            $snapshots[$ts][$base][$target] = $rate;
        }

        ksort($snapshots);

        $labels = [];
        $series = [];

        foreach ($pairs as $pair) {
            $key = $pair['from'] . '_' . $pair['to'];
            $series[$key] = [];
        }

        foreach ($snapshots as $ts => $ratesByBase) {
            $labels[] = (new DateTimeImmutable('@' . $ts))
                ->setTimezone(new DateTimeZone('Asia/Kolkata'))
                ->format('d M H:i');

            foreach ($pairs as $pair) {
                $from = strtoupper($pair['from']);
                $to = strtoupper($pair['to']);
                $key = $from . '_' . $to;

                $series[$key][] = $this->resolvePairRate($ratesByBase, $from, $to);
            }
        }

        return [
            'labels' => $labels,
            'series' => $series,
        ];
    }

    public function buildIndicators(array $pairs, string $period): array
    {
        $chartData = $this->buildChartData($pairs, $period);
        $result = [];

        foreach ($pairs as $pair) {
            $key = $pair['from'] . '_' . $pair['to'];
            $values = $chartData['series'][$key] ?? [];

            $filtered = array_values(array_filter($values, static fn ($v) => $v !== null));

            $latest = $filtered[count($filtered) - 1] ?? null;
            $previous = $filtered[count($filtered) - 2] ?? null;

            $change = null;
            $changePercent = null;
            $direction = 'flat';

            if ($latest !== null && $previous !== null) {
                $change = round($latest - $previous, 6);

                if ((float) $previous != 0.0) {
                    $changePercent = round(($change / $previous) * 100, 2);
                }

                if ($change > 0) {
                    $direction = 'up';
                } elseif ($change < 0) {
                    $direction = 'down';
                }
            }

            $result[$key] = [
                'from' => $pair['from'],
                'to' => $pair['to'],
                'latest' => $latest,
                'previous' => $previous,
                'change' => $change,
                'change_percent' => $changePercent,
                'direction' => $direction,
            ];
        }

        return $result;
    }

    private function resolvePairRate(array $ratesByBase, string $from, string $to): ?float
    {
        $from = strtoupper($from);
        $to = strtoupper($to);

        // 1) direct pair: FROM -> TO
        if (isset($ratesByBase[$from][$to]) && (float) $ratesByBase[$from][$to] > 0) {
            return round((float) $ratesByBase[$from][$to], 6);
        }

        // 2) reverse pair: TO -> FROM
        if (isset($ratesByBase[$to][$from]) && (float) $ratesByBase[$to][$from] > 0) {
            return round(1 / (float) $ratesByBase[$to][$from], 6);
        }

        // 3) cross via common base currency:
        // if base->from and base->to both exist, conversion = base->to / base->from
        foreach ($ratesByBase as $base => $targets) {
            if (
                isset($targets[$from], $targets[$to]) &&
                (float) $targets[$from] > 0
            ) {
                return round(((float) $targets[$to] / (float) $targets[$from]), 6);
            }
        }

        return null;
    }

    private function periodToSince(string $period): int
    {
        return match ($period) {
            '1h' => time() - 3600,
            '6h' => time() - 6 * 3600,
            '12h' => time() - 12 * 3600,
            '24h', '1d' => time() - 24 * 3600,
            '7d' => time() - 7 * 24 * 3600,
            '1m' => time() - 30 * 24 * 3600,
            default => time() - 24 * 3600,
        };
    }
}
