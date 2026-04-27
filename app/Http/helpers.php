<?php

use App\Http\Response\HtmlResponse;
use App\Infrastructure\View\PhpTemplate;

if (!function_exists('view')) {
    function view(string $template, array $data = []): HtmlResponse
    {
        $engine = new PhpTemplate(__DIR__ . '/../../templates');

        $html = $engine->render($template, $data);

        return new HtmlResponse($html);
    }
}
