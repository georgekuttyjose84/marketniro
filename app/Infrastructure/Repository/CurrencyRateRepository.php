<?php

namespace App\Infrastructure\Repository;

use App\Infrastructure\Database\Connection;

class CurrencyRateRepository
{
    public function latest(int $limit = 50): array
    {
        $pdo = Connection::make();

        $stmt = $pdo->prepare("
            SELECT base_currency, target_currency, rate, created_at
            FROM currency_rates
            ORDER BY id DESC
            LIMIT :limit
        ");

        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
