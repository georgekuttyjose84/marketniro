<?php

namespace App\Infrastructure\Http;

use App\Presentation\Controller\CurrencyRateConvertorController;

class Router
{
    private array $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function dispatch(string $uri): void
    {
        foreach ($this->routes as $route => $handler) {

            $pattern = preg_replace('#\{[a-zA-Z]+\}#', '([a-zA-Z]+)', $route);
            $pattern = "#^$pattern$#";

            if (preg_match($pattern, $uri, $matches)) {

                array_shift($matches);

                [$controller, $method] = $handler;

                $instance = new $controller();

                $instance->$method(...$matches);

                return;
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}
