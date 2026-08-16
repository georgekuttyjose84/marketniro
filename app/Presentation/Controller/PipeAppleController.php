<?php

namespace App\Presentation\Controller;


use App\Domain\Repository\PineAppleRepositoryInterface;
use App\Http\Request;
use App\Http\Response\HtmlResponse;
use App\Infrastructure\View\PhpTemplate;

class PipeAppleController
{
    public function __construct(
        private PineAppleRepositoryInterface $pineAppleRepositoryInterface
    ) {}

    public function index(Request $request): HtmlResponse
    {
        $engine = new PhpTemplate(__DIR__ . '/../../../templates');
        $selectedDate = trim($request->getString('date'),);

        $latestPrice = $this->pineAppleRepositoryInterface->getLatestPrice();
        $selectedPrice = [];

        if ($selectedDate !== '') {
            $selectedPrice = $this->pineAppleRepositoryInterface->findSelectedDate($selectedDate);
        }

        $lastThreeMonthsPriceSummary = $this->pineAppleRepositoryInterface->getLastThreeMonthsPriceSummary();
        $lastSevenDaysPrice = $this->pineAppleRepositoryInterface->getLastSevenDaysPrice();
        $monthlyData = $this->pineAppleRepositoryInterface->getMonthlyData();


        return new HtmlResponse(
            $engine->render(
                'pages/agriculture/pineapple/pineapple-home',
                [
                    'page' => [
                        'title' => 'Pineapple Price Today | Green & Ripe Pineapple Rates | MarketNiro',
                        'description' => 'Check the latest pineapple prices today, including green and ripe pineapple rates, minimum and maximum prices, and daily market price updates.',
                        'canonical' => '/agriculture/pineapple',
                        'h1' => 'Pineapple Price Today',
                        'breadcrumb' => 'Pineapple',
                        'scripts' => [
                            'https://cdn.jsdelivr.net/npm/apexcharts',
                            '/assets/js/agriculture/pineapple.js',
                        ],
                        'styles' => [
                            '/assets/css/agriculture/pineapple.css',
                        ],

                    ],
                    'latestPrice' => $latestPrice,
                    'monthlyPriceSummary' => $lastThreeMonthsPriceSummary,
                    'lastSevenDaysPrice' => $lastSevenDaysPrice,
                    'selectedDate' => $selectedDate,
                    'selectedPrice' => $selectedPrice,
                    'monthlyData' => $monthlyData
                ]
            )
        );
    }

    public function download(Request $request): HtmlResponse
    {
        $endDate = new \DateTimeImmutable('now');
        $dateFormat = $endDate->format('Y-m-') . '01';
        $startDate = new \DateTimeImmutable($dateFormat);

        $type = $request->getString('type', '') ?: null;

        $type = $type === 'both' ? null:$type;


        $DownloadList = $this->pineAppleRepositoryInterface->pricesByDownload(
            $type,
            $startDate->format('Y-m-d'),
            $endDate->format('Y-m-d')
        );

        $filename = 'pineapple_prices_' . $startDate->format('Y-m-d') . '_' . $endDate->format('Y-m-d') . '.csv';

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Pragma: no-cache');
        header('Expires: 0');

        $output = fopen('php://output', 'w');

        fputcsv($output, [
            'Date',
            'Type',
            'Minimum Price',
            'Maximum Price',
        ]);

        foreach ($DownloadList as $row) {
            $date = new \DateTimeImmutable($row['Date']);

            fputcsv($output, [
                $date->format('jS F Y (l)'),
                $row['Type'],
                $row['Minimum Price'],
                $row['Maximum Price'],
            ]);
        }

        fclose($output);
        exit;
    }
}