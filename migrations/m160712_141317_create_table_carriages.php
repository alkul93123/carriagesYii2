<?php

use yii\db\Migration;
use yii\db\Schema;

class m160712_141317_create_table_carriages extends Migration
{
    public function up()
    {
      $this->createTable('carriages', [
        'id'              => 'pk',
        'carriage_number' => Schema::TYPE_INTEGER . ' NOT NULL',
        'carriage_kind'   => Schema::TYPE_DATE,
        'carriage_owner'  => Schema::TYPE_INTEGER,
      ]);
    }

    public function down()
    {
        echo "m160712_141317_create_table_carriages cannot be reverted.\n";

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
