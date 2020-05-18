<?php

use yii\db\Migration;

class m170315_124215_drop_user_and_biz_unit_module_tables extends Migration
{
    public function up()
    {
        $this->dropTable("user_module");
        $this->dropTable("business_unit_module");
    }

    public function down()
    {
        echo "m170315_124215_drop_user_and_biz_unit_module_tables cannot be reverted.\n";

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
