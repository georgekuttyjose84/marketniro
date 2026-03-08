<?php

use App\Presentation\Controller\HomeController;
use App\Presentation\Controller\CurrencyRateController;

return [

    '/' => [HomeController::class, 'index'],

    '/api/v1/rates/{base}/{target}' => [CurrencyRateController::class, 'show']

];
