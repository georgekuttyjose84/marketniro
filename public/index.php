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


$pdo = Connection::make();

echo "Database Connected";
echo "<h1>FINAL CI/CD SUCCESS ✅</h1>";

$repo = new MariaDbCurrencyRateRepository();
$service = new CurrencyRateService($repo);

$service->storeRate("USD", "EUR", 0.91);

$rate = $service->getRate("USD", "EUR");

echo "USD/EUR = " . $rate->rate;
echo "<h1>ZERO TEST 2ffb</h1>";

echo "GEORGEKUTTY JOSE";


echo "<h2>Items List</h2>";

try {
    $pdo = \App\Infrastructure\Database\Connection::make();

    $stmt = $pdo->query("SELECT * FROM items");
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Price</th><th>Created At</th></tr>";

    foreach ($items as $item) {
        echo "<tr>";
        echo "<td>{$item['name']}</td>";
        echo "<td>{$item['price']}</td>";
        echo "<td>{$item['created_at']}</td>";
        echo "</tr>";
    }

    echo "</table>";

} catch (Exception $e) {
    echo "<p>Items not available yet</p>";
}
