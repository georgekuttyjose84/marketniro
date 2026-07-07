<?php

declare(strict_types=1);

use App\Infrastructure\Database\Connection;

require_once __DIR__ . '/../vendor/autoload.php';


$url = 'https://keralapineapplemerchants.com/';

$timezone = new \DateTimeZone(
    'Asia/Kolkata'
);


/*
 * Date range:
 *
 * 2026-01-01
 *
 * through:
 *
 * 2026-07-07
 */

$startDate = new \DateTimeImmutable(
    '2026-01-01',
    $timezone
);

$endDate = new \DateTimeImmutable(
    '2026-07-07',
    $timezone
);


/*
 * Database connection.
 */

$pdo = Connection::make();


/*
 * Prepare INSERT only once.
 */

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

        min_price =
            VALUES(min_price),

        max_price =
            VALUES(max_price),

        avg_price =
            VALUES(avg_price),

        method =
            VALUES(method),

        created_at =
            VALUES(created_at)
    "
);


/*
 * Helper:
 *
 * Fetch one web page.
 */

$fetchPage = function (
    string $url,
    ?array $postData = null
): string {

    $ch = curl_init();

    $options = [

        CURLOPT_URL =>
            $url,

        CURLOPT_RETURNTRANSFER =>
            true,

        CURLOPT_FOLLOWLOCATION =>
            true,

        CURLOPT_TIMEOUT =>
            30,

        CURLOPT_CONNECTTIMEOUT =>
            10,

        CURLOPT_SSL_VERIFYPEER =>
            false,

        CURLOPT_SSL_VERIFYHOST =>
            false,

        CURLOPT_USERAGENT =>
            'Mozilla/5.0 (X11; Linux x86_64) '
            . 'AppleWebKit/537.36 '
            . 'Chrome/145 Safari/537.36',

    ];


    if ($postData !== null) {

        $options[CURLOPT_POST] = true;

        $options[CURLOPT_POSTFIELDS] =
            http_build_query(
                $postData
            );

        $options[CURLOPT_HTTPHEADER] = [

            'Content-Type: application/x-www-form-urlencoded',

        ];

    }


    curl_setopt_array(
        $ch,
        $options
    );


    $response = curl_exec(
        $ch
    );


    $httpCode = curl_getinfo(
        $ch,
        CURLINFO_HTTP_CODE
    );


    $error = curl_error(
        $ch
    );


    curl_close(
        $ch
    );


    if (
        $response === false
        || $httpCode !== 200
    ) {

        throw new \RuntimeException(
            "Website request failed. "
            . "HTTP: {$httpCode}. "
            . "Error: {$error}"
        );

    }


    return $response;
};


/*
 * Helper:
 *
 * Convert HTML into XPath.
 */

$createXPath = function (
    string $html
): \DOMXPath {

    libxml_use_internal_errors(
        true
    );


    $dom = new \DOMDocument();


    $dom->loadHTML(
        $html
    );


    libxml_clear_errors();


    return new \DOMXPath(
        $dom
    );
};


/*
 * Statistics.
 */

$totalDates = 0;

$successDates = 0;

$failedDates = 0;

$savedRows = 0;

$failed = [];


/*
 * Start message.
 */

echo "\n";

echo "Pineapple historical price backfill\n";

echo "From: ";

echo $startDate->format(
    'Y-m-d'
);

echo "\n";

echo "To: ";

echo $endDate->format(
    'Y-m-d'
);

echo "\n\n";


/*
 * Loop through every date.
 */

$currentDate = $startDate;


