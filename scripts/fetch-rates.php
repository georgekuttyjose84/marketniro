<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Application\Service\FetchExchangeRates;

$service = new FetchExchangeRates();

$service->run();

echo "Exchange rates updated\n";
