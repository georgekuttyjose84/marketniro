<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/Http/helpers.php';
putenv('APP_ENV=local');
$_ENV['APP_ENV'] = 'local';
