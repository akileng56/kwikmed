<?php

use yii\db\Migration;

/**
 * Handles the creation of table `dropdown_module_business_unit`.
 * Has foreign keys to the tables:
 *
 * - `dropdown_module`
 * - `business_unit`
 */
class m170315_125453_create_junction_table_for_dropdown_module_and_business_unit_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('dropdown_module_business_unit', [
            'dropdown_module_id' => $this->integer(),
            'business_unit_id' => $this->integer(),
            'created_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer(),
            'PRIMARY KEY(dropdown_module_id, business_unit_id)',
        ]);

        // creates index for column `dropdown_module_id`
        $this->createIndex(
            'idx-dropdown_module_business_unit-dropdown_module_id',
            'dropdown_module_business_unit',
            'dropdown_module_id'
        );

        // add foreign key for table `dropdown_module`
        $this->addForeignKey(
            'fk-dropdown_module_business_unit-dropdown_module_id',
            'dropdown_module_business_unit',
            'dropdown_module_id',
            'dropdown_module',
            'id',
            'CASCADE'
        );

        // creates index for column `business_unit_id`
        $this->createIndex(
            'idx-dropdown_module_business_unit-business_unit_id',
            'dropdown_module_business_unit',
            'business_unit_id'
        );

        // add foreign key for table `business_unit`
        $this->addForeignKey(
            'fk-dropdown_module_business_unit-business_unit_id',
            'dropdown_module_business_unit',
            'business_unit_id',
            'business_unit',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `dropdown_module`
        $this->dropForeignKey(
            'fk-dropdown_module_business_unit-dropdown_module_id',
            'dropdown_module_business_unit'
        );

        // drops index for column `dropdown_module_id`
        $this->dropIndex(
            'idx-dropdown_module_business_unit-dropdown_module_id',
            'dropdown_module_business_unit'
        );

        // drops foreign key for table `business_unit`
        $this->dropForeignKey(
            'fk-dropdown_module_business_unit-business_unit_id',
            'dropdown_module_business_unit'
        );

        // drops index for column `business_unit_id`
        $this->dropIndex(
            'idx-dropdown_module_business_unit-business_unit_id',
            'dropdown_module_business_unit'
        );

        $this->dropTable('dropdown_module_business_unit');
    }
}
