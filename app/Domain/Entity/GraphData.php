<?php

namespace App\Domain\Entity;

class GraphData
{
    /**
     * @param HistoryPoint[] $points
     */
    public function __construct(

        public string $base,

        public string $target,

        public string $period,

        public float $current,

        public float $high,

        public float $low,

        public int $lastUpdated,

        public array $points

    ) {}
}