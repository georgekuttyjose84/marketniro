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

        /*
         * Normalize the period.
         *
         * This allows:
         *
         * 6M
         * 6m
         *
         * to be treated the same way.
         */
        $period = strtoupper($period);

        /*
         * Calculate the actual start timestamp.
         *
         * IMPORTANT:
         * We are no longer calculating a number of rows.
         * We calculate the actual date range.
         */
        $since = match ($period) {

            '24H' => time() - (24 * 3600),

            '7D' => time() - (7 * 24 * 3600),

            '1M' => strtotime('-1 month'),

            '3M' => strtotime('-3 months'),

            '6M' => strtotime('-6 months'),

            '1Y' => strtotime('-1 year'),

            default => time() - (24 * 3600),

        };

        /*
         * Same currency.
         */
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

        /*
         * USD -> TARGET
         */
        if ($base === 'USD') {

            $rows = $this->repo->getHistory(
                target: $target,
                since: $since
            );
        }

        /*
         * BASE -> USD
         *
         * Database stores:
         *
         * USD -> BASE
         *
         * Therefore:
         *
         * BASE -> USD = 1 / (USD -> BASE)
         */
        elseif ($target === 'USD') {

            $rows = $this->repo->getHistory(
                target: $base,
                since: $since
            );

            foreach ($rows as &$row) {

                if ((float) $row['rate'] == 0) {
                    continue;
                }

                $row['rate'] = 1 / (float) $row['rate'];
            }

            unset($row);
        }

        /*
         * BASE -> TARGET
         *
         * Example:
         *
         * EUR -> INR
         *
         * We have:
         *
         * USD -> EUR
         * USD -> INR
         *
         * Therefore:
         *
         * EUR -> INR
         *
         * = (USD -> INR) / (USD -> EUR)
         */
        else {

            $fromRows = $this->repo->getHistory(
                target: $base,
                since: $since
            );

            $toRows = $this->repo->getHistory(
                target: $target,
                since: $since
            );

            /*
             * Index BASE rates by timestamp.
             *
             * This is important.
             *
             * We must NOT match records using array position.
             */
            $fromLookup = [];

            foreach ($fromRows as $row) {

                $createdAt = (int) $row['created_at'];

                $fromLookup[$createdAt] = (float) $row['rate'];
            }

            $rows = [];

            foreach ($toRows as $row) {

                $createdAt = (int) $row['created_at'];

                /*
                 * No matching timestamp.
                 */
                if (!isset($fromLookup[$createdAt])) {
                    continue;
                }

                $fromRate = $fromLookup[$createdAt];

                if ($fromRate == 0) {
                    continue;
                }

                $rows[] = [

                    'created_at' => $createdAt,

                    'rate' => (float) $row['rate'] / $fromRate

                ];
            }
        }

        /*
         * No data.
         */
        if (empty($rows)) {

            return new GraphData(

                base: $base,

                target: $target,

                period: $period,

                current: 0,

                high: 0,

                low: 0,

                lastUpdated: time(),

                points: []

            );
        }

        /*
         * Rows should already be ASC because
         * repository returns ASC.
         *
         * Still sort here because cross-currency
         * calculations can change ordering.
         */
        usort(
            $rows,
            function ($a, $b) {
                return (int) $a['created_at']
                    <=> (int) $b['created_at'];
            }
        );

        $points = [];

        $high = PHP_FLOAT_MIN;

        $low = PHP_FLOAT_MAX;

        /*
         * Create graph points.
         */
        foreach ($rows as $row) {

            $rate = (float) $row['rate'];

            $createdAt = (int) $row['created_at'];

            /*
             * Label based on selected period.
             */
            $label = match ($period) {

                '24H' => date('H:i', $createdAt),

                '7D' => date('d M', $createdAt),

                '1M' => date('d M', $createdAt),

                '3M' => date('d M', $createdAt),

                '6M' => date('d M', $createdAt),

                '1Y' => date('M Y', $createdAt),

                default => date('H:i', $createdAt),

            };

            $points[] = new HistoryPoint(

                label: $label,

                rate: $rate,

                createdAt: $createdAt

            );

            /*
             * High.
             */
            $high = max(
                $high,
                $rate
            );

            /*
             * Low.
             */
            $low = min(
                $low,
                $rate
            );
        }

        /*
         * Latest point.
         */
        $lastPoint = end($points);

        $current = $lastPoint
            ? $lastPoint->rate
            : 0;

        $lastUpdated = $lastPoint
            ? $lastPoint->createdAt
            : time();

        /*
         * Final response.
         */
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