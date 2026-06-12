<?php

namespace App\Domain\Repository;

use App\Domain\Entity\CurrencyRate;

interface CurrencyRateRepositoryInterface
{
    public function find(string $base, string $target): ?CurrencyRate;
    
    public function all(): array;

    public function getMainCurrency(array $mainCurrencyList): array;

}
