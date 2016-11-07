<?php

use yii\db\Migration;

/**
 * Handles the creation for table `log_table`.
 */
class m160712_035418_create_log_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
       
        // system_log
        $this->createTable('{{%system_log}}', [
            'id' => $this->bigPrimaryKey()->comment("ID"),
            'level' => $this->integer()->comment("等级"),
            'category' => $this->string(255)->comment("类别"),
            'log_time' => $this->integer()->comment("日志时间"),
            'prefix' => $this->text()->comment("前缀"),
            'message' => $this->text()->comment("消息"),
        ], $tableOptions);
        
        $this->addCommentOnTable('{{%system_log}}', '系统日志表');
        
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%system_log}}');
    }
}
