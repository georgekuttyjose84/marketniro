<?php

namespace App\Domain\Entity;

class CurrencyRate
{
    public function __construct(
        public ?int $id,
        public string $baseCurrency,
        public string $targetCurrency,
        public float $rate,
        public \DateTimeImmutable $createdAt
    ) {}
}
