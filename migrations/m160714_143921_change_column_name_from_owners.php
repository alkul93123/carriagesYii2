<?php

use yii\db\Migration;
use yii\db\Schema;

class m160714_143921_change_column_name_from_owners extends Migration
{
    public function up()
    {
      $this->alterColumn('owners', 'name', Schema::TYPE_TEXT);
    }

    public function down()
    {
        echo "m160714_143921_change_column_name_from_owners cannot be reverted.\n";

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
