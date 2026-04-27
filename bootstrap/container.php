<?php

use App\Container\Container;
use App\Infrastructure\Database\Connection;
use App\Infrastructure\Repository\MariaDbCurrencyRateRepository;
use App\Domain\Repository\CurrencyRateRepository;

$container = new Container();

/**
 * DB Binding
 */
$container->bind(PDO::class, function () {
    return Connection::make();
});

/**
 * Repository Binding (Interface → Implementation)
 */
$container->bind(CurrencyRateRepository::class, function ($c) {
    return new MariaDbCurrencyRateRepository(
        $c->get(PDO::class)
    );
});

return $container;

