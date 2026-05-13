<?php

namespace App\Domain\Repository;

use App\Domain\Entity\CurrencyRate;

interface CurrencyRateRepositoryInterface
{
    public function save(CurrencyRate $rate): void;

    public function find(string $base, string $target): ?CurrencyRate;
    
    public function all(): array;
}
