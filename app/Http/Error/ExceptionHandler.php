<?php

namespace App\Http\Error;

use Throwable;
use App\Http\Response\HtmlResponse;

class ExceptionHandler
{
    public static function handle(Throwable $e): void
{
    $env = getenv('APP_ENV') ?: ($_ENV['APP_ENV'] ?? 'prod');

    // CLEAN OUTPUT BUFFER (important 🔥)
    if (ob_get_length()) {
        ob_clean();
    }

    if ($env === 'local') {
        http_response_code(500);
        echo "<pre>";
        echo $e;
        echo "</pre>";
        return;
    }

    http_response_code(500);

    (new \App\Http\Response\HtmlResponse(
        "<h1>Something went wrong</h1><p>Please try again later.</p>",
        500
    ))->send();
}
}
