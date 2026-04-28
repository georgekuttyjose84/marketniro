<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\CurrencyRate;
use App\Domain\Repository\CurrencyRateRepository;
use App\Infrastructure\Database\Connection;
use PDO;

class MariaDbCurrencyRateRepository implements CurrencyRateRepository
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

    private function map(array $row): CurrencyRate
    {
        return new CurrencyRate(
            (int) $row['id'],
            $row['base_currency'],
            $row['target_currency'],
            (float) $row['rate'],
            (new \DateTimeImmutable('@' . $row['created_at']))->setTimezone(new \DateTimeZone('Asia/Kolkata')));
    }
}
