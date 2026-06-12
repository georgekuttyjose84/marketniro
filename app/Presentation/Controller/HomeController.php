<?php

namespace App\Presentation\Controller;

use App\Application\Service\MainCurrencyRateService;
use App\Domain\Repository\CurrencyRateRepositoryInterface;
use App\Http\Response\HtmlResponse;
use App\Infrastructure\View\PhpTemplate;

class HomeController
{

    public function __construct(
        private CurrencyRateRepositoryInterface $repo
    ) {}
    public function index(): HtmlResponse
    {
        $engine = new PhpTemplate(__DIR__ . '/../../../templates');


        $mainCurrencyRateService = new MainCurrencyRateService($this->repo);
        $mainCurrencyList = $mainCurrencyRateService->getMainCurrencyRates();

        return new HtmlResponse(
            $engine->render(
                'pages/home',
                [
                    'page' => [
                        'title' => 'MarketNiro',
                        'styles' => [
                            '/assets/css/common/trending-currency-home.css',
                        ],
                    ],

                    'main_currency_list' => $mainCurrencyList,
                ]
            )
        );
    }
}