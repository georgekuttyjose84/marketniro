<?php

namespace App\Presentation\Controller;

use App\Http\Request;
use App\Http\Response\HtmlResponse;
use App\Domain\Repository\CurrencyRateRepository;
use App\Infrastructure\View\PhpTemplate;

class CurrencyRateConvertorController
{
    public function __construct(
        private CurrencyRateRepository $repo
    ) {}

    public function index(Request $request): HtmlResponse
    {
        $rates = $this->repo->all();
        $engine = new PhpTemplate(__DIR__ . '/../../../templates');

        return new HtmlResponse(
            $engine->render('pages/finance/home', [
                'page' => [
                    'title' => 'Live Currency Rates - MarketNiro',
                    'description' => 'Real-time global currency exchange rates.',
                    'keywords' => 'currency, forex, exchange rate, USD INR',
                    'canonical' => '/finance/currency',
                    'h1' => 'Live Currency Rates',
                    'styles' => [
                        '/assets/css/finance/currency.css',
                    ],
                    'scripts' => [
                        '/assets/js/finance/currency.js',
                    ],
                ],

                'rates' => $rates,
            ])
        );
    }
}