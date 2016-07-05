<?php

use yii\db\Migration;

class m160529_145625_key_storage_item extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci';
        }
        $this->createTable('{{%key_storage_item}}', [
            'key' => $this->string(128)->notNull(),
            'value' => $this->text()->notNull(),
            'comment' => $this->text(),
            'create_user' => $this->bigInteger()->notNull()->defaultValue(0),
            'update_user' => $this->bigInteger()->notNull()->defaultValue(0),
            'create_time'=>$this->integer()->notNull(),
            'update_time'=>$this->integer()->notNull()
        ], $tableOptions);
        $this->addPrimaryKey('pk_key_storage_item_key', '{{%key_storage_item}}', 'key');
        $this->createIndex('idx_key_storage_item_key', '{{%key_storage_item}}', 'key', true);
    }
    public function down()
    {
        $this->dropTable('{{%key_storage_item}}');
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
