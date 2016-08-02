<?php

use yii\db\Migration;

class m160321_160629_create_module_table extends Migration
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
        
        $this->createTable('{{%module}}', [
            'id' => $this->bigPrimaryKey(),
            'name' => $this->string(64)->notNull(),
            'class' => $this->string(128)->notNull(),
            'title' => $this->string(128)->notNull(),
            'icon' => $this->string(32)->notNull(),
            'settings' => $this->text(),
            'notice' => $this->integer()->defaultValue(0),
            'order_num' => $this->integer(),
            'status' => $this->smallInteger()->defaultValue(0),
            'create_user' => $this->bigInteger()->notNull()->defaultValue(0),
            'update_user' => $this->bigInteger()->notNull()->defaultValue(0),
        ] 
        + $createTimeField + $updateTimeField
        + $createIpField + $updateIpField
        , $tableOptions);
        
        //添加唯一和索引
        $this->createIndex('module_unique_name', '{{%module}}', 'name', true);
   
        
    }

    public function safeDown()
    {
        $this->dropTable('{{%module}}');
    }
}
