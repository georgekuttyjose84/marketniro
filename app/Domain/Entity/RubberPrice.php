<?php

namespace App\Domain\Entity;

use App\Domain\Enum\Method;
use App\Domain\Enum\RubberGrade;
use App\Domain\Enum\RubberMarketType;
use App\Domain\Enum\RubberPlace;
use DateTimeImmutable;

class RubberPrice
{
    public function __construct(
        public readonly int $id,
        public readonly float $amountInRupee,
        public readonly float $amountInDollar,
        public readonly RubberGrade $grade,
        public readonly RubberPlace $place,
        public readonly RubberMarketType $marketType,
        public readonly string $priceDate,
        public Method $method,
        public DateTimeImmutable $createdAt
    ) {}
}