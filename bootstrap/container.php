<?php

use App\Container\Container;
use App\Domain\Repository\PineAppleRepositoryInterface;
use App\Infrastructure\Database\Connection;
use App\Infrastructure\Repository\CurrencyRateRepository;
use App\Domain\Repository\CurrencyRateRepositoryInterface;
use App\Infrastructure\Repository\PineAppleRepository;
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

$container->bind(PineAppleRepositoryInterface::class, function ($c) {
    return new PineAppleRepository(
        $c->get(PDO::class)
    );
});

return $container;

