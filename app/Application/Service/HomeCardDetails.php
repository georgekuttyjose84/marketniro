<?php

namespace App\Application\Service;

use App\Domain\Entity\PineApple;
use App\Domain\Enum\PineAppleType;
use App\Domain\Enum\RubberGrade;
use App\Domain\Enum\RubberMarketType;
use App\Domain\Enum\RubberPlace;
use App\Domain\Repository\CurrencyRateRepositoryInterface;
use App\Domain\Repository\PineAppleRepositoryInterface;
use App\Domain\Repository\RubberPriceRepositoryInterface;

class HomeCardDetails
{
    public function __construct(
        private PineAppleRepositoryInterface $pineAppleRepositoryInterface,
        private RubberPriceRepositoryInterface $rubberRepositoryInterface,
        private CurrencyRateRepositoryInterface $currencyRateRepositoryInterface
    ) {}


    public function getCard():array
    {

        /** @var PineApple $pineapple */
        $pineapple = $this->pineAppleRepositoryInterface->getLatestPrice();
        $data = [];

        foreach ($pineapple as $key => $value) {
            $prices = $this->pineAppleRepositoryInterface->getLatestAveragePrices(strtolower($value->getType()->getName()));;
            $indicatorDetails = $this->getIndicator($prices);

            $img = $value->getType() === PineAppleType::RIPE ? 'pipeapple_ripe.png' : 'pipeapple_green.png';

            $data[] = [
                'type' => $value->getType() === PineAppleType::RIPE ? 'pineapple-ripe' : 'pineapple-green',
                'heading' => $value->getType() === PineAppleType::RIPE ? 'Pineapple Ripe' : 'Pineapple Green',
                'url' => '/agriculture/pineapple',
                'quantity' => 'kg',
                'price' => "₹".$value->getMinPrice().' - '."₹".$value->getMaxPrice(),
                'date' => (new \DateTimeImmutable($value->getPriceDate()))->format('d M y'),
                'icon' => $indicatorDetails['icon'],
                'percentage' => $indicatorDetails['percentage'],
                'impressions' => $indicatorDetails['impressions'],
                'image' => '/assets/images/home/' . $img
            ];
        }


        $rubber = $this->rubberRepositoryInterface->getLatestPricesByMarketTypeAndPlace(
            RubberMarketType::DOMESTIC,
            RubberPlace::KOTTAYAM,
            RubberGrade::RSS4

        )['kottayam'][0];

        $rubberIndicator = $this->rubberRepositoryInterface->getLatestPricesByMarketTypeAndPlaceIndicator(
            RubberMarketType::DOMESTIC,
            RubberPlace::KOTTAYAM,
            RubberGrade::RSS4
        );



        $rubberIndicatorDetails = $this->getIndicator($rubberIndicator);


        $data[] = [
            'type' => 'rubber',
            'heading' => 'Rubber',
            'url' => '/agriculture/rubber',
            'quantity' => '100 kg',
            'price' => "₹". $rubber->amountInRupee,
            'date' => (new \DateTimeImmutable($rubber->priceDate))->format('d M y'),
            'percentage' => $rubberIndicatorDetails['percentage'],
            'impressions' => $rubberIndicatorDetails['impressions'],
            'icon' => $rubberIndicatorDetails['icon'],
            'image' => '/assets/images/home/rubber.png',
        ];



        $gold = $this->currencyRateRepositoryInterface->getGoldCard()[0];
        $goldIndicatorDetails =  $this->getIndicator($this->currencyRateRepositoryInterface->getGoldCardIndicator());


        $data[] = [
            'type' => 'gold',
            'heading' => 'Gold',
            'url' => '/finance/gold',
            'quantity' => '1 g',
            'price' => "₹". $gold['price_1g'],
            'date' => (new \DateTimeImmutable($gold['price_date']))->format('d M y'),
            'percentage' => $goldIndicatorDetails['percentage'],
            'impressions' => $goldIndicatorDetails['impressions'],
            'icon' => $goldIndicatorDetails['icon'],
            'image' => '/assets/images/home/rubber.png',
        ];

        $silver = $this->currencyRateRepositoryInterface->getSilverCard()[0];
        $silverIndicatorDetails =  $this->getIndicator($this->currencyRateRepositoryInterface->getSilverCardIndicator());


        $data[] = [
            'type' => 'silver',
            'heading' => 'Silver',
            'url' => '/finance/silver',
            'quantity' => '1 g',
            'price' => "₹". $silver['price_1g'],
            'date' => (new \DateTimeImmutable($silver['price_date']))->format('d M y'),
            'percentage' => $silverIndicatorDetails['percentage'],
            'impressions' => $silverIndicatorDetails['impressions'],
            'icon' => $silverIndicatorDetails['icon'],
            'image' => '/assets/images/home/rubber.png',
        ];


        return $data;
    }

    public function getIndicator($data):array
    {
        $icon = '➖';
        $impressions = 'neutral';
        $percentage = 0;
        $icon = '➖';

        if (count($data) >= 2) {
            $current = (float)$data[0]['price_information'];
            $previous = (float)$data[1]['price_information'];
            if ($previous > 0) {
                $percentage = (($current - $previous) / $previous) * 100;
            }
            $percentage = round($percentage, 2);

            if ($percentage > 0) {
                $icon = '▲';
                $impressions = 'positive';
            } elseif ($percentage < 0) {
                $icon = '▼';
                $impressions = 'negative';

            } else {
                $icon = '';
                $impressions = 'neutral';
            }
        }


        return [
            'icon' => $icon,
            'percentage' => sprintf("%+.2f", $percentage) ,
            'impressions' => $impressions,
        ];

    }

}