<?php

namespace App\Domain\Entity;

use JsonSerializable;

class HistoryPoint implements JsonSerializable
{
    public function __construct(

        public string $label,

        public float $rate,

        public int $createdAt

    ) {}

    public function jsonSerialize(): array
    {
        return [

            'label' => $this->label,

            'rate' => $this->rate,

            'createdAt' => $this->createdAt

        ];
    }

}