<?php

use Phinx\Migration\AbstractMigration;

class CreateCurrencyRatesTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('currency_rates');

        $table
            ->addColumn('base_currency', 'string', ['limit' => 3])
            ->addColumn('target_currency', 'string', ['limit' => 3])
            ->addColumn('rate', 'decimal', ['precision' => 10, 'scale' => 6])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }
}
