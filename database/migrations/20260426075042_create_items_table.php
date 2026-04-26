<?php

use Phinx\Migration\AbstractMigration;

final class CreateItemsTable extends AbstractMigration
{
    public function change(): void
    {
        if (!$this->hasTable('items')) {

            $table = $this->table('items');

            $table
                ->addColumn('name', 'string', ['limit' => 100])
                ->addColumn('price', 'decimal', ['precision' => 10, 'scale' => 2])
                ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                ->create();

            $this->execute("
                INSERT INTO items (name, price) VALUES
                ('Laptop', 75000.00),
                ('Mobile', 25000.00),
                ('Headphones', 3000.00);
            ");
        }
    }
}
