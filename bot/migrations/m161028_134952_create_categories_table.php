<?php

use yii\db\Migration;

/**
 * Handles the creation of table `categories`.
 */
class m161028_134952_create_categories_table extends Migration {

    /**
     * @inheritdoc
     */
    public function up() {
        //Categories for dropdownlists
        $this->createTable('dropdown_category', array(
            'id' => $this->primaryKey(),
            'name' => $this->string(225),
            'description' => $this->string(2000),
            'table_name' => $this->string(100),
            'created_date' => $this->dateTime(),
            'created_by' => $this->integer(),
            'record_status' => $this->integer()->defaultValue(1),
                ), '');
    }

    /**
     * @inheritdoc
     */
    public function down() {
        $this->dropTable('categories');
    }

}
