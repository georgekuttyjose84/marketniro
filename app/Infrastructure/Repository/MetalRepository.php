<?php

namespace App\Infrastructure\Repository;

use App\Infrastructure\Database\Connection;

class MetalRepository
{
    public function latest(): array
    {
        $pdo = Connection::make();

        $stmt = $pdo->query("
            SELECT name, price, created_at
            FROM metals
            ORDER BY id DESC
            LIMIT 2
        ");

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
