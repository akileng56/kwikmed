<?php

use yii\db\Migration;

/**
 * Handles the creation of table `email_archive`.
 */
class m170411_120104_create_email_archive_table extends Migration {

    /**
     * @inheritdoc
     */
    public function up() {
        $this->createTable('email_archive', [
            'id' => $this->primaryKey(),
            'message' => $this->text(),
            'email_from' => $this->string(255),
            'email_to' => $this->string(255),
            'file_attachment' => $this->string(255),
            'msg_type' => $this->string(20),
            'ticket_id' => $this->integer(),
            'sent_at' => $this->timestamp()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down() {
        $this->dropTable('email_archive');
    }

}
