<?php

namespace App\Application\Service;

use App\Domain\Repository\CurrencyRateRepositoryInterface;
use DateTimeImmutable;
use DateTimeZone;

class HourlyComparisonService
{
    public function __construct(
        private CurrencyRateRepositoryInterface $repo
    ) {}

    public function getComparison(
        string $base,
        string $target
    ): array {

        $timezone = new DateTimeZone('Asia/Kolkata');

        $currentHour = (int) (
        new DateTimeImmutable(
            'now',
            $timezone
        )
        )->format('G');

        if ($base === $target) {

            return [];

        }

        return $this->repo->getHourlyComparison(
            base: $base,
            target: $target
        );

    }
}