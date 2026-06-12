<?php

namespace App\Domain\Entity;

class MainCurrencyRate
{
    public function __construct(
        public string $baseCurrency,
        public string $targetCurrency,
        public float $currentRate,
        public float $previousRate,
        public int $status,
    ) {}


    public function getBaseCurrency(): string
    {
        return $this->baseCurrency;
    }

    public function getTargetCurrency(): string
    {
        return $this->targetCurrency;
    }
    public function getCurrentRate(): float
    {
        return $this->currentRate;
    }
    public function getPreviousRate(): float
    {
        return $this->previousRate;
    }
    public function getStatus(): int
    {
        return $this->status;
    }
}
