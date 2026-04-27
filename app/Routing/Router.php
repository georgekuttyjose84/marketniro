<?php

namespace App\Routing;

use App\Container\Container;
use App\Http\Request;
use App\Http\Response\Response;

class Router
{
    private array $routes;
    private array $middlewares = [];

    public function __construct(
        array $routes,
        private Container $container
    ) {
        $this->routes = $routes;
    }

    public function addMiddleware(callable $middleware): void
    {
        $this->middlewares[] = $middleware;
    }

    public function dispatch(string $uri): void
    {
        $request = $this->container->get(Request::class);

        foreach ($this->routes as $route => $handler) {

            $pattern = preg_replace('#\{[a-zA-Z]+\}#', '([a-zA-Z]+)', $route);
            $pattern = "#^$pattern$#";

            if (preg_match($pattern, $uri, $matches)) {

                array_shift($matches);

                [$controllerClass, $method] = $handler;

                $controller = $this->container->get($controllerClass);

                // 🔥 middleware
                foreach ($this->middlewares as $middleware) {
                    $middleware($request);
                }

                // 🔥 method injection
                $this->callMethod($controller, $method, $request, $matches);

                return;
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }

   private function callMethod(object $controller, string $method, $request, array $params)
	{
        if (!method_exists($controller, $method)) {
       	 throw new \Exception("Method $method not found");
    	}

   	 $reflection = new \ReflectionMethod($controller, $method);

   	 $args = [];

   	 foreach ($reflection->getParameters() as $param) {
       	 $type = $param->getType();

        	if ($type && $type->getName() === \App\Http\Request::class) {
           	 $args[] = $request;
       	 } else {
        	    $args[] = array_shift($params);
       	 }
   	 }

   	 $response = $reflection->invokeArgs($controller, $args);

   	 if ($response instanceof Response) {
        	$response->send();
        	return;
    	}

    	// fallback (not recommended)
    	echo $response;
	}
}
