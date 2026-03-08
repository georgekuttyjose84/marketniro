<?php

namespace App\Application\Service;

use App\Domain\Entity\CurrencyRate;
use App\Domain\Repository\CurrencyRateRepository;

class CurrencyRateService
{
    public function __construct(
        private CurrencyRateRepository $repository
    ) {}

    public function storeRate(string $base, string $target, float $rate): void
    {
        $entity = new CurrencyRate($base, $target, $rate);

        $this->repository->save($entity);
    }

    public function getRate(string $base, string $target): ?CurrencyRate
    {
        return $this->repository->find($base, $target);
    }
}
