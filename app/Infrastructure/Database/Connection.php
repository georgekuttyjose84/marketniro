<?php

namespace App\Infrastructure\Database;

use PDO;
use PDOException;
use RuntimeException;

class Connection
{
    public static function make(): PDO
    {
        $host = getenv('DB_HOST') ?: 'marketniro-mariadb';
        $db   = getenv('DB_NAME') ?: 'marketniro';
        $user = getenv('DB_USER') ?: 'marketniro_app';
        $pass = getenv('DB_PASS') ?: 'secret';

        try {
            return new PDO(
                "mysql:host=$host;dbname=$db;charset=utf8mb4",
                $user,
                $pass,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ]
            );
        } catch (PDOException $e) {
            throw new RuntimeException(
                "Database connection failed. Check DB host, name, username, password, and grants.",
                0,
                $e
            );
        }
    }
}