<?php

namespace App\Domain\Entity;

class HistoryPoint
{
    public function __construct(

        public string $label,

        public float $rate,

        public int $createdAt

    ) {}

}