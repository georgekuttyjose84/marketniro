<?php

namespace App\Application\Service;

use App\Domain\Entity\MainCurrencyRate;
use App\Domain\Repository\CurrencyRateRepositoryInterface;

class MainCurrencyRateService
{
    private const DEFAULT_PAIRS = [
        ['from' => 'EUR', 'to' => 'USD'],
        ['from' => 'EUR', 'to' => 'INR'],
        ['from' => 'USD', 'to' => 'INR'],
        ['from' => 'AED', 'to' => 'INR'],
        ['from' => 'USD', 'to' => 'IRR'],
        ['from' => 'USD', 'to' => 'CNY'],
        ['from' => 'USD', 'to' => 'RUB'],
        ['from' => 'INR', 'to' => 'JPY'],
        ['from' => 'USD', 'to' => 'CAD'],
        ['from' => 'INR', 'to' => 'CAD'],
    ];

    private const DEFAULT_CURRENCIES = [
        'INR',
        'EUR',
        'AED',
        'IRR',
        'CNY',
        'RUB',
        'JPY',
        'CAD',
    ];

    public function __construct(
        private CurrencyRateRepositoryInterface $repo
    ) {
    }

    /**
     * @return MainCurrencyRate[]
     */
    public function getMainCurrencyRates(
        ?array $pairs = null,
        ?array $currencies = null
    ): array {

        $pairs ??= self::DEFAULT_PAIRS;
        $currencies ??= self::DEFAULT_CURRENCIES;

        $rows = $this->repo->getMainCurrency($currencies);

        $rates = [];

        foreach ($rows as $row) {
            $rates[$row['target_currency']][$row['rn']] = $row;
        }

        $result = [];

        foreach ($pairs as $pair) {

            $from = $pair['from'];
            $to = $pair['to'];

            $fromCurrent = $this->getRate($rates, $from, 1);
            $toCurrent = $this->getRate($rates, $to, 1);

            $fromPrevious = $this->getRate($rates, $from, 2);
            $toPrevious = $this->getRate($rates, $to, 2);

            if (
                $fromCurrent === null ||
                $toCurrent === null ||
                $fromPrevious === null ||
                $toPrevious === null
            ) {
                continue;
            }

            $currentRate = $toCurrent / $fromCurrent;
            $previousRate = $toPrevious / $fromPrevious;

            $result[] = new MainCurrencyRate(
                baseCurrency: $from,
                targetCurrency: $to,
                currentRate: $currentRate,
                previousRate: $previousRate,
                status: $currentRate <=> $previousRate
            );
        }

        return $result;
    }

    private function getRate(
        array $rates,
        string $currency,
        int $rn
    ): ?float {

        if ($currency === 'USD') {
            return 1.0;
        }

        return isset($rates[$currency][$rn])
            ? (float) $rates[$currency][$rn]['rate']
            : null;
    }
}
