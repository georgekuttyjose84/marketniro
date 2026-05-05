CREATE DATABASE IF NOT EXISTS marketniro;

USE marketniro;

-- Example table (replace with your real schema)
CREATE TABLE IF NOT EXISTS currency_rate (
    id INT AUTO_INCREMENT PRIMARY KEY,
    base_currency VARCHAR(10),
    target_currency VARCHAR(10),
    rate DECIMAL(10,5),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