while ($currentDate <= $endDate) {

    $totalDates++;


    /*
     * IMPORTANT:
     *
     * Website expects MM/DD/YYYY.
     *
     * Example:
     *
     * January 2, 2026
     *
     * 01/02/2026
     */

    $requestDate = $currentDate->format(
        'm/d/Y'
    );


    /*
     * Database expects:
     *
     * 2026-01-02
     */

    $priceDate = $currentDate->format(
        'Y-m-d'
    );


    /*
     * Historical created_at:
     *
     * Same price date at 10:00 AM IST.
     */

    $createdAt = $currentDate
        ->setTime(
            10,
            0,
            0
        )
        ->getTimestamp();


    echo "[{$priceDate}] ";

    echo "Request date: {$requestDate} ";

    echo "Fetching... ";


    try {

        /*
         * STEP 1:
         *
         * GET page for fresh ASP.NET fields.
         */

        $html = $fetchPage(
            $url
        );


        $xpath = $createXPath(
            $html
        );


        /*
         * Helper for hidden form fields.
         */

        $getInputValue = function (
            string $name
        ) use ($xpath): string {

            $node = $xpath->query(
                "//input[@name='{$name}']"
            )->item(0);


            if ($node === null) {

                throw new \RuntimeException(
                    "Missing form field: {$name}"
                );

            }


            return $node->getAttribute(
                'value'
            );
        };


        /*
         * STEP 2:
         *
         * Read fresh ASP.NET fields.
         */

        $viewState = $getInputValue(
            '__VIEWSTATE'
        );


        $viewStateGenerator = $getInputValue(
            '__VIEWSTATEGENERATOR'
        );


        $eventValidation = $getInputValue(
            '__EVENTVALIDATION'
        );


        /*
         * STEP 3:
         *
         * Submit historical date.
         */

        $postData = [

            '__VIEWSTATE' =>
                $viewState,

            '__VIEWSTATEGENERATOR' =>
                $viewStateGenerator,

            '__EVENTVALIDATION' =>
                $eventValidation,

            'datepicker' =>
                $requestDate,

            'btnSearch' =>
                'Submit',

        ];


        $response = $fetchPage(
            $url,
            $postData
        );


        /*
         * STEP 4:
         *
         * Parse historical result.
         */

        $xpath = $createXPath(
            $response
        );


        $rows = $xpath->query(
            '//*[@id="dvSearch"]//table//tr'
        );


        if ($rows->length === 0) {

            throw new \RuntimeException(
                "No historical price found"
            );

        }


        $prices = [];


        foreach ($rows as $row) {

            $cells = $xpath->query(
                './td',
                $row
            );


            if ($cells->length < 2) {

                continue;

            }


            $type = strtolower(
                trim(
                    $cells
                        ->item(0)
                        ->textContent
                )
            );


            /*
             * Only accept:
             *
             * green
             * ripe
             */

            if (
                $type !== 'green'
                && $type !== 'ripe'
            ) {

                continue;

            }


            $priceText = trim(
                $cells
                    ->item(1)
                    ->textContent
            );


            preg_match_all(
                '/[\d.]+/',
                $priceText,
                $matches
            );


            if (
                count($matches[0]) < 2
            ) {

                continue;

            }


            $minPrice = (float)
            $matches[0][0];


            $maxPrice = (float)
            $matches[0][1];


            $prices[] = [

                'type' =>
                    $type,

                'min_price' =>
                    $minPrice,

                'max_price' =>
                    $maxPrice,

                'avg_price' =>
                    (
                        $minPrice
                        + $maxPrice
                    ) / 2,

                'price_date' =>
                    $priceDate,

                'method' =>
                    'manual',

                'created_at' =>
                    $createdAt,

            ];

        }


        /*
         * We expect exactly:
         *
         * 1 Green row
         * 1 Ripe row
         */

        if (count($prices) !== 2) {

            throw new \RuntimeException(
                "Expected 2 prices, found "
                . count($prices)
            );

        }


        /*
         * STEP 5:
         *
         * Save both rows.
         */

        $pdo->beginTransaction();


        try {

            foreach ($prices as $price) {

                $stmt->execute([

                    'type' =>
                        $price['type'],

                    'min_price' =>
                        $price['min_price'],

                    'max_price' =>
                        $price['max_price'],

                    'avg_price' =>
                        $price['avg_price'],

                    'price_date' =>
                        $price['price_date'],

                    'method' =>
                        $price['method'],

                    'created_at' =>
                        $price['created_at'],

                ]);


                $savedRows++;

            }


            $pdo->commit();

        } catch (\Throwable $e) {

            if ($pdo->inTransaction()) {

                $pdo->rollBack();

            }

            throw $e;

        }


        $successDates++;


        echo "SAVED";


        foreach ($prices as $price) {

            echo " | ";

            echo ucfirst(
                $price['type']
            );

            echo ": ₹";

            echo $price['min_price'];

            echo " - ₹";

            echo $price['max_price'];

        }


        echo "\n";

    } catch (\Throwable $e) {

        $failedDates++;


        $failed[] = [

            'date' =>
                $priceDate,

            'request_date' =>
                $requestDate,

            'error' =>
                $e->getMessage(),

        ];


        echo "FAILED: ";

        echo $e->getMessage();

        echo "\n";

    }


    /*
     * Wait one second before the next request.
     */

    sleep(1);


    /*
     * Move to next date.
     */

    $currentDate = $currentDate->modify(
        '+1 day'
    );

}


/*
 * Final summary.
 */

echo "\n";

echo "====================================\n";

echo "BACKFILL COMPLETED\n";

echo "====================================\n";

echo "Total dates: {$totalDates}\n";

echo "Successful dates: {$successDates}\n";

echo "Failed dates: {$failedDates}\n";

echo "Saved rows: {$savedRows}\n";


if ($failed !== []) {

    echo "\n";

    echo "Failed dates:\n";


    foreach ($failed as $failure) {

        echo $failure['date'];

        echo " (";

        echo $failure['request_date'];

        echo ") => ";

        echo $failure['error'];

        echo "\n";

    }

}


echo "\n";