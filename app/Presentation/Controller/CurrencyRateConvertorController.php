<?php

namespace App\Presentation\Controller;

use App\Http\Request;
use App\Http\Response\HtmlResponse;
use App\Domain\Repository\CurrencyRateRepositoryInterface;
use App\Infrastructure\View\PhpTemplate;

class CurrencyRateConvertorController
{
    public function __construct(
        private CurrencyRateRepositoryInterface $repo
    ) {}

    public function index(Request $request): HtmlResponse
    {
        $engine = new PhpTemplate(__DIR__ . '/../../../templates');

        $period = $_GET['period'] ?? '1d';

        $pairs = [
            ['from' => 'EUR', 'to' => 'USD'],
            ['from' => 'EUR', 'to' => 'INR'],
            ['from' => 'USD', 'to' => 'INR'],
            ['from' => 'AED', 'to' => 'INR'],
            ['from' => 'USD', 'to' => 'IRR'],
            ['from' => 'USD', 'to' => 'CNY'],
            ['from' => 'USD', 'to' => 'RUB'],
            ['from' => 'INR', 'to' => 'JPY'],
            ['from' => 'USD', 'to' => 'CAD'],
            ['from' => 'INR', 'to' => 'CAD'],
        ];

        $chartData = $this->repo->buildChartData($pairs, $period);
        $indicators = $this->repo->buildIndicators($pairs, $period);

        return new HtmlResponse(
            $engine->render('pages/finance/home', [
                'page' => [
                    'title' => 'Currency Rates - MarketNiro',
                    'description' => 'Live currency exchange rates and trend charts.',
                    'canonical' => '/finance/currency',
                    'h1' => 'Live Currency Rates',
                    'styles' => [
                        '/assets/css/finance/currency.css',
                    ],
                    'scripts' => [
                        '/assets/js/finance/currency.js',
                    ],
                ],
                'pairs' => $pairs,
                'period' => $period,
                'chartData' => $chartData,
                'indicators' => $indicators,
            ])
        );
    }
}