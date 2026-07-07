<?php

namespace App\Presentation\Controller;

use App\Application\Service\HistoryRateService;
use App\Domain\Repository\CurrencyRateRepositoryInterface;
use App\Domain\Repository\PineAppleRepositoryInterface;
use App\Http\Request;
use App\Http\Response\JsonResponse;

class PipeAppleHistoryApiController
{

    public function __construct(
        private PineAppleRepositoryInterface $pineAppleRepositoryInterface
    ) {}

    public function index(Request $request): JsonResponse
    {
        $period = strtoupper((string) $request->getString('period'));

        $allowedPeriods = [
            '1M',
            '3M',
            '6M',
            '1Y',
        ];

        if (!in_array($period, $allowedPeriods, true)) {
            return new JsonResponse(
                [
                    'error' => 'Invalid period.',
                ],
                400
            );
        }

        $graph = $this->pineAppleRepositoryInterface->getPriceHistory($period);

        return new JsonResponse(
            $graph
        );
    }
}