<?php

namespace App\Presentation\Controller;

use App\Http\Response\HtmlResponse;
use App\Infrastructure\View\PhpTemplate;

class HomeController
{
    public function index(): HtmlResponse
    {
        $engine = new PhpTemplate(__DIR__ . '/../../../templates');

        return new HtmlResponse(
            $engine->render('pages/home', [])
        );
    }
}