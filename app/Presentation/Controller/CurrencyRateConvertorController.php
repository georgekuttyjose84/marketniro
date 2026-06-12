<?php

namespace App\Presentation\Controller;

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

        $mainCurrencyRateService = new MainCurrencyRateService($this->repo);
        $mainCurrencyList = $mainCurrencyRateService->getMainCurrencyRates();

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
                        ],
                    ],
                    'main_currency_list' => $mainCurrencyList,
                ]
            )
        );
    }
}