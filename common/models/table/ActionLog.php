<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%action_log}}".
 *
 * @property string $id
 * @property string $user_id
 * @property string $ip
 * @property string $type
 * @property string $controller
 * @property string $action
 * @property string $table_name
 * @property string $description
 * @property string $old_data
 * @property string $data
 * @property integer $app
 * @property integer $create_time
 */
class ActionLog extends \common\lib\base\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%action_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'type', 'table_name', 'create_time'], 'required'],
            [['user_id', 'ip', 'app', 'create_time'], 'integer'],
            [['old_data', 'data'], 'string'],
            [['type'], 'string', 'max' => 32],
            [['controller', 'action', 'table_name', 'description'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common/models/ActionLog', 'ID'),
            'user_id' => Yii::t('common/models/ActionLog', 'User ID'),
            'ip' => Yii::t('common/models/ActionLog', 'Ip'),
            'type' => Yii::t('common/models/ActionLog', 'Type'),
            'controller' => Yii::t('common/models/ActionLog', 'Controller'),
            'action' => Yii::t('common/models/ActionLog', 'Action'),
            'table_name' => Yii::t('common/models/ActionLog', 'Table Name'),
            'description' => Yii::t('common/models/ActionLog', 'Description'),
            'old_data' => Yii::t('common/models/ActionLog', 'Old Data'),
            'data' => Yii::t('common/models/ActionLog', 'Data'),
            'app' => Yii::t('common/models/ActionLog', 'App'),
            'create_time' => Yii::t('common/models/ActionLog', 'Create Time'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\ActionLogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ActionLogQuery(get_called_class());
    }
}
