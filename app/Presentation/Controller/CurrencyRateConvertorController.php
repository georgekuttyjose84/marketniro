<?php

namespace App\Presentation\Controller;

use App\Http\Request;
use App\Http\Response\HtmlResponse;
use App\Domain\Repository\CurrencyRateRepository;

class CurrencyRateConvertorController
{
    public function __construct(
        private CurrencyRateRepository $repo
    ) {}

    public function index(Request $request): HtmlResponse
    {
        $rates = $this->repo->all();


        // echo "<pre>";
        // print_r($rates);
        // echo "</pre>";
        // exit();


        return view('finance/home', [
            'rates' => $rates
        ]);
    }
}
