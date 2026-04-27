<?php

require_once __DIR__ . '/../bootstrap/prepend.inc.php'; // ✅ ADD THIS
require_once __DIR__ . '/../vendor/autoload.php';

use App\Routing\Router;
use App\Http\Error\ExceptionHandler;

ini_set('display_errors', 0);
error_reporting(E_ALL);
ob_start();

try {

    $container = require __DIR__ . '/../bootstrap/container.php';
    $routes = require __DIR__ . '/../app/Presentation/routes.php';

    $router = new Router($routes, $container);

    $router->dispatch(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

} catch (\Throwable $e) {
    ExceptionHandler::handle($e);
}
