<?php

$env = getenv('PHINX_ENV') ?: 'local';

return [
    'paths' => [
        'migrations' => 'database/migrations',
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => $env,

        'local' => [
            'adapter' => 'mysql',
            'host' => '127.0.0.1',
            'name' => 'marketniro',
            'user' => 'root',
            'pass' => 'root',
            'port' => 3307, // your mapped port
            'charset' => 'utf8mb4',
        ],

        'docker' => [
            'adapter' => 'mysql',
            'host' => 'marketniro-mariadb',
            'name' => 'marketniro',
            'user' => 'root',
            'pass' => 'root',
            'port' => 3306,
            'charset' => 'utf8mb4',
        ],
    ],
];
