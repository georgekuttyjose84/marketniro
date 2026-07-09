<?php

namespace App\Presentation\Controller;


use App\Domain\Repository\RubberPriceRepositoryInterface;
use App\Http\Request;
use App\Http\Response\HtmlResponse;
use App\Infrastructure\View\PhpTemplate;

class RubberController
{
    public function __construct(
        private RubberPriceRepositoryInterface $rubberRepositoryInterface
    ) {}

    public function index(Request $request): HtmlResponse
    {
        $engine = new PhpTemplate(__DIR__ . '/../../../templates');

        $domesticPrice = $this->rubberRepositoryInterface->getLatestDomesticPrices();
        $internationalPrice = $this->rubberRepositoryInterface->getLatestInternationalPrices();




        return new HtmlResponse(
            $engine->render(
                'pages/agriculture/rubber/home',
                [
                    'page' => [
                        'title' => 'Rubber Price Today | Green & Ripe Rubber Rates | MarketNiro',
                        'description' => 'Check the latest rubber prices today, including green and ripe rubber rates, minimum and maximum prices, and daily market price updates.',
                        'canonical' => '/agriculture/rubber',
                        'h1' => 'Rubber Price Today',
                        'breadcrumb' => 'Rubber',
                        'scripts' => [
                            'https://cdn.jsdelivr.net/npm/apexcharts',
                            'https://code.jquery.com/jquery-3.7.1.min.js',
                            'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js',
                        ],
                    ],
                    'domesticPrice' =>
                        $domesticPrice,

                    'internationalPrice' =>
                        $internationalPrice,
                ]
            )
        );
    }
}