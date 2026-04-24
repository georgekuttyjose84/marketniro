<?php

use Phinx\Migration\AbstractMigration;

final class CreateTestTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('test');

        $table
            ->addColumn('name', 'string', ['limit' => 100])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();

        // insert sample data
        $this->execute("
            INSERT INTO test (name) VALUES
            ('CI/CD Working'),
            ('MarketNiro Test Success');
        ");
    }
}
