<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateRubberPrice extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('rubber_price', ['id' => true, 'primary_key' => 'id',]);

        $table
            ->addColumn('amount_in_rupee', 'decimal', ['precision' => 12, 'scale' => 2, 'null' => false,])
            ->addColumn('amount_in_dollar', 'decimal', ['precision' => 12, 'scale' => 2, 'null' => false,])
            ->addColumn('grade', 'enum', ['values' => ['rss1', 'rss2', 'rss3', 'rss4', 'rss5', 'isnr20', 'smr20', 'latex_60',], 'null' => false,])
            ->addColumn('place', 'enum', ['values' => ['kottayam', 'kochi', 'agartala', 'bangkok', 'kuala_lumpur',], 'null' => false,])
            ->addColumn('market_type', 'enum', ['values' => ['domestic', 'international',], 'null' => false,])
            ->addColumn('price_date', 'date', ['null' => false,])
            ->addColumn('method', 'enum', ['values' => ['cron', 'manual',], 'default' => 'cron', 'null' => false,])
            ->addColumn('created_at', 'biginteger', ['signed' => false, 'null' => false,])
            ->addIndex(['grade', 'place', 'price_date',], ['unique' => true, 'name' => 'unique_rubber_price',])
            ->addIndex(['price_date'], ['name' => 'idx_rubber_price_date',])
            ->addIndex(['place', 'grade',], ['name' => 'idx_rubber_place_grade',])
            ->create();
    }
}
