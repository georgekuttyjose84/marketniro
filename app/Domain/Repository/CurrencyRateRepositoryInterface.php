<?php

namespace App\Domain\Repository;

use App\Domain\Entity\CurrencyRate;
use App\Domain\Entity\CurrencyValue;

interface CurrencyRateRepositoryInterface
{
    public function find(string $base, string $target): ?CurrencyValue;
    
    public function all(): array;

    public function getMainCurrency(array $mainCurrencyList): array;

}
