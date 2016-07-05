<?php

use yii\db\Schema;
use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        //id字段类型
        //$fkFieldType = $this->bigInteger()->notNull();

        //创建时间
        $createTimeField = [
            'create_time' => $this->integer()->notNull(),
        ];
        //更新时间
        $updateTimeField = [
            'update_time' => $this->integer()->notNull(),
        ];
        //创建IP
        $createIpField = [
            'create_ip' => $this->bigInteger()->notNull()->defaultValue(0),
        ];
        //更新IP
        $updateIpField = [
            'update_ip' => $this->bigInteger()->notNull()->defaultValue(0),
        ];
        
        //公共字段
        $commonField = [
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
//            'disable' => $this->smallInteger()->notNull()->defaultValue(0),
//            'delete' => $this->smallInteger()->notNull()->defaultValue(0),
        ];
        
        //user表 账号手机邮箱必须有一个存在
        $this->createTable('{{%user}}', [
            'id' => $this->bigPrimaryKey(),
            'type' => $this->smallInteger()->notNull(),   //用户类型  0一般用户 99管理员 100 系统管理员
            //'role' => $this->string(32)->notNull()->defaultValue(''),
            'username' => $this->string(32),
            'mobile' => $this->string(32),
            'email' => $this->string(),
            'password' => $this->string()->notNull(),
            //'nickname' => $this->string(32)->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'access_token' => $this->string(32)->notNull(),
            'create_form_url' => $this->string()->notNull()->defaultValue(''),  //用户来源
            'create_aouth_app' => $this->smallInteger()->notNull()->defaultValue(0), //第三方应用 0未知
            'create_app' => $this->smallInteger()->notNull()->defaultValue(0),   //注册平台  0 未知
            'create_device' => $this->smallInteger()->notNull()->defaultValue(0), //注册设备 0未知
            //'password_reset_token' => $this->string()->unique(),
            //'password_reset_time' => $this->integer()->notNull(),
            //'email_verified' => $this->smallInteger()->notNull()->defaultValue(0),
            'create_user' => $this->bigInteger()->notNull()->defaultValue(0),
            'update_user' => $this->bigInteger()->notNull()->defaultValue(0),
        ] 
        + $createTimeField + $updateTimeField
        + $createIpField + $updateIpField
        + $commonField , $tableOptions);
        
        //添加唯一和索引
        $this->createIndex('user_unique_username', '{{%user}}', 'username', true);
        $this->createIndex('user_unique_email', '{{%user}}', 'email', true);
        $this->createIndex('user_unique_mobile', '{{%user}}', 'mobile', true);
        
        //user信息表
        $this->createTable('{{%user_profile}}', [
            'id' => $this->bigPrimaryKey(),
            'user_id' => $this->bigInteger()->notNull(),
            'nickname' => $this->string(32)->notNull()->defaultValue(''),
            'email' => $this->string()->notNull()->defaultValue(''),
            'gender' => $this->smallInteger()->notNull()->defaultValue(0),
            'birthday' => $this->integer()->notNull()->defaultValue(0),
            'avatar' => $this->string()->notNull()->defaultValue(''),
            'update_user' => $this->bigInteger()->notNull(),
        ] 
        + $updateTimeField
        + $updateIpField , $tableOptions);
        
        $this->createIndex('user_profile_unique_user_id', '{{%user_profile}}', 'user_id', true);
        $this->addForeignKey('user_profile_fk_user', '{{%user_profile}}', 'user_id', '{{%user}}', 'id', 'cascade');
        
        
       //用户登录表
        $this->createTable('{{%user_login}}', [
            'id' => $this->bigPrimaryKey(),
            'username' => $this->string(32)->notNull(),
            'password' => $this->string()->notNull(),
            'user_agent' => $this->string(1024)->notNull()->defaultValue(''),
            'success' => $this->smallInteger()->notNull()->defaultValue(0),
            'app' => $this->smallInteger()->notNull()->defaultValue(0),
            'ip' => $this->bigInteger()->notNull()->defaultValue(0),
            'time' => $this->integer()->notNull(),
            'device' => $this->smallInteger()->notNull()->defaultValue(0), //设备 0未知
        ], $tableOptions);
        $this->createIndex('user_login_index_username', '{{%user_login}}', 'username');
 
        
       //用户token表
        $this->createTable('{{%user_token}}', [
            'id' => $this->bigPrimaryKey(),
            'user_id' => $this->bigInteger()->notNull(),
            'type' => $this->smallInteger()->notNull(),   //类型  0验证邮箱 1邮箱找回密码 3验证手机 4手机找回密码
            'token' => $this->string()->notNull(),
            'verifies' => $this->smallInteger()->notNull()->defaultValue(0),  //是否验证
            'expires_time' => $this->integer()->notNull(),                    //过期时间
            'verifies_time' => $this->integer()->notNull()->defaultValue(0),  //验证时间
        ] + $createTimeField, 
        $tableOptions);
        $this->createIndex('user_token_unique_token', '{{%user_token}}', 'token',true);
        
        
        // insert admin user: neo/neo
        $security = Yii::$app->security;
        $time = time();
        $columns = ['type','username', 'password', 'status', 'create_time', 'update_time', 'auth_key','access_token'];
        $this->batchInsert('{{%user}}', $columns, [
            [
                100,
                'admini',
                '$2y$13$CZnwZMiXt4T.DXkcjaeXtudk1.NX5.Tth5WJlZGVDYsvhw7piZBmS', // 123456
                10,
                $time,
                $time,
                $security->generateRandomString(),
                $security->generateRandomString(),
            ],
            [
                99,
                'admin',
                '$2y$13$CZnwZMiXt4T.DXkcjaeXtudk1.NX5.Tth5WJlZGVDYsvhw7piZBmS', // 123456
                10,
                $time,
                time(),
                $security->generateRandomString(),
                $security->generateRandomString(),
            ],
        ]);
        // insert profile data
        $columns = ['user_id', 'name','update_time'];
        $this->batchInsert('{{%user_profile}}', $columns, [
            [1, '系统管理员', date('Y-m-d H:i:s')],
            [2, '管理员', date('Y-m-d H:i:s')],
        ]);
        
        
       //操作日志表
        $this->createTable('{{%action_log}}', [
            'id' => $this->bigPrimaryKey(),
            'user_id' => $this->bigInteger()->notNull(),
            'ip' => $this->bigInteger()->notNull()->defaultValue(0),
            'type' => $this->string(32)->notNull(),
            'controller' => $this->string(128)->notNull()->defaultValue(''),
            'action' => $this->string(128)->notNull()->defaultValue(''),
            'table_name' => $this->string(128)->notNull(),
            'description' => $this->string(128)->notNull()->defaultValue(''),
            'old_data' => $this->text(),
            'data' => $this->text(),
            'app' => $this->smallInteger()->notNull()->defaultValue(0),
        ] + $createTimeField, $tableOptions);
        $this->createIndex('action_log_index_user_id', '{{%action_log}}', 'user_id');
        
    }

    public function safeDown()
    {
        $this->dropTable('{{%user_profile}}');
        $this->dropTable('{{%user_token}}');
        $this->dropTable('{{%user}}');
        $this->dropTable('{{%user_login}}');
        $this->dropTable('{{%action_log}}');
    }
}
