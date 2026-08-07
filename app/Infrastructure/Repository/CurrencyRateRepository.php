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
    ): array {

        // Existing behaviour for USD base
        if ($base === 'USD') {

            $stmt = $this->pdo->prepare("
            SELECT
                created_at,
                HOUR(FROM_UNIXTIME(created_at + 19800)) AS hour,
                DATE(FROM_UNIXTIME(created_at + 19800)) AS day,
                rate
            FROM currency_rate
            WHERE base_currency = 'USD'
            AND target_currency = :target
            ORDER BY created_at DESC
        ");

            $stmt->execute([
                'target' => $target
            ]);

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        } else {

            // Get USD -> Base
            $stmtBase = $this->pdo->prepare("
            SELECT
                created_at,
                HOUR(FROM_UNIXTIME(created_at + 19800)) AS hour,
                DATE(FROM_UNIXTIME(created_at + 19800)) AS day,
                rate
            FROM currency_rate
            WHERE base_currency = 'USD'
            AND target_currency = :base
            ORDER BY created_at DESC
        ");

            $stmtBase->execute([
                'base' => $base
            ]);

            $baseRows = $stmtBase->fetchAll(PDO::FETCH_ASSOC);

            // Get USD -> Target
            $stmtTarget = $this->pdo->prepare("
            SELECT
                created_at,
                HOUR(FROM_UNIXTIME(created_at + 19800)) AS hour,
                DATE(FROM_UNIXTIME(created_at + 19800)) AS day,
                rate
            FROM currency_rate
            WHERE base_currency = 'USD'
            AND target_currency = :target
            ORDER BY created_at DESC
        ");

            $stmtTarget->execute([
                'target' => $target
            ]);

            $targetRows = $stmtTarget->fetchAll(PDO::FETCH_ASSOC);

            $baseLookup = [];

            foreach ($baseRows as $row) {
                $baseLookup[$row['created_at']] = $row;
            }

            $rows = [];

            foreach ($targetRows as $row) {

                if (!isset($baseLookup[$row['created_at']])) {
                    continue;
                }

                $usdBase = (float)$baseLookup[$row['created_at']]['rate'];

                if ($usdBase == 0) {
                    continue;
                }

                $rows[] = [
                    'created_at' => $row['created_at'],
                    'hour'       => $row['hour'],
                    'day'        => $row['day'],
                    'rate'       => (float)$row['rate'] / $usdBase
                ];
            }
        }

        if (empty($rows)) {
            return [];
        }

        $dates = array_unique(array_column($rows, 'day'));
        rsort($dates);

        $today = $dates[0] ?? null;
        $yesterday = $dates[1] ?? null;

        $currentHour = -1;

        foreach ($rows as $row) {

            if ($row['day'] === $today) {

                $currentHour = max(
                    $currentHour,
                    (int)$row['hour']
                );

            }
        }

        $todayRates = [];
        $yesterdayRates = [];

        foreach ($rows as $row) {

            $hour = sprintf("%02d:00", $row['hour']);

            if ($row['day'] === $today && !isset($todayRates[$hour])) {
                $todayRates[$hour] = (float)$row['rate'];
            }

            if ($row['day'] === $yesterday && !isset($yesterdayRates[$hour])) {
                $yesterdayRates[$hour] = (float)$row['rate'];
            }
        }

        $result = [];

        for ($i = 0; $i < 24; $i++) {

            $hour = sprintf("%02d:00", $i);

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

    public function getGoldCard(): array
    {
        $sql = "
        SELECT
            DATE(FROM_UNIXTIME(usd_inr.created_at + 19800)) AS price_date,
            ROUND(((usd_inr.rate / usd_xau.rate) / 31.1034768), 2) AS price_1g
        FROM
        (
            SELECT
                rate,
                created_at
            FROM currency_rate
            WHERE base_currency = 'USD'
              AND target_currency = 'INR'
            ORDER BY created_at DESC
            LIMIT 1
        ) AS usd_inr

        CROSS JOIN
        (
            SELECT
                rate
            FROM currency_rate
            WHERE base_currency = 'USD'
              AND target_currency = 'XAU'
            ORDER BY created_at DESC
            LIMIT 1
        ) AS usd_xau
    ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

//        ROUND((((usd_inr.rate / usd_xau.rate) / 31.1034768) * 8), 2) AS price_8g,
//            ROUND((((usd_inr.rate / usd_xau.rate) / 31.1034768) * 10), 2) AS price_10g,
//            ROUND((((usd_inr.rate / usd_xau.rate) / 31.1034768) * 100), 2) AS price_100g

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getGoldCardIndicator(): array
    {

        $sql = "
        WITH usd_inr AS
            (
                SELECT
                    rate,
                    DATE(FROM_UNIXTIME(created_at + 19800)) AS price_date,
                    ROW_NUMBER() OVER (
                        PARTITION BY DATE(FROM_UNIXTIME(created_at + 19800))
                        ORDER BY created_at DESC
                    ) AS rn
                FROM currency_rate
                WHERE base_currency = 'USD'
                  AND target_currency = 'INR'
            ),
            usd_xau AS
            (
                SELECT
                    rate,
                    DATE(FROM_UNIXTIME(created_at + 19800)) AS price_date,
                    ROW_NUMBER() OVER (
                        PARTITION BY DATE(FROM_UNIXTIME(created_at + 19800))
                        ORDER BY created_at DESC
                    ) AS rn
                FROM currency_rate
                WHERE base_currency = 'USD'
                  AND target_currency = 'XAU'
            )
            
            SELECT
                ROUND((usd_inr.rate / usd_xau.rate) / 31.1034768, 2) AS price_information,
                usd_inr.price_date
            FROM usd_inr
            JOIN usd_xau
                ON usd_inr.price_date = usd_xau.price_date
            WHERE
                usd_inr.rn = 1
                AND usd_xau.rn = 1
            ORDER BY usd_inr.price_date DESC
            LIMIT 2;
    ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();



        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function getSilverCard(): array
    {
        $sql = "
        SELECT
            DATE(FROM_UNIXTIME(usd_inr.created_at + 19800)) AS price_date,
            ROUND(((usd_inr.rate / usd_xag.rate) / 31.1034768), 2) AS price_1g
        FROM
        (
            SELECT
                rate,
                created_at
            FROM currency_rate
            WHERE base_currency = 'USD'
              AND target_currency = 'INR'
            ORDER BY created_at DESC
            LIMIT 1
        ) AS usd_inr

        CROSS JOIN
        (
            SELECT
                rate
            FROM currency_rate
            WHERE base_currency = 'USD'
              AND target_currency = 'XAG'
            ORDER BY created_at DESC
            LIMIT 1
        ) AS usd_xag
    ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getSilverCardIndicator(): array
    {
        $sql = "
        WITH usd_inr AS
        (
            SELECT
                rate,
                DATE(FROM_UNIXTIME(created_at + 19800)) AS price_date,
                ROW_NUMBER() OVER (
                    PARTITION BY DATE(FROM_UNIXTIME(created_at + 19800))
                    ORDER BY created_at DESC
                ) AS rn
            FROM currency_rate
            WHERE base_currency = 'USD'
              AND target_currency = 'INR'
        ),
        usd_xag AS
        (
            SELECT
                rate,
                DATE(FROM_UNIXTIME(created_at + 19800)) AS price_date,
                ROW_NUMBER() OVER (
                    PARTITION BY DATE(FROM_UNIXTIME(created_at + 19800))
                    ORDER BY created_at DESC
                ) AS rn
            FROM currency_rate
            WHERE base_currency = 'USD'
              AND target_currency = 'XAG'
        )

        SELECT
            ROUND((usd_inr.rate / usd_xag.rate) / 31.1034768, 2) AS price_information,
            usd_inr.price_date
        FROM usd_inr
        JOIN usd_xag
            ON usd_inr.price_date = usd_xag.price_date
        WHERE
            usd_inr.rn = 1
            AND usd_xag.rn = 1
        ORDER BY usd_inr.price_date DESC
        LIMIT 2;
    ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


}
