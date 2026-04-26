<?php

use Phinx\Migration\AbstractMigration;

final class CreateAutoTestTable extends AbstractMigration
{
    public function change(): void
    {
        // SAFE: prevents duplicate error
        if (!$this->hasTable('auto_test')) {

            $table = $this->table('auto_test');

            $table
                ->addColumn('note', 'string', ['limit' => 255])
                ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                ->create();

            $this->execute("
                INSERT INTO auto_test (note) VALUES
                ('AUTO MIGRATION SUCCESS'),
                ('CI/CD FULLY WORKING');
            ");
        }
    }
}
