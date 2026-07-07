<?php

namespace App\Domain\Entity;

use App\Domain\Enum\Method;
use App\Domain\Enum\PineAppleType;
use DateTimeImmutable;

class PineApple
{


    public function __construct(
        public int $id,
        public PineAppleType $type,
        public float $minPrice,
        public float $maxPrice,
        public float $avgPrice,
        public string $priceDate,
        public Method $method,
        public DateTimeImmutable $createdAt
    ) {

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getType(): PineAppleType
    {
        return $this->type;
    }

    public function getMinPrice(): float
    {
        return $this->minPrice;
    }

    public function getMaxPrice(): float
    {
        return $this->maxPrice;
    }

    public function getAvgPrice(): float
    {
        return $this->avgPrice;
    }

    public function getPriceDate(): string
    {
        return $this->priceDate;
    }

    public function getMethod(): Method
    {
        return $this->method;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }
}