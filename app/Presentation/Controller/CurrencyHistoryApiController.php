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

        if($from === 'XAU' or $from === 'XAG'){
            $troyOunceInGrams = 31.1034768;
            $graph->current = $graph->current/$troyOunceInGrams;
            $graph->high = $graph->high/$troyOunceInGrams;
            $graph->low = $graph->low/$troyOunceInGrams;
            foreach ($graph->points as $index => $row) {
                $graph->points[$index]->rate = $graph->points[$index]->rate / $troyOunceInGrams;
            }
        }

        return new JsonResponse(
            $graph
        );
    }
}