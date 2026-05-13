<?php

use App\Container\Container;
use App\Infrastructure\Database\Connection;
use App\Infrastructure\Repository\CurrencyRateRepository;
use App\Domain\Repository\CurrencyRateRepositoryInterface;
use PDO;

$container = new Container();

$container->bind(PDO::class, function () {
    return Connection::make();
});

$container->bind(CurrencyRateRepositoryInterface::class, function ($c) {
    return new CurrencyRateRepository(
        $c->get(PDO::class)
    );
});

return $container;

