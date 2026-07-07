<?php

namespace App\Presentation\Controller;


use App\Domain\Repository\PineAppleRepositoryInterface;
use App\Http\Request;
use App\Http\Response\HtmlResponse;
use App\Infrastructure\View\PhpTemplate;

class PipeAppleController
{
    public function __construct(
        private PineAppleRepositoryInterface $pineAppleRepositoryInterface
    ) {}

    public function index(Request $request): HtmlResponse
    {
        $engine = new PhpTemplate(__DIR__ . '/../../../templates');
        $selectedDate = trim($request->getString('date'));


        $latestPrice = $this->pineAppleRepositoryInterface->getLatestPrice();
        $selectedPrice = [];

        if ($selectedDate !== '') {
            $selectedPrice = $this->pineAppleRepositoryInterface->findSelectedDate($selectedDate);
        }

        $lastThreeMonthsPriceSummary = $this->pineAppleRepositoryInterface->getLastThreeMonthsPriceSummary();
        $lastSevenDaysPrice = $this->pineAppleRepositoryInterface->getLastSevenDaysPrice();



        return new HtmlResponse(
            $engine->render(
                'pages/agriculture/pineapple/home',
                [
                    'page' => [
                        'title' => 'Pineapple Price Today | Green & Ripe Pineapple Rates | MarketNiro',
                        'description' => 'Check the latest pineapple prices today, including green and ripe pineapple rates, minimum and maximum prices, and daily market price updates.',
                        'canonical' => '/agriculture/pineapple',
                        'h1' => 'Pineapple Price Today',
                        'breadcrumb' => 'Pineapple',
                        'scripts' => [
                            'https://cdn.jsdelivr.net/npm/apexcharts',
                        ],
                    ],
                    'latestPrice' => $latestPrice,
                    'monthlyPriceSummary' => $lastThreeMonthsPriceSummary,
                    'lastSevenDaysPrice' => $lastSevenDaysPrice,
                    'selectedDate' => $selectedDate,
                    'selectedPrice' => $selectedPrice,
                ]
            )
        );
    }
}