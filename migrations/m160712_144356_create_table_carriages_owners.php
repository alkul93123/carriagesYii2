<?php

use yii\db\Migration;
use yii\db\Schema;

class m160712_144356_create_table_carriages_owners extends Migration
{
    public function up()
    {
      $this->createTable('carriages_owners',[
        'id'  =>  'pk',
        'carriage_id' => Schema::TYPE_INTEGER,
        'owner_id'    => Schema::TYPE_INTEGER,
        'date_from'   => Schema::TYPE_DATE,
        'date_to'     => Schema::TYPE_DATE,
      ]);
    }

    public function down()
    {
        echo "m160712_144356_create_table_carriages_owners cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
