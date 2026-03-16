<?php

namespace App\Presentation\Controller;

use App\Infrastructure\Repository\CurrencyRateRepository;

class HomeController
{
    public function index()
    {
        $repo = new CurrencyRateRepository();
        $rates = $repo->latest(50);

        include __DIR__ . '/../../../templates/home.php';
    }
}
