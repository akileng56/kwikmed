<?php

use yii\db\Migration;

/**
 * Handles the creation of table `business_unit_user`.
 * Has foreign keys to the tables:
 *
 * - `business_unit`
 * - `user`
 */
class m170327_104830_create_junction_table_for_business_unit_and_user_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('business_unit_leaders', [
            'business_unit_id' => $this->integer(),
            'user_id' => $this->integer(),
            'created_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer(),
            'PRIMARY KEY(business_unit_id, user_id)',
        ]);

        // creates index for column `business_unit_id`
        $this->createIndex(
            'idx-business_unit_user-business_unit_id',
            'business_unit_leaders',
            'business_unit_id'
        );

        // add foreign key for table `business_unit`
        $this->addForeignKey(
            'fk-business_unit_user-business_unit_id',
            'business_unit_leaders',
            'business_unit_id',
            'business_unit',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            'idx-business_unit_user-user_id',
            'business_unit_leaders',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-business_unit_user-user_id',
            'business_unit_leaders',
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
        // drops foreign key for table `business_unit`
        $this->dropForeignKey(
            'fk-business_unit_user-business_unit_id',
            'business_unit_leaders'
        );

        // drops index for column `business_unit_id`
        $this->dropIndex(
            'idx-business_unit_user-business_unit_id',
            'business_unit_leaders'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-business_unit_user-user_id',
            'business_unit_leaders'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-business_unit_user-user_id',
            'business_unit_leaders'
        );

        $this->dropTable('business_unit_leaders');
    }
}
