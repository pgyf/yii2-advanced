<?php

use yii\db\Migration;

/**
 * Handles the creation for table `admin`.
 */
class m160927_152235_create_admin_table extends Migration
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
 
        //admin管理员表
        $this->createTable('{{%admin}}', [
            'id' => $this->bigPrimaryKey()->comment("ID"),
            'username' => $this->string(32)->comment("账号"),
            'password' => $this->string()->notNull()->comment("密码"),
            'nickname' => $this->string(32)->notNull()->comment("昵称"),
            'auth_key' => $this->string(32)->notNull()->comment("auth_key"),
            'access_token' => $this->string(32)->notNull()->comment("access_token"),
            'created_uid' => $this->bigInteger()->notNull()->defaultValue(0)->comment("创建人"),
            'updated_uid' => $this->bigInteger()->notNull()->defaultValue(0)->comment("更新人"),
            'login_ip' => $this->bigInteger()->notNull()->defaultValue(0)->comment("最近登录IP"),
            'login_at' => $this->integer()->notNull()->defaultValue(0)->comment("最近登录时间"),
            'deleted_at' => $this->integer()->notNull()->defaultValue(0)->comment("删除时间"),
            'created_at' => $this->integer()->notNull()->comment("创建时间"),
            'updated_at' => $this->integer()->notNull()->comment("更新时间"),
            'created_ip' => $this->bigInteger()->notNull()->defaultValue(0)->comment("创建IP"),
            'updated_ip' => $this->bigInteger()->notNull()->defaultValue(0)->comment("更新IP"),
            'status' => $this->smallInteger()->notNull()->defaultValue(0)->comment("状态"),
            'blocked_at' => $this->integer()->notNull()->defaultValue(0)->comment("锁定时间"),
        ] , $tableOptions);
        $this->addCommentOnTable('{{%admin}}', '管理员表');
        //添加唯一和索引
        $this->createIndex('admin_unique_username', '{{%admin}}', 'username', true);
       
        
        
       //admin_login登录记录表
        $this->createTable('{{%admin_login}}', [
            'id' => $this->bigPrimaryKey()->comment("ID"),
            'username' => $this->string(32)->notNull()->comment("账号"),
            'password' => $this->string()->notNull()->comment("密码"),
            'user_agent' => $this->string(1024)->notNull()->defaultValue('')->comment("user_agent"),
            'success' => $this->smallInteger()->notNull()->defaultValue(0)->comment("是否成功"),
            'app' => $this->string(32)->notNull()->defaultValue('')->comment("应用"),
            'ip' => $this->bigInteger()->notNull()->defaultValue(0)->comment("登录IP"),
            'created_at' => $this->integer()->notNull()->comment("登录时间"),
            'device' => $this->string(32)->notNull()->defaultValue('')->comment("设备"),
        ], $tableOptions);
        $this->addCommentOnTable('{{%admin_login}}', '管理员登录表');
        $this->createIndex('admin_login_index_username', '{{%admin_login}}', 'username');
        
        
        
        
        
        // admin_log日志表
        $this->createTable('{{%admin_log}}', [
            'id' => $this->bigPrimaryKey()->comment("ID"),
            'route' => $this->string(255)->notNull()->defaultValue('')->comment("路由"),
            'description' => $this->text()->comment("描述"),
            'created_at'=>$this->integer()->notNull()->comment("操作时间"),
            'uid' => $this->bigInteger()->notNull()->defaultValue(0)->comment("管理员ID"),
            'created_ip' => $this->bigInteger()->notNull()->defaultValue(0)->comment("操作IP"),
        ], $tableOptions);
        $this->addCommentOnTable('{{%admin_log}}', '管理员操作日志表');
        $this->createIndex('admin_log_index_uid', '{{%admin_log}}', 'uid');

        
        
        
        //插入管理员用户数据
        $security = Yii::$app->security;
        $time = time();
        $columns = ['username', 'password', 'nickname','created_at', 'updated_at', 'auth_key','access_token'];
        $this->batchInsert('{{%admin}}', $columns, [
            [
                'root',
                '$2y$13$CZnwZMiXt4T.DXkcjaeXtudk1.NX5.Tth5WJlZGVDYsvhw7piZBmS', // 123456
                '系统管理员',
                $time,
                $time,
                $security->generateRandomString(),
                $security->generateRandomString(),
            ],
            [
                'admin',
                '$2y$13$CZnwZMiXt4T.DXkcjaeXtudk1.NX5.Tth5WJlZGVDYsvhw7piZBmS', // 123456
                '管理员',
                $time,
                time(),
                $security->generateRandomString(),
                $security->generateRandomString(),
            ],
        ]);

        
        
        
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%admin}}');
        $this->dropTable('{{%admin_login}}');
        $this->dropTable('{{%admin_log}}');
    }
}
