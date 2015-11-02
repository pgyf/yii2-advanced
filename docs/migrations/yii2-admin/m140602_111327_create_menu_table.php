<?php

use yii\db\Schema;
use mdm\admin\components\Configs;

/**
 * Migration table of table_menu
 * 
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class m140602_111327_create_menu_table extends \yii\db\Migration
{

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $menuTable = Configs::instance()->menuTable;
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable($menuTable, [
            'id' => $this->bigPrimaryKey(),
            'name' => $this->string(128)->notNull(),
            'label' => $this->string(128)->notNull(),
            'parent' => $this->bigInteger(),
            'route' => $this->string(256)->notNull()->defaultValue(''),
            'icon' => $this->string(128)->notNull()->defaultValue(''),
            'order' => $this->bigInteger()->defaultValue(0),
            'data' => $this->text(),
            'description' => $this->string(128)->notNull()->defaultValue(''),
            "FOREIGN KEY (parent) REFERENCES {$menuTable}(id) ON DELETE SET NULL ON UPDATE CASCADE",
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable(Configs::instance()->menuTable);
    }
}
