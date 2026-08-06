<?php

namespace App\Presentation\Controller;


use App\Domain\Repository\PineAppleRepositoryInterface;
use App\Http\Request;
use App\Http\Response\HtmlResponse;
use App\Infrastructure\View\PhpTemplate;

class AboutUs
{
    public function __construct(
        private PineAppleRepositoryInterface $pineAppleRepositoryInterface
    ) {}

    public function index(Request $request): HtmlResponse
    {
        $engine = new PhpTemplate(__DIR__ . '/../../../templates');
        $selectedDate = trim($request->getString('date'),);
        $monthlyData = $this->pineAppleRepositoryInterface->getMonthlyData();


        return new HtmlResponse(
            $engine->render(
                'pages/about-us-test',
                [
                    'page' => [
                        'title' => '',
                        'description' => '',
                        'canonical' => '',
                        'h1' => '',
                        'breadcrumb' => '',
                    ],
                ]
            )
        );
    }
}