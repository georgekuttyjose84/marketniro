<?php

namespace App\Presentation\Controller;

use App\Infrastructure\Repository\CurrencyRateRepository;
use App\Infrastructure\Repository\MetalRepository;
use App\Infrastructure\View\PhpTemplate;

class HomeController
{
    public function index()
    {

        $engine = new PhpTemplate(__DIR__ . '/../../../templates');

        echo $engine->render('home', []);
    }
}
