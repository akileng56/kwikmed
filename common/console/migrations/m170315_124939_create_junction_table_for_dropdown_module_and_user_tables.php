<?php

use yii\db\Migration;

/**
 * Handles the creation of table `dropdown_module_user`.
 * Has foreign keys to the tables:
 *
 * - `dropdown_module`
 * - `user`
 */
class m170315_124939_create_junction_table_for_dropdown_module_and_user_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('dropdown_module_user', [
            'dropdown_module_id' => $this->integer(),
            'user_id' => $this->integer(),
            'created_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer(),
            'PRIMARY KEY(dropdown_module_id, user_id)',
        ]);

        // creates index for column `dropdown_module_id`
        $this->createIndex(
            'idx-dropdown_module_user-dropdown_module_id',
            'dropdown_module_user',
            'dropdown_module_id'
        );

        // add foreign key for table `dropdown_module`
        $this->addForeignKey(
            'fk-dropdown_module_user-dropdown_module_id',
            'dropdown_module_user',
            'dropdown_module_id',
            'dropdown_module',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            'idx-dropdown_module_user-user_id',
            'dropdown_module_user',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-dropdown_module_user-user_id',
            'dropdown_module_user',
            'user_id',
            'user',
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
            'fk-dropdown_module_user-dropdown_module_id',
            'dropdown_module_user'
        );

        // drops index for column `dropdown_module_id`
        $this->dropIndex(
            'idx-dropdown_module_user-dropdown_module_id',
            'dropdown_module_user'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-dropdown_module_user-user_id',
            'dropdown_module_user'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-dropdown_module_user-user_id',
            'dropdown_module_user'
        );

        $this->dropTable('dropdown_module_user');
    }
}
