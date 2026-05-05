<?php

use Phinx\Migration\AbstractMigration;

final class CreateCurrencyRate extends AbstractMigration
{
    public function change(): void
    {
        if (!$this->hasTable('currency_rate')) {

            $table = $this->table('currency_rate', ['id' => 'id']);

            $table
                ->addColumn('base_currency', 'string', ['limit' => 3, 'null' => true])
                ->addColumn('target_currency', 'string', ['limit' => 3, 'null' => true])
                ->addColumn('rate', 'decimal', ['precision' => 15, 'scale' => 6, 'null' => true])
                ->addColumn('created_at', 'biginteger', ['null' => true])
                ->create();
        }
    }
}
