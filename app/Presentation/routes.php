<?php

use App\Presentation\Controller\CurrencyHistoryApiController;
use App\Presentation\Controller\GoldController;
use App\Presentation\Controller\HomeController;
use App\Presentation\Controller\CurrencyRateController;
use App\Presentation\Controller\CurrencyRateConvertorController;
use App\Presentation\Controller\SilverController;

return [

    '/' => [HomeController::class, 'index'],
    '/api/v1/rates/{base}/{target}' => [CurrencyRateController::class, 'show'],
    '/finance/currency' => [CurrencyRateConvertorController::class, 'index'],
    '/finance/currency/history' => [CurrencyHistoryApiController::class, 'index'],
    '/finance/gold' => [GoldController::class, 'index'],
    '/finance/silver' => [SilverController::class, 'index']

];
