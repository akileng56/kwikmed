<?php

use yii\db\Migration;

/**
 * Add support for system modules
 */
class m170315_081058_add_system_modules extends Migration
{
    public function up()
    {
        //1. Add a dropdown list of system modules
        $this->createTable('dropdown_module', [
            'id' =>  $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'created_at'=> $this->integer(),//Epoch time when this record was created
            'created_by'=> $this->integer(),
            'updated_at'=> $this->integer(),
            'updated_by'=> $this->integer()//Epoch time when this record was updated
        ]);
        
        //2. Relationship between users and system modules
        $this->createTable('user_module', [
            'user_id' => $this->integer()->notNull(),
            'module_id' => $this->integer()->notNull(),
        ]);
        
        //3. Relationship between business units and modules
        $this->createTable('business_unit_module', [
            'business_unit_id' => $this->integer()->notNull(),
            'module_id' => $this->integer()->notNull()
        ]);
    }

    /**
     * Rempove the tables
     */
    public function down()
    {
        $this->dropTable('dropdown_module');
        $this->dropTable('user_module');
        $this->dropTable('business_unit_module');
    }
}
