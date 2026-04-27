<?php

namespace App\Http\Middleware;

use App\Http\Request;

class AuthMiddleware
{
    public function handle(Request $request): void
    {
        // Example check
        if ($request->getString('token') !== 'secret') {
            http_response_code(401);
            echo "Unauthorized";
            exit;
        }
    }
}
