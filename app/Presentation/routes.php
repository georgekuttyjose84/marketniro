<?php

use App\Presentation\Controller\HomeController;
use App\Presentation\Controller\CurrencyRateController;
use App\Presentation\Controller\CurrencyRateConvertorController;

return [

    '/' => [HomeController::class, 'index'],

    '/api/v1/rates/{base}/{target}' => [CurrencyRateController::class, 'show'],

    '/finance/currency' => [CurrencyRateConvertorController::class, 'index']

];
