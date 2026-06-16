<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\CurrencyValue;
use App\Domain\Repository\CurrencyRateRepositoryInterface;
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

    public function find(string $base, string $target): ?CurrencyValue
    {
        // Same currency
        if ($base === $target) {
            return new CurrencyValue(
                $base,
                $target,
                1.0
            );
        }

        // USD is always 1
        $baseRate = ($base === 'USD')
            ? 1.0
            : $this->findUsdRate($base);

        $targetRate = ($target === 'USD')
            ? 1.0
            : $this->findUsdRate($target);

        if ($baseRate === null || $targetRate === null) {
            return null;
        }

        $rate = $targetRate / $baseRate;

        return new CurrencyValue(
            $base,
            $target,
            $rate
        );
    }

    private function findUsdRate(string $currency): ?float
    {
        $stmt = $this->pdo->prepare(
            "
        SELECT rate
        FROM currency_rate
        WHERE target_currency = :currency
        ORDER BY created_at DESC, id DESC
        LIMIT 1
        "
        );

        $stmt->execute([
            'currency' => $currency
        ]);

        $rate = $stmt->fetchColumn();

        if ($rate === false) {
            return null;
        }

        return (float) $rate;
    }


    public function getMainCurrency(array $mainCurrencyList): array
    {
        $placeholders = implode(',', array_fill(0, count($mainCurrencyList), '?'));

        $sql = "
        SELECT *
        FROM (
            SELECT
                cr.*,
                ROW_NUMBER() OVER (
                    PARTITION BY target_currency
                    ORDER BY id DESC
                ) AS rn
            FROM currency_rate cr
            WHERE target_currency IN ($placeholders)
        ) t
        WHERE rn <= 2
        ORDER BY target_currency, id DESC
    ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($mainCurrencyList);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
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

    public function getHistory(
        string $target,
        int $limit
    ): array
    {
        $stmt = $this->pdo->prepare(
            "SELECT created_at, rate 
                   FROM currency_rate 
                   WHERE target_currency = :target 
                   ORDER BY created_at DESC LIMIT {$limit}");

        $stmt->execute([
            'target' => $target,
        ]);

        return array_reverse(
            $stmt->fetchAll(\PDO::FETCH_ASSOC)
        );
    }

    public function getHourlyComparison(
        string $base,
        string $target
    ): array
    {
        $stmt = $this->pdo->prepare(
            "
        SELECT

            created_at,

            HOUR(
                FROM_UNIXTIME(created_at + 19800)
            ) AS hour,

            DATE(
                FROM_UNIXTIME(created_at + 19800)
            ) AS day,

            rate

        FROM
            currency_rate

        WHERE
            base_currency = :base

        AND
            target_currency = :target

        ORDER BY
            created_at DESC
        "
        );

        $stmt->execute([

            'base' => $base,

            'target' => $target

        ]);

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($rows)) {
            return [];
        }

        /*
         * Get available local dates
         */

        $dates = array_unique(
            array_column($rows, 'day')
        );

        rsort($dates);

        $today = $dates[0] ?? null;

        $yesterday = $dates[1] ?? null;

        /*
         * Get latest available local hour for TODAY
         */

        $currentHour = -1;

        foreach ($rows as $row) {

            if ($row['day'] === $today) {

                $currentHour = max(
                    $currentHour,
                    (int)$row['hour']
                );

            }

        }

        /*
         * Build lookup arrays
         */

        $todayRates = [];

        $yesterdayRates = [];

        foreach ($rows as $row) {

            $hour = sprintf(
                "%02d:00",
                $row['hour']
            );

            if ($row['day'] === $today) {

                if (!isset($todayRates[$hour])) {

                    $todayRates[$hour] = (float)$row['rate'];

                }

            }

            if ($row['day'] === $yesterday) {

                if (!isset($yesterdayRates[$hour])) {

                    $yesterdayRates[$hour] = (float)$row['rate'];

                }

            }

        }

        /*
         * Build comparison table
         */

        $result = [];

        for ($i = 0; $i < 24; $i++) {

            $hour = sprintf(
                "%02d:00",
                $i
            );

            $result[] = [

                'time' => $hour,

                'yesterday' => $yesterdayRates[$hour] ?? null,

                'today' => $i <= $currentHour
                    ? ($todayRates[$hour] ?? null)
                    : null

            ];
        }
        return $result;
    }
}
