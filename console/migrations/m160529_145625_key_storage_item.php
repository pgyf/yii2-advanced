<?php

use yii\db\Migration;

class m160529_145625_key_storage_item extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%key_storage_item}}', [
            'key' => $this->string(128)->notNull()->comment('键'),
            'value' => $this->text()->notNull()->comment('值'),
            'comment' => $this->text()->comment('备注'),
            'create_user' => $this->bigInteger()->notNull()->defaultValue(0)->comment('创建人'),
            'update_user' => $this->bigInteger()->notNull()->defaultValue(0)->comment('修改人'),
            'create_time'=>$this->integer()->notNull()->comment('创建时间'),
            'update_time'=>$this->integer()->notNull()->comment('修改时间'),
        ], $tableOptions);
        $this->addPrimaryKey('pk_key_storage_item_key', '{{%key_storage_item}}', 'key');
        $this->addCommentOnTable('{{%key_storage_item}}', '键值存储');
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
