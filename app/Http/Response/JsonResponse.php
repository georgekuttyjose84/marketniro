<?php

namespace App\Http\Response;

class JsonResponse extends Response
{
    public function __construct(mixed $data, int $status = 200)
    {
        parent::__construct(
            json_encode(
                $data,
                JSON_UNESCAPED_UNICODE |
                JSON_UNESCAPED_SLASHES
            ),
            $status,
            [
                'Content-Type' => 'application/json'
            ]
        );
    }
}
