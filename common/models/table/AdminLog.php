<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%admin_log}}".
 *
 * @property string $id
 * @property string $route
 * @property string $description
 * @property integer $created_at
 * @property string $uid
 * @property string $created_ip
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
            [['created_at'], 'required'],
            [['created_at', 'uid', 'created_ip'], 'integer'],
            [['route'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common/models/AdminLog', 'ID'),
            'route' => Yii::t('common/models/AdminLog', 'Route'),
            'description' => Yii::t('common/models/AdminLog', 'Description'),
            'created_at' => Yii::t('common/models/AdminLog', 'Created At'),
            'uid' => Yii::t('common/models/AdminLog', 'Uid'),
            'created_ip' => Yii::t('common/models/AdminLog', 'Created Ip'),
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
