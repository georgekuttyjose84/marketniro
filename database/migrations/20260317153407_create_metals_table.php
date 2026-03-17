<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateMetalsTable extends AbstractMigration
{
    public function up(): void
    {
        $this->execute("
            CREATE TABLE metals (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(50),
                price DECIMAL(15,6),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ");
    }

    public function down(): void
    {
        $this->execute("DROP TABLE metals");
    }
}
