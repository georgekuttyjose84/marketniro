<?php

namespace App\Infrastructure\Database;

use PDO;

class Connection
{
    public static function make(): PDO
    {
        $host = 'marketniro-mariadb';
        $db   = 'marketniro';
        $user = 'root';
        $pass = 'root';

        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

        return new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
}
