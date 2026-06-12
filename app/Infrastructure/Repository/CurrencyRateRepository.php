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
}
