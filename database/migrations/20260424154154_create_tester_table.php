<?php

use Phinx\Migration\AbstractMigration;

final class CreateTesterTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('tester');

        $table
            ->addColumn('name', 'string', ['limit' => 100])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();

        $this->execute("
            INSERT INTO tester (name) VALUES
            ('CI ?CD FOR LAST TEST'),
            ('I LOVE YOU');
        ");
    }
}
