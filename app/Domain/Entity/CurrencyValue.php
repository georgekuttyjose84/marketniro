<?php

namespace App\Domain\Entity;

class CurrencyValue
{
    public function __construct(
        public string $baseCurrency,
        public string $targetCurrency,
        public float $amount,
    ) {}


    public function getBaseCurrency(): string
    {
        return $this->baseCurrency;
    }

    public function getTargetCurrency(): string
    {
        return $this->targetCurrency;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }
}

