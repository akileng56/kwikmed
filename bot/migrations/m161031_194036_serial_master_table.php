<?php

use yii\db\Migration;

class m161031_194036_serial_master_table extends Migration {

    public function up() {
        //Create The lands Table
        $this->createTable('dropdown_serial_master', array(
            'id' => 'pk',
            'code' => 'varchar(50) NOT NULL',
            'serial_no' => 'varchar(50) NOT NULL',
            'created_at' => $this->integer(),
            'created_by' => $this->integer(),
            'serial_count' => $this->integer()
                ), '');
    }

    public function down() {
        echo "m161031_194036_serial_master_table cannot be reverted.\n";

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
