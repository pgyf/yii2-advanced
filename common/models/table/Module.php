<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%module}}".
 *
 * @property string $id
 * @property string $name
 * @property string $class
 * @property string $title
 * @property string $icon
 * @property string $settings
 * @property integer $notice
 * @property integer $order_num
 * @property integer $status
 * @property string $create_user
 * @property string $update_user
 * @property integer $create_time
 * @property integer $update_time
 * @property string $create_ip
 * @property string $update_ip
 */
class Module extends \common\lib\base\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%module}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'class', 'title', 'icon', 'create_time', 'update_time'], 'required'],
            [['settings'], 'string'],
            [['notice', 'order_num', 'status', 'create_user', 'update_user', 'create_time', 'update_time', 'create_ip', 'update_ip'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['class', 'title'], 'string', 'max' => 128],
            [['icon'], 'string', 'max' => 32],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common/models/ModuleModule', 'ID'),
            'name' => Yii::t('common/models/ModuleModule', 'Name'),
            'class' => Yii::t('common/models/ModuleModule', 'Class'),
            'title' => Yii::t('common/models/ModuleModule', 'Title'),
            'icon' => Yii::t('common/models/ModuleModule', 'Icon'),
            'settings' => Yii::t('common/models/ModuleModule', 'Settings'),
            'notice' => Yii::t('common/models/ModuleModule', 'Notice'),
            'order_num' => Yii::t('common/models/ModuleModule', 'Order Num'),
            'status' => Yii::t('common/models/ModuleModule', 'Status'),
            'create_user' => Yii::t('common/models/ModuleModule', 'Create User'),
            'update_user' => Yii::t('common/models/ModuleModule', 'Update User'),
            'create_time' => Yii::t('common/models/ModuleModule', 'Create Time'),
            'update_time' => Yii::t('common/models/ModuleModule', 'Update Time'),
            'create_ip' => Yii::t('common/models/ModuleModule', 'Create Ip'),
            'update_ip' => Yii::t('common/models/ModuleModule', 'Update Ip'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\ModuleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ModuleQuery(get_called_class());
    }
}
