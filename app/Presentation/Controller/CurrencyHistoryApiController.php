<?php

namespace App\Presentation\Controller;

use App\Application\Service\HistoryRateService;
use App\Domain\Repository\CurrencyRateRepositoryInterface;
use App\Http\Request;
use App\Http\Response\JsonResponse;

class CurrencyHistoryApiController
{

    public function __construct(
        private CurrencyRateRepositoryInterface $repo
    ) {}

    public function index(Request $request): JsonResponse
    {
        $from = $request->getString('from', 'USD');

        $to = $request->getString('to', 'INR');

        $period = $request->getString('period', '24H');

        $service = new HistoryRateService(
            $this->repo
        );

        $graph = $service->getHistory(
            base: $from,
            target: $to,
            period: $period
        );

        return new JsonResponse(
            $graph
        );
    }
}