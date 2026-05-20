CREATE DATABASE IF NOT EXISTS marketniro
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

CREATE USER IF NOT EXISTS 'marketniro_app'@'%' IDENTIFIED BY 'secret';
GRANT ALL PRIVILEGES ON marketniro.* TO 'marketniro_app'@'%';
FLUSH PRIVILEGES;

USE marketniro;

CREATE TABLE IF NOT EXISTS currency_rate (
    id INT AUTO_INCREMENT PRIMARY KEY,
    base_currency VARCHAR(10),
    target_currency VARCHAR(10),
    rate DECIMAL(10,5),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);