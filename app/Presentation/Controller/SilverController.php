<?php

namespace App\Presentation\Controller;

use App\Application\Service\HistoryRateService;
use App\Application\Service\HourlyComparisonService;
use App\Domain\Repository\CurrencyRateRepositoryInterface;
use App\Http\Request;
use App\Http\Response\HtmlResponse;
use App\Infrastructure\View\PhpTemplate;

class SilverController
{
    public function __construct(
        private CurrencyRateRepositoryInterface $repo
    ) {}

    public function index(Request $request): HtmlResponse
    {
        $engine = new PhpTemplate(
            __DIR__ . '/../../../templates'
        );
        $amount = $request->getInt(
            'amount',
            1
        );
        $currency = $request->getString(
            'currency',
            'INR'
        );
        $troyOunceInGrams = 31.1034768;
        $silver = $this->repo->find(
            'XAG',
            $currency
        );
        $silverPrices = null;
        $silverPricePerGram = null;
        $silverTable = [];
        if ($silver !== null) {
            $silverPricePerGram = $silver->amount / $troyOunceInGrams;
            $price999PerGram = $silverPricePerGram;
            $price925PerGram = $price999PerGram * 0.925;
            $silverPrices = [
                '925' => [
                    'total' => $price925PerGram * $amount,
                    'perGram' => $price925PerGram,
                ],
                '999' => [
                    'total' => $price999PerGram * $amount,
                    'perGram' => $price999PerGram,
                ],
            ];
            $quantities = [
                [
                    'label' => '1 gram',
                    'grams' => 1,
                    'description' => null,
                ],

                [
                    'label' => '8 gram',
                    'grams' => 8,
                    'description' => null,
                ],

                [
                    'label' => '100 gram',
                    'grams' => 100,
                    'description' => null,
                ],

                [
                    'label' => '1 Ounce',
                    'grams' => 31.1034768,
                    'description' => '31.1034768 grams',
                ],

                [
                    'label' => '1 Kilogram',
                    'grams' => 1000,
                    'description' => '1000 grams',
                ],

                [
                    'label' => '1 Sovereign',
                    'grams' => 7.322381,
                    'description' => '7.322381 grams',
                ],

                [
                    'label' => '1 Tola',
                    'grams' => 11.6638038,
                    'description' => '11.6638038 grams',
                ],

            ];


            foreach ($quantities as $quantity) {
                $silverTable[] = [
                    'label' => $quantity['label'],
                    'description' => $quantity['description'],
                    'price925' => $price925PerGram * $quantity['grams'],
                    'price999' => $price999PerGram * $quantity['grams'],
                ];
            }
        }
        $comparisonService = new HourlyComparisonService($this->repo);

        $rows = $comparisonService->getComparison(
            base: 'XAG',
            target: $currency
        );


        foreach ($rows as $index => $row) {
            $rows[$index]['yesterday'] =
                $row['yesterday'] !== null
                    ? $row['yesterday']
                    / $troyOunceInGrams
                    : null;

            $rows[$index]['today'] =
                $row['today'] !== null
                    ? $row['today']
                    / $troyOunceInGrams
                    : null;
        }

        $historyRateService = new HistoryRateService($this->repo);
        $graph = $historyRateService->getHistory('XAG', $currency);
        $graph->current = $graph->current / $troyOunceInGrams;
        $graph->high = $graph->high / $troyOunceInGrams;
        $graph->low = $graph->low / $troyOunceInGrams;

        foreach ($graph->points as $index => $point) {
            $graph->points[$index]->rate = $point->rate / $troyOunceInGrams;
        }

        return new HtmlResponse(
            $engine->render(
                'pages/finance/silver/home',
                [
                    'page' => [
                        'title' => 'Live Silver Price Today | Silver Rates & Market Trends | MarketNiro',
                        'description' => 'Track live silver prices today with current silver rates, historical price charts, hourly comparisons and market trends.',
                        'canonical' => '/finance/silver',
                        'h1' => 'Live Silver Price Today',
                        'breadcrumb' => 'Silver',
                        'scripts' => [
                            'https://cdn.jsdelivr.net/npm/apexcharts',
                        ],
                    ], 'silver' => $silver,
                    'silverPrices' => $silverPrices,
                    'currency' => $currency,
                    'amount' => $amount,
                    'silverPricePerGram' => $silverPricePerGram,
                    'silverTable' => $silverTable,
                    'rows' => $rows,
                    'graph' => $graph,

                ]
            )
        );
    }
}