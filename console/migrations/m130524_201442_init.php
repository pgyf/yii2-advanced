<?php

use yii\db\Schema;
use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        //公共字段
        $commonField = [
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'disabled' => $this->smallInteger()->notNull()->defaultValue(0),
            'delete' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_id' => $this->integer()->notNull(),
            'updated_id' => $this->integer()->notNull(),
            'created_time' => $this->integer()->notNull(),
            'updated_time' => $this->integer()->notNull(),
        ];
        
       //admin表
        $this->createTable('{{%admin}}', [
            'id' => $this->bigPrimaryKey(),
            'username' => $this->string(32)->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'auth_key' => $this->string(32)->notNull(),
        ] + $commonField, $tableOptions);
        //$this->createIndex('user_unique_username', '{{%admin}}', $columns);
        
        
       //admin登录表
        $this->createTable('{{%admin_login}}', [
            'id' => $this->bigPrimaryKey(),
            'username' => $this->string(32)->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'ip' => $this->bigInteger()->notNull()->defaultValue(0),
            'user_agent' => $this->string(1024)->notNull()->defaultValue(''),
            'success' => $this->smallInteger()->notNull()->defaultValue(0),
            'app' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_time' => $this->integer()->notNull(),
        ], $tableOptions);
        
        //user表
        $this->createTable('{{%user}}', [
            'id' => $this->bigPrimaryKey(),
            'username' => $this->string(32)->notNull()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'password_reset_time' => $this->integer()->notNull(),
            'email_verified' => $this->smallInteger()->notNull()->defaultValue(0),
        ] + $commonField, $tableOptions);
        
        //user信息表
        $this->createTable('{{%user_profile}}', [
            'id' => $this->bigPrimaryKey(),
            'user_id' => $this->integer()->notNull(),
            'name' => $this->string(32)->notNull()->defaultValue(''),
            'email' => $this->string()->notNull()->defaultValue(''),
            'gender' => $this->smallInteger()->notNull()->defaultValue(0),
            'birthday' => $this->integer()->notNull()->defaultValue(0),
            'avatar' => $this->string()->notNull()->defaultValue(''),
            'created_time' => $this->integer()->notNull(),
            'updated_time' => $this->integer()->notNull(),
        ], $tableOptions);
        
    }

    public function down()
    {
        $this->dropTable('{{%admin}}');
        $this->dropTable('{{%admin_login}}');
        $this->dropTable('{{%user}}');
        $this->dropTable('{{%user_profile}}');
    }
}
