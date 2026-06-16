<?php

namespace App\Application\Service;

use App\Domain\Entity\GraphData;
use App\Domain\Entity\HistoryPoint;
use App\Domain\Repository\CurrencyRateRepositoryInterface;

class HistoryRateService
{
    public function __construct(
        private CurrencyRateRepositoryInterface $repo
    ) {}

    public function getHistory(
        string $base,
        string $target,
        string $period = '24H'
    ): GraphData {

        $limit = match ($period) {

            '24H' => 24,

            '7D' => 24 * 7,

            '30D' => 24 * 30,

            '90D' => 24 * 90,

            '1Y' => 24 * 365,

            default => 24,

        };

        // Same Currency
        if ($base === $target) {

            return new GraphData(

                base: $base,

                target: $target,

                period: $period,

                current: 1,

                high: 1,

                low: 1,

                lastUpdated: time(),

                points: []

            );

        }

        // USD -> TARGET

        if ($base === 'USD') {

            $rows = $this->repo->getHistory(
                target: $target,
                limit: $limit
            );

        }

        // BASE -> USD

        elseif ($target === 'USD') {

            $rows = $this->repo->getHistory(
                target: $base,
                limit: $limit
            );

            foreach ($rows as &$row) {

                if ($row['rate'] == 0) {
                    continue;
                }

                $row['rate'] = 1 / $row['rate'];

            }

        }
        else {
            $fromRows = $this->repo->getHistory(
                target: $base,
                limit: $limit
            );
            $toRows = $this->repo->getHistory(
                target: $target,
                limit: $limit
            );
            $rows = [];
            $count = min(
                count($fromRows),
                count($toRows)
            );
            for ($i = 0; $i < $count; $i++) {

                if ($fromRows[$i]['rate'] == 0) {
                    continue;
                }

                $rows[] = [

                    'created_at' => $toRows[$i]['created_at'],

                    'rate' => $toRows[$i]['rate'] / $fromRows[$i]['rate']

                ];

            }

        }

        $points = [];

        $high = PHP_FLOAT_MIN;

        $low = PHP_FLOAT_MAX;

        foreach ($rows as $row) {

            $rate = (float) $row['rate'];

            $createdAt = (int) $row['created_at'];

            $label = match ($period) {

                '24H' => date('H:i', $createdAt),

                '7D' => date('d M H:i', $createdAt),

                '1M' => date('d M', $createdAt),

                '90D' => date('d M', $createdAt),

                '1Y' => date('M Y', $createdAt),

                default => date('H:i', $createdAt),

            };

            $points[] = new HistoryPoint(

                label: $label,

                rate: $rate,

                createdAt: $createdAt

            );

            $high = max(
                $high,
                $rate
            );

            $low = min(
                $low,
                $rate
            );

        }

        $current = count($points)
            ? end($points)->rate
            : 0;

        $lastUpdated = count($points)
            ? end($points)->createdAt
            : time();

        return new GraphData(

            base: $base,

            target: $target,

            period: $period,

            current: $current,

            high: $high,

            low: $low,

            lastUpdated: $lastUpdated,

            points: $points

        );

    }

}