<?php

namespace App\Application\Service;

use App\Infrastructure\Database\Connection;
use DOMDocument;
use DOMXPath;
use PDO;

class FetchPineapple
{
    private const URL =
        'https://keralapineapplemerchants.com/';

    public function run(): void
    {
        $html = $this->fetchWebsite();

        $result = $this->extractPrices(
            $html
        );

        $pdo = Connection::make();

        $stmt = $pdo->prepare(
            "
        INSERT INTO pineapple_price
        (
            type,
            min_price,
            max_price,
            avg_price,
            price_date,
            method,
            created_at
        )
        VALUES
        (
            :type,
            :min_price,
            :max_price,
            :avg_price,
            :price_date,
            :method,
            :created_at
        )
        ON DUPLICATE KEY UPDATE
            min_price = VALUES(min_price),
            max_price = VALUES(max_price),
            avg_price = VALUES(avg_price),
            method = VALUES(method),
            created_at = VALUES(created_at)
        "
        );

        foreach ($result as $row) {

            $stmt->execute([
                'type' => $row['type'],
                'min_price' => $row['min_price'],
                'max_price' => $row['max_price'],
                'avg_price' => $row['avg_price'],
                'price_date' => $row['price_date'],
                'method' => $row['method'],
                'created_at' => $row['created_at'],
            ]);

        }

        echo "Pineapple prices updated\n";
    }


    private function fetchWebsite(): string
    {
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => self::URL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_USERAGENT =>
                'Mozilla/5.0 (X11; Linux x86_64) '
                . 'AppleWebKit/537.36 Chrome/145 Safari/537.36',
        ]);

        $html = curl_exec($ch);

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $error = curl_error($ch);

        curl_close($ch);


        if (
            $html === false
            || $httpCode !== 200
        ) {

            throw new \RuntimeException(
                "Failed to fetch pineapple price. "
                . "HTTP Code: {$httpCode}. "
                . "Error: {$error}"
            );

        }

        return $html;
    }


    private function extractPrices(
        string $html
    ): array {
        libxml_use_internal_errors(true);
        $dom = new DOMDocument();
        $loaded = $dom->loadHTML(
            $html
        );
        libxml_clear_errors();

        if (!$loaded) {

            throw new \RuntimeException(
                'Failed to parse pineapple website HTML.'
            );

        }

        $xpath = new DOMXPath(
            $dom
        );


        $dateNode = $xpath->query(
            '//*[@id="today"]'
        )->item(0);


        if ($dateNode === null) {
            throw new \RuntimeException(
                'Pineapple price date not found.'
            );

        }
        $dateText = trim(
            $dateNode->textContent
        );

        $priceDate = $this->parseDate(
            $dateText
        );


        /*
         * Extract price rows
         */

        $priceRows = $xpath->query(
            '//*[@id="dvTodaysPrice"]//table//tr'
        );


        if ($priceRows->length === 0) {

            throw new \RuntimeException(
                'Pineapple price rows not found.'
            );

        }


        $result = [];

        $now = new \DateTimeImmutable('now', new \DateTimeZone('UTC'));
        $timestamp = $now->getTimestamp();


        foreach ($priceRows as $row) {

            $cells = $xpath->query(
                './td',
                $row
            );


            if ($cells->length < 2) {
                continue;
            }


            $type = strtolower(
                trim(
                    $cells->item(0)->textContent
                )
            );


            $priceText = trim(
                $cells->item(1)->textContent
            );


            preg_match_all(
                '/[\d.]+/',
                $priceText,
                $matches
            );


            if (count($matches[0]) < 2) {
                continue;
            }


            $minPrice = (float) $matches[0][0];

            $maxPrice = (float) $matches[0][1];

            $avgPrice = ($minPrice + $maxPrice) / 2;


            $result[] = [
                'type' =>
                    $type,

                'min_price' =>
                    $minPrice,

                'max_price' =>
                    $maxPrice,

                'avg_price' =>
                    $avgPrice,

                'price_date' =>
                    $priceDate,

                'method' =>
                    'cron',

                'created_at' =>
                    $timestamp,

            ];
        }
        return $result;
    }


    private function parseDate(
        string $dateText
    ): string {
        $dateText = str_replace(
            'Daily Price -',
            '',
            $dateText
        );

        $dateText = trim(
            $dateText
        );

        $dateText = preg_replace(
            '/(\d+)(st|nd|rd|th)/i',
            '$1',
            $dateText
        );

        $date = \DateTimeImmutable::createFromFormat(
            'd M, Y',
            $dateText
        );

        if ($date === false) {
            throw new \RuntimeException(
                "Unable to parse price date: {$dateText}"
            );
        }

        return $date->format(
            'Y-m-d'
        );
    }
}