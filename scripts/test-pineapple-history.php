<?php

$url = 'https://keralapineapplemerchants.com/';

$testDate = '02/01/2026';

$date = \DateTimeImmutable::createFromFormat(
    'd/m/Y',
    $testDate,
    new \DateTimeZone('Asia/Kolkata')
);

if ($date === false) {

    throw new \RuntimeException(
        "Invalid date: {$testDate}"
    );

}

$priceDate = $date->format(
    'Y-m-d'
);


/*
 * Create historical timestamp at:
 *
 * 2026-01-01 10:00:00 Asia/Kolkata
 */

$createdAt = (
new \DateTimeImmutable(
    $priceDate . ' 10:00:00',
    new \DateTimeZone('Asia/Kolkata')
)
)->getTimestamp();


/*
 * STEP 1:
 * GET the page and obtain fresh ASP.NET fields.
 */

$ch = curl_init();

curl_setopt_array($ch, [

    CURLOPT_URL => $url,

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

    throw new \RuntimeException(
        "Initial request failed. "
        . "HTTP: {$httpCode}. "
        . "Error: {$error}"
    );

}


/*
 * STEP 2:
 * Parse hidden ASP.NET form fields.
 */

libxml_use_internal_errors(true);

$dom = new \DOMDocument();

$dom->loadHTML($html);

libxml_clear_errors();

$xpath = new \DOMXPath($dom);


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
 * POST one historical date.
 */

$postData = [

    '__VIEWSTATE' =>
        $viewState,

    '__VIEWSTATEGENERATOR' =>
        $viewStateGenerator,

    '__EVENTVALIDATION' =>
        $eventValidation,

    'datepicker' =>
        $testDate,

    'btnSearch' =>
        'Submit',

];


$ch = curl_init();

curl_setopt_array($ch, [

    CURLOPT_URL => $url,

    CURLOPT_POST => true,

    CURLOPT_POSTFIELDS =>
        http_build_query($postData),

    CURLOPT_RETURNTRANSFER => true,

    CURLOPT_FOLLOWLOCATION => true,

    CURLOPT_TIMEOUT => 30,

    CURLOPT_CONNECTTIMEOUT => 10,

    CURLOPT_SSL_VERIFYPEER => false,

    CURLOPT_SSL_VERIFYHOST => false,

    CURLOPT_USERAGENT =>
        'Mozilla/5.0 (X11; Linux x86_64) '
        . 'AppleWebKit/537.36 Chrome/145 Safari/537.36',

    CURLOPT_HTTPHEADER => [

        'Content-Type: application/x-www-form-urlencoded',

    ],

]);

$response = curl_exec($ch);

$httpCode = curl_getinfo(
    $ch,
    CURLINFO_HTTP_CODE
);

$error = curl_error($ch);

curl_close($ch);


if (
    $response === false
    || $httpCode !== 200
) {

    throw new \RuntimeException(
        "Historical request failed. "
        . "HTTP: {$httpCode}. "
        . "Error: {$error}"
    );

}


/*
 * STEP 4:
 * Parse #dvSearch.
 */

libxml_use_internal_errors(true);

$dom = new \DOMDocument();

$dom->loadHTML($response);

libxml_clear_errors();

$xpath = new \DOMXPath($dom);


$rows = $xpath->query(
    '//*[@id="dvSearch"]//table//tr'
);


if ($rows->length === 0) {

    throw new \RuntimeException(
        "No historical price found for {$testDate}"
    );

}


$result = [];


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


    $minPrice =
        (float) $matches[0][0];

    $maxPrice =
        (float) $matches[0][1];


    $result[] = [

        'type' =>
            $type,

        'min_price' =>
            $minPrice,

        'max_price' =>
            $maxPrice,

        'avg_price' =>
            ($minPrice + $maxPrice) / 2,

        'price_date' =>
            $priceDate,

        'method' =>
            'manual',

        'created_at' =>
            $createdAt,

    ];

}


echo "\n";

echo "Historical pineapple price\n";

echo "Requested date: {$testDate}\n";

echo "Price date: {$priceDate}\n";

echo "Created at: {$createdAt}\n";

echo "Created at IST: ";

echo (
new \DateTimeImmutable(
    '@' . $createdAt
)
)
    ->setTimezone(
        new \DateTimeZone('Asia/Kolkata')
    )
    ->format('Y-m-d H:i:s');

echo "\n\n";

print_r($result);