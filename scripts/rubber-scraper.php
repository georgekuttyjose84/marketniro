<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Application\Service\FetchRubberPrice;

try {
    $service = new FetchRubberPrice();

    $service->run();
} catch (Throwable $e) {
    echo "Rubber scraper failed" . PHP_EOL;

    echo $e->getMessage() . PHP_EOL;

    exit(1);
}