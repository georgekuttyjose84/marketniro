<?php

namespace App\Domain\Entity;

class CurrencyRate
{
    public function __construct(
        public string $baseCurrency,
        public string $targetCurrency,
        public float $rate
    ) {}
}
