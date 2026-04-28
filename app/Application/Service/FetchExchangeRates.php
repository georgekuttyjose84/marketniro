<?php

namespace App\Application\Service;

use App\Infrastructure\Database\Connection;
use PDO;

class FetchExchangeRates
{
    public function run(): void
    {
        $apiKey = getenv('OPENEXCHANGE_APP_ID');

        if (!$apiKey) {
            throw new \RuntimeException("OPENEXCHANGE_APP_ID not configured");
        }

        $url = "https://openexchangerates.org/api/latest.json?app_id={$apiKey}";

        $response = file_get_contents($url);

        if ($response === false) {
            throw new \RuntimeException("Failed to fetch exchange rates");
        }

        $data = json_decode($response, true);

        $base = $data['base'];
        $rates = $data['rates'];

        $pdo = Connection::make();

        $now = new \DateTimeImmutable('now', new \DateTimeZone('UTC'));
        $timestamp = $now->getTimestamp();

        $values = [];
        $params = [];

        foreach ($rates as $currency => $rate) {
            $values[] = "(?, ?, ?, ?)";
            $params[] = $base;
            $params[] = $currency;
            $params[] = $rate;
            $params[] = $timestamp;
        }

        $sql = "
            INSERT INTO currency_rate 
            (base_currency, target_currency, rate, created_at)
            VALUES " . implode(',', $values);

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
    }
}
