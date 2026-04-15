<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\CurrencyRate;
use App\Domain\Repository\CurrencyRateRepository;
use App\Infrastructure\Database\Connection;
use PDO;

class MariaDbCurrencyRateRepository implements CurrencyRateRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Connection::make();
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
}
