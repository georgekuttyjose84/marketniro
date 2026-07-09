<?php

namespace App\Application\Service;

use App\Infrastructure\Database\Connection;
use DateTimeImmutable;
use DateTimeZone;
use DOMDocument;
use DOMXPath;
use RuntimeException;

class FetchRubberPrice
{
    private const URL = 'https://rubberboard.gov.in/public';

    public function run(): void
    {
        $html = $this->fetchPage();

        $data = $this->parsePrices($html);

        if (empty($data)) {
            throw new RuntimeException(
                'No rubber prices were found.'
            );
        }

        $this->savePrices($data);

        echo PHP_EOL;
        echo "Rubber prices updated" . PHP_EOL;
        echo "Rows processed: " . count($data) . PHP_EOL;
    }

    private function fetchPage(): string
    {
        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => self::URL,

            CURLOPT_RETURNTRANSFER => true,

            CURLOPT_FOLLOWLOCATION => true,

            CURLOPT_TIMEOUT => 30,

            CURLOPT_CONNECTTIMEOUT => 10,

            CURLOPT_USERAGENT =>
                'Mozilla/5.0 (X11; Linux x86_64) '
                . 'AppleWebKit/537.36 '
                . 'Chrome/145 Safari/537.36',
        ]);

        $html = curl_exec($ch);

        $httpCode = curl_getinfo(
            $ch,
            CURLINFO_HTTP_CODE
        );

        $error = curl_error($ch);

        curl_close($ch);

        if (
            $html === false
            || $httpCode !== 200
        ) {
            throw new RuntimeException(
                "Failed to fetch Rubber Board website. "
                . "HTTP: {$httpCode}. "
                . "Error: {$error}"
            );
        }

        return $html;
    }

    private function parsePrices(
        string $html
    ): array {
        libxml_use_internal_errors(true);

        $dom = new DOMDocument();

        $loaded = $dom->loadHTML(
            $html
        );

        libxml_clear_errors();

        if ($loaded === false) {
            throw new RuntimeException(
                'Failed to parse Rubber Board HTML.'
            );
        }

        $xpath = new DOMXPath($dom);

        $priceDate = $this->extractPriceDate(
            $xpath
        );

        $createdAt = (
        new DateTimeImmutable(
            $priceDate . ' 10:00:00',
            new DateTimeZone(
                'Asia/Kolkata'
            )
        )
        )->getTimestamp();

        $markets = [
            'loc1' => [
                'place' => 'kottayam',
                'market_type' => 'domestic',
            ],

            'loc2' => [
                'place' => 'kochi',
                'market_type' => 'domestic',
            ],

            'loc3' => [
                'place' => 'agartala',
                'market_type' => 'domestic',
            ],

            'exloc1' => [
                'place' => 'bangkok',
                'market_type' => 'international',
            ],

            'exloc2' => [
                'place' => 'kuala_lumpur',
                'market_type' => 'international',
            ],
        ];

        $result = [];

        echo PHP_EOL;
        echo "Price date: {$priceDate}" . PHP_EOL;
        echo PHP_EOL;

        foreach (
            $markets as $tabId => $market
        ) {
            /*
             * Do not use:
             *
             * //table//tbody//tr
             *
             * DOMDocument may remove or restructure
             * the tbody element.
             */
            $rows = $xpath->query(
                "//*[@id='{$tabId}']//table//tr"
            );

            echo $tabId
                . ' rows found: '
                . $rows->length
                . PHP_EOL;

            foreach ($rows as $row) {
                $cells = $xpath->query(
                    './td',
                    $row
                );

                if ($cells->length < 3) {
                    continue;
                }

                $gradeText = trim(
                    $cells->item(0)->textContent
                );

                $rupeeText = trim(
                    $cells->item(1)->textContent
                );

                $dollarText = trim(
                    $cells->item(2)->textContent
                );

                $grade = $this->normalizeGrade(
                    $gradeText
                );

                if ($grade === null) {
                    continue;
                }

                $amountInRupee =
                    $this->extractPrice(
                        $rupeeText
                    );

                $amountInDollar =
                    $this->extractPrice(
                        $dollarText
                    );

                if (
                    $amountInRupee === null
                    || $amountInDollar === null
                ) {
                    continue;
                }

                $result[] = [
                    'amount_in_rupee' =>
                        $amountInRupee,

                    'amount_in_dollar' =>
                        $amountInDollar,

                    'grade' =>
                        $grade,

                    'place' =>
                        $market['place'],

                    'market_type' =>
                        $market['market_type'],

                    'price_date' =>
                        $priceDate,

                    'method' =>
                        'cron',

                    'created_at' =>
                        $createdAt,
                ];
            }
        }

        return $result;
    }

    private function extractPriceDate(
        DOMXPath $xpath
    ): string {
        $headings = $xpath->query(
            "//div[contains(@class, 'dark-green-head')]//h4"
        );

        foreach ($headings as $heading) {
            $text = trim(
                $heading->textContent
            );

            if (
                preg_match(
                    '/on\s+(\d{2}-\d{2}-\d{4})/i',
                    $text,
                    $matches
                )
            ) {
                $date =
                    DateTimeImmutable::createFromFormat(
                        'd-m-Y',
                        $matches[1]
                    );

                if ($date !== false) {
                    return $date->format(
                        'Y-m-d'
                    );
                }
            }
        }

        throw new RuntimeException(
            'Rubber price date not found.'
        );
    }

    private function normalizeGrade(
        string $grade
    ): ?string {

        $grade = html_entity_decode(
            $grade,
            ENT_QUOTES | ENT_HTML5,
            'UTF-8'
        );

        $grade = strtoupper(
            trim($grade)
        );

        if (preg_match('/\bRSS1\b/', $grade)) {
            return 'rss1';
        }

        if (preg_match('/\bRSS2\b/', $grade)) {
            return 'rss2';
        }

        if (preg_match('/\bRSS3\b/', $grade)) {
            return 'rss3';
        }

        if (preg_match('/\bRSS4\b/', $grade)) {
            return 'rss4';
        }

        if (preg_match('/\bRSS5\b/', $grade)) {
            return 'rss5';
        }

        if (preg_match('/\bISNR\s*20\b/', $grade)) {
            return 'isnr20';
        }

        if (preg_match('/\bSMR\s*20\b/', $grade)) {
            return 'smr20';
        }

        if (str_contains($grade, 'LATEX')) {
            return 'latex_60';
        }

        return null;
    }

    private function extractPrice(
        string $value
    ): ?float {
        $value = str_replace(
            ',',
            '',
            trim($value)
        );

        if (
            !preg_match(
                '/\d+(?:\.\d+)?/',
                $value,
                $matches
            )
        ) {
            return null;
        }

        return (float) $matches[0];
    }

    private function savePrices(
        array $data
    ): void {
        $pdo = Connection::make();

        $sql = "
            INSERT INTO rubber_price (
                amount_in_rupee,
                amount_in_dollar,
                grade,
                place,
                market_type,
                price_date,
                method,
                created_at
            )
            VALUES (
                :amount_in_rupee,
                :amount_in_dollar,
                :grade,
                :place,
                :market_type,
                :price_date,
                :method,
                :created_at
            )
            ON DUPLICATE KEY UPDATE
                amount_in_rupee =
                    VALUES(amount_in_rupee),

                amount_in_dollar =
                    VALUES(amount_in_dollar),

                market_type =
                    VALUES(market_type),

                method =
                    VALUES(method),

                created_at =
                    VALUES(created_at)
        ";

        $stmt = $pdo->prepare(
            $sql
        );

        foreach ($data as $row) {
            $stmt->execute([
                'amount_in_rupee' =>
                    $row['amount_in_rupee'],

                'amount_in_dollar' =>
                    $row['amount_in_dollar'],

                'grade' =>
                    $row['grade'],

                'place' =>
                    $row['place'],

                'market_type' =>
                    $row['market_type'],

                'price_date' =>
                    $row['price_date'],

                'method' =>
                    $row['method'],

                'created_at' =>
                    $row['created_at'],
            ]);
        }
    }
}