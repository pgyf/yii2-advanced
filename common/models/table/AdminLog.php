<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%admin_log}}".
 *
 * @property string $id
 * @property string $route
 * @property string $description
 * @property integer $create_time
 * @property string $user_id
 * @property string $ip
 */
class AdminLog extends \common\lib\base\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['create_time'], 'required'],
            [['create_time', 'user_id', 'ip'], 'integer'],
            [['route'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('models/AdminLog', 'ID'),
            'route' => Yii::t('models/AdminLog', 'Route'),
            'description' => Yii::t('models/AdminLog', 'Description'),
            'create_time' => Yii::t('models/AdminLog', 'Create Time'),
            'user_id' => Yii::t('models/AdminLog', 'User ID'),
            'ip' => Yii::t('models/AdminLog', 'Ip'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\AdminLogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AdminLogQuery(get_called_class());
    }
}
