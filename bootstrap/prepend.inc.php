<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/Http/helpers.php';
putenv('APP_ENV=local');
$_ENV['APP_ENV'] = 'local';

function pp() {
    $arguments = func_get_args();
    foreach ($arguments as $argument) 
    {
        echo '<pre>'. print_r($argument, true) .'</pre>';
    }
}

function dd() {
    $arguments = func_get_args();
    foreach ($arguments as $argument) 
    {
        echo '<pre>'. print_r($argument, true) .'</pre>';
    }

    exit();
}