<?php

namespace App\Presentation\Controller;

use App\Application\Service\HistoryRateService;
use App\Application\Service\HourlyComparisonService;
use App\Application\Service\MainCurrencyRateService;
use App\Domain\Repository\CurrencyRateRepositoryInterface;
use App\Http\Request;
use App\Http\Response\HtmlResponse;
use App\Infrastructure\View\PhpTemplate;

class GoldController
{

    public function __construct(
        private CurrencyRateRepositoryInterface $repo
    ) {}
    public function index(Request $request): HtmlResponse
    {
        $engine = new PhpTemplate(__DIR__ . '/../../../templates');

        $amount = $request->getInt('amount', 1);

        $currency = $request->getString('currency', 'INR');

        $gold = $this->repo->find(
            'XAU',
            $currency
        );

        $goldPrices = null;
        $goldPricePerGram = null;
        $goldTable = [];


        if ($gold !== null) {
            $goldPricePerGram = $gold->amount / 31.1034768;
            $troyOunceInGrams = 31.1034768;
            $price24kPerGram = $gold->amount / $troyOunceInGrams;
            $price22kPerGram = $price24kPerGram * (22 / 24);

            $goldPrices = [
                '22K' => [
                    'total' => $price22kPerGram * $amount,
                    'perGram' => $price22kPerGram,
                ],
                '24K' => [
                    'total' => $price24kPerGram * $amount,
                    'perGram' => $price24kPerGram,
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
                $goldTable[] = [
                    'label' => $quantity['label'],
                    'description' => $quantity['description'],
                    'price22k' =>
                        $price22kPerGram * $quantity['grams'],
                    'price24k' =>
                        $price24kPerGram * $quantity['grams'],
                ];
            }
        }

        $comparisonService = new HourlyComparisonService(
            $this->repo
        );

        $rows = $comparisonService->getComparison(
            base: 'XAU',
            target: $currency
        );

        $troyOunceInGrams = 31.1034768;

        foreach ($rows as $index => $row) {
            $rows[$index]['yesterday'] = $row['yesterday'] !== null
                ? $row['yesterday'] / $troyOunceInGrams
                : null;

            $rows[$index]['today'] = $row['today'] !== null
                ? $row['today'] / $troyOunceInGrams
                : null;
        }


        $historyRateService = new HistoryRateService(
            $this->repo
        );

        $graph = $historyRateService->getHistory(
            'XAU',
            $currency
        );

        $graph->current = $graph->current/$troyOunceInGrams;
        $graph->high = $graph->high/$troyOunceInGrams;
        $graph->low = $graph->low/$troyOunceInGrams;


        foreach ($graph->points as $index => $row) {
            $graph->points[$index]->rate = $graph->points[$index]->rate / $troyOunceInGrams;
        }


        return new HtmlResponse(
            $engine->render(
                'pages/finance/gold/home',
                [
                    'page' => [
                        'title' => 'Live Gold Price Today | Gold Rates & Market Trends | MarketNiro',
                        'description' => 'Track live gold prices today with current gold rates, historical price charts, hourly comparisons and market trends.',
                        'canonical' => '/finance/gold',
                        'h1' => 'Live Gold Price Today',
                        'breadcrumb' => 'Gold',
                        'scripts' => [
                            'https://cdn.jsdelivr.net/npm/apexcharts'

                        ],
                    ],
                    'gold' => $gold,
                    'goldPrices' => $goldPrices,
                    'currency' => $currency,
                    'amount' => $amount,
                    'goldPricePerGram' => $goldPricePerGram,
                    'goldTable' => $goldTable,
                    'rows' => $rows,
                    'graph' => $graph,
                ]
            )
        );
    }
}