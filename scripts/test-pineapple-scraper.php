<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Application\Service\FetchPineapple;

$service = new FetchPineapple();

$service->run();
