<?php

namespace App\Domain\Entity;

class GraphData implements \JsonSerializable
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

    public function jsonSerialize(): array
    {
        return [

            'base' => $this->base,

            'target' => $this->target,

            'period' => $this->period,

            'current' => $this->current,

            'high' => $this->high,

            'low' => $this->low,

            'lastUpdated' => $this->lastUpdated,

            'points' => $this->points

        ];
    }
}