<?php

declare(strict_types=1);

require_once __DIR__ . '/../bootstrap/prepend.inc.php';

use App\Infrastructure\Http\Router;
use App\Infrastructure\Database\Connection;
use App\Application\Service\CurrencyRateService;
use App\Infrastructure\Repository\MariaDbCurrencyRateRepository;

$routes = require __DIR__ . '/../app/Presentation/routes.php';

$router = new Router($routes);

$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);

$router->dispatch($uri);
