<?php

namespace App\Domain\Repository;

interface RubberPriceRepositoryInterface
{
    public function getLatestDomesticPrices(): array;


    public function getLatestInternationalPrices(): array;
}