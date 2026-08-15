<?php

namespace App\Presentation\Controller;


use App\Domain\Repository\PineAppleRepositoryInterface;
use App\Http\Request;
use App\Http\Response\HtmlResponse;
use App\Infrastructure\View\PhpTemplate;

class AboutUs
{
    public function __construct(
        private PineAppleRepositoryInterface $pineAppleRepositoryInterface
    ) {}

    public function index(Request $request): HtmlResponse
    {
        $engine = new PhpTemplate(__DIR__ . '/../../../templates');
        $selectedDate = trim($request->getString('date'),);
        $monthlyData = $this->pineAppleRepositoryInterface->getMonthlyData();


        return new HtmlResponse(
            $engine->render(
                'pages/pipe-apple-static-data-edit656',
                [
                    'page' => [
                        'title' => 'Pineapple Price Today | Green & Ripe Pineapple Rates | MarketNiro',
                        'description' => 'Check the latest pineapple prices today, including green and ripe pineapple rates, minimum and maximum prices, and daily market price updates.',
                        'canonical' => '/agriculture/pineapple',
                        'h1' => 'Pineapple Price Today',
                        'breadcrumb' => 'Pineapple',
                        'scripts' => [
                            'https://cdn.jsdelivr.net/npm/apexcharts',
                            '/assets/js/agriculture/pineapple.js',
                        ],
                        'styles' => [
                            '/assets/css/agriculture/pineapple.css',
                        ],

                    ],
                ]
            )
        );
    }
}