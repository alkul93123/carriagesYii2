<?php

use yii\db\Migration;
use yii\db\Schema;

class m160712_142720_create_table_owners extends Migration
{
    public function up()
    {
      $this->createTable('owners', [
        'id'    =>  'pk',
        'name'  => Schema::TYPE_INTEGER,
      ]);
    }

    public function down()
    {
        echo "m160712_142720_create_table_owners cannot be reverted.\n";

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
