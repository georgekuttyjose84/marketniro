<?php

namespace App\Presentation\Controller;

use App\Application\Service\CurrencyRateService;
use App\Infrastructure\Repository\MariaDbCurrencyRateRepository;

class CurrencyRateController
{
    public function show(string $base, string $target): void
    {
        $repo = new MariaDbCurrencyRateRepository();
        $service = new CurrencyRateService($repo);

        $rate = $service->getRate($base, $target);

        header('Content-Type: application/json');

        if (!$rate) {
            http_response_code(404);

            echo json_encode([
                'error' => 'Rate not found'
            ]);

            return;
        }

        echo json_encode([
            'base' => $rate->baseCurrency,
            'target' => $rate->targetCurrency,
            'rate' => $rate->rate
        ]);
    }
}
