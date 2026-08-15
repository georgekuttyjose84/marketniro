<?php

namespace App\Presentation\Controller;

use App\Application\Service\HomeCardDetails;
use App\Application\Service\MainCurrencyRateService;
use App\Domain\Repository\CurrencyRateRepositoryInterface;
use App\Domain\Repository\PineAppleRepositoryInterface;
use App\Domain\Repository\RubberPriceRepositoryInterface;
use App\Http\Response\HtmlResponse;
use App\Infrastructure\View\PhpTemplate;

class HomeController
{

    public function __construct(
        private PineAppleRepositoryInterface $pineAppleRepositoryInterface,
        private RubberPriceRepositoryInterface $rubberRepositoryInterface,
        private CurrencyRateRepositoryInterface $currencyRateRepositoryInterface,
    ) {}
    public function index(): HtmlResponse
    {

        $engine = new PhpTemplate(__DIR__ . '/../../../templates');

        $mainCurrencyRateService = new MainCurrencyRateService($this->currencyRateRepositoryInterface);
        $mainCurrencyList = $mainCurrencyRateService->getMainCurrencyRates();

        $cardDetails = new HomeCardDetails($this->pineAppleRepositoryInterface,$this->rubberRepositoryInterface,$this->currencyRateRepositoryInterface);
        $cardList = $cardDetails->getCard();

        return new HtmlResponse(
            $engine->render(
                'pages/home',
                [

                    'page' => [
                        'title' => 'MarketNiro',
                        'description' => '',
                        'canonical' => '',
                        'h1' => '',
                        'breadcrumb' => '',
                        'scripts' => [
                            '/assets/js/home/home.js'
                        ],
                        'styles' => [
                            '/assets/css/common/trending-currency-home.css',
                            '/assets/css/home/home.css'
                        ],
                    ],
                    'main_currency_list' => $mainCurrencyList,
                    'cardList' => $cardList
                ]
            )
        );
    }
}