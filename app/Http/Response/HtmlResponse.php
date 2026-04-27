<?php

namespace App\Http\Response;

class HtmlResponse extends Response
{
    public function __construct(string $html, int $status = 200)
    {
        parent::__construct(
            $html,
            $status,
            ['Content-Type' => 'text/html']
        );
    }
}

