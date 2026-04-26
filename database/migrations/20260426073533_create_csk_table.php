<?php

use Phinx\Migration\AbstractMigration;

final class CreateCskTable extends AbstractMigration
{
    public function change(): void
    {
        // SAFE: prevents duplicate error
        if (!$this->hasTable('csk')) {

            $table = $this->table('csk');

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
