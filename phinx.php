<?php

return
[
    'paths' => [
        'migrations' => 'database/migrations',
    ],

    'environments' => [
        'default_migration_table' => 'phinxlog',

        'default_environment' => 'development',

        'development' => [
            'adapter' => 'mysql',
            'host' => 'marketniro-mariadb',
            'name' => 'marketniro',
            'user' => 'root',
            'pass' => 'root',
            'port' => 3306,
            'charset' => 'utf8mb4'
        ]
    ]
];
