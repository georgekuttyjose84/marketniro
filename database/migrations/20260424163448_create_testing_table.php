<?php

use Phinx\Migration\AbstractMigration;

final class CreateTestingTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('testing');

        $table
            ->addColumn('message', 'string', ['limit' => 255])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();

        $this->execute("
            INSERT INTO testing (message) VALUES
            ('CI/CD WORKING'),
            ('MarketNiro FINAL SUCCESS');
        ");
    }
}
