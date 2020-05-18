<?php

use yii\db\Migration;

/**
 * Changes in the schema of the tables in the client module
 */
class m161031_190055_client_db_schema_changes extends Migration {

    public function up() {
        //Add the following fields in the Retainer Table
        $this->addColumn('client_retainer_contract', 'retainer_service', 'integer');
        $this->addColumn('client_retainer_contract', 'contact_name', 'varchar(50)');
        $this->addColumn('client_retainer_contract', 'contact_telephone1', 'varchar(50)');
        $this->addColumn('client_retainer_contract', 'contact_telephone2', 'varchar(50)');
        $this->addColumn('client_retainer_contract', 'contact_email', 'varchar(100)');
        $this->addColumn('client_retainer_contract', 'reference_no', 'varchar(50)');
        
        //Add a field in the client table (ask if they are on retainer, or not
        $this->addColumn('client', 'is_retainer', 'integer');
        $this->addColumn('client', 'retainer_end_date', 'date');
    }

    public function down() {
        echo "m161031_190055_client_db_schema_changes cannot be reverted.\n";

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
