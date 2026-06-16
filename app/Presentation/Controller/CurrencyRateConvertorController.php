<?php

namespace App\Presentation\Controller;

use App\Application\Service\HistoryRateService;
use App\Application\Service\HourlyComparisonService;
use App\Application\Service\MainCurrencyRateService;
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
        $amount = $request->getInt('amount',1);
        $from = $request->getString('from','USD');
        $to = $request->getString('to','INR');
        $currencyValue = $this->repo->find($from, $to);
        $mainCurrencyRateService = new MainCurrencyRateService($this->repo);
        $mainCurrencyList = $mainCurrencyRateService->getMainCurrencyRates();


        $historyRateService = new HistoryRateService(
            $this->repo
        );

        $graph = $historyRateService->getHistory(
            base: $from,
            target: $to,
        );

        $comparisonService = new HourlyComparisonService(
            $this->repo
        );

        $rows = $comparisonService->getComparison(
            base: $from,
            target: $to
        );

        return new HtmlResponse(
            $engine->render(
                'pages/finance/currency/home',
                [

                    'page' => [
                        'title' => 'Live Currency Exchange Rates Today | MarketNiro',
                        'description' => 'Track live currency exchange rates including USD, EUR, INR, AED, CAD, JPY, CNY and more with real-time market trends.',
                        'canonical' => '/finance/currency',
                        'h1' => 'Live Currency Exchange Rates',
                        'breadcrumb' => 'Currency',
                        'styles' => [
                            '/assets/css/common/finance-page-header.css',
                            '/assets/css/common/trending-currency.css',
                            '/assets/css/finance/currency.css',
                        ],
                        'scripts' => [
                            '/assets/js/finance/currency.js',
                            'https://cdn.jsdelivr.net/npm/apexcharts'

                        ],
                    ],
                    'main_currency_list' => $mainCurrencyList,
                    'amount' => $amount,
                    'currency_value' => $currencyValue,
                    'graph' => $graph,
                    'period' => '24H',
                    'rows' => $rows,
                ]
            )
        );
    }
}