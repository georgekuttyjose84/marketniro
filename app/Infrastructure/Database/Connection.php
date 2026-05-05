<?php

namespace App\Infrastructure\Database;

use PDO;
use PDOException;

class Connection
{
    public static function make(): PDO
    {
        $host = 'marketniro-mariadb';
        $user = 'root';
        $pass = 'root';
        $db   = 'marketniro';

        try {
            return new PDO(
                "mysql:host=$host;dbname=$db",
                $user,
                $pass,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {

            // 🔥 AUTO-FIX: recreate DB if missing
            if (str_contains($e->getMessage(), 'Unknown database')) {

                $pdo = new PDO(
                    "mysql:host=$host",
                    $user,
                    $pass,
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                );

                $pdo->exec("CREATE DATABASE IF NOT EXISTS $db");

                return new PDO(
                    "mysql:host=$host;dbname=$db",
                    $user,
                    $pass,
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                );
            }

            throw $e;
        }
    }
}
