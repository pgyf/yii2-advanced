<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%admin_login}}".
 *
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $user_agent
 * @property integer $success
 * @property string $app
 * @property string $ip
 * @property integer $created_at
 * @property string $device
 */
class AdminLogin extends \common\lib\base\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin_login}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'created_at'], 'required'],
            [['success', 'ip', 'created_at'], 'integer'],
            [['username', 'app', 'device'], 'string', 'max' => 32],
            [['password'], 'string', 'max' => 255],
            [['user_agent'], 'string', 'max' => 1024]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common/models/AdminLogin', 'ID'),
            'username' => Yii::t('common/models/AdminLogin', 'Username'),
            'password' => Yii::t('common/models/AdminLogin', 'Password'),
            'user_agent' => Yii::t('common/models/AdminLogin', 'User Agent'),
            'success' => Yii::t('common/models/AdminLogin', 'Success'),
            'app' => Yii::t('common/models/AdminLogin', 'App'),
            'ip' => Yii::t('common/models/AdminLogin', 'Ip'),
            'created_at' => Yii::t('common/models/AdminLogin', 'Created At'),
            'device' => Yii::t('common/models/AdminLogin', 'Device'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\AdminLoginQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AdminLoginQuery(get_called_class());
    }
}
