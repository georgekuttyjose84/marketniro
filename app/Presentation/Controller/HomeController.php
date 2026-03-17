<?php

namespace App\Presentation\Controller;

use App\Infrastructure\Repository\CurrencyRateRepository;
use App\Infrastructure\Repository\MetalRepository;


class HomeController
{
    public function index()
    {
        $currencyRepo = new CurrencyRateRepository();
        $metalRepo = new MetalRepository();

        $rates = $currencyRepo->latest(50);
        $metals = $metalRepo->latest();

        include __DIR__ . '/../../../templates/home.php';
    }
}
