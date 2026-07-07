<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreatePineapplePrice extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('pineapple_price', ['id' => true, 'primary_key' => 'id',]);

        $table->addColumn('type','enum',['values' => ['green','ripe',],'null' => false,])
              ->addColumn('min_price','decimal',['precision' => 10,'scale' => 2,'null' => false,])
              ->addColumn('max_price','decimal',['precision' => 10,'scale' => 2,'null' => false,])
              ->addColumn('avg_price','decimal',['precision' => 10,'scale' => 2,'null' => false,])
              ->addColumn('price_date','date',['null' => false,])
              ->addColumn('method','enum',['values' => ['cron','manual',],'default' => 'cron','null' => false,])
              ->addColumn('created_at','biginteger',['signed' => false,'null' => false,])
              ->addIndex(['type','price_date',],['unique' => true,'name' => 'unique_type_price_date',])
              ->addIndex( ['price_date',],['name' => 'idx_price_date',])
              ->create();
    }
}
