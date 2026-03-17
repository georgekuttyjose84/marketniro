<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateMetalsTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('metals');

        $table->addColumn('name', 'string') // gold, silver
              ->addColumn('price', 'decimal', ['precision' => 10, 'scale' => 2])
              ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
              ->create();
    }
}
