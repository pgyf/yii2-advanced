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
        
        // admin_log
        $this->createTable('{{%admin_log}}', [
            'id' => $this->bigPrimaryKey()->comment("ID"),
            'route' => $this->string(255)->notNull()->defaultValue('')->comment("路由"),
            'description' => $this->text()->comment("描述"),
            'create_time'=>$this->integer()->notNull()->comment("创建时间"),
            'user_id' => $this->bigInteger()->notNull()->defaultValue(0)->comment("操作用户ID"),
            'ip' => $this->bigInteger()->notNull()->defaultValue(0)->comment("操作IP"),
        ], $tableOptions);
        $this->addCommentOnTable('{{%admin_log}}', '后台操作日志表');
        $this->createIndex('index_admin_log_user_id', '{{%admin_log}}', 'user_id');
        
        
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
        $this->dropTable('{{%admin_log}}');
        $this->dropTable('{{%system_log}}');
    }
}
