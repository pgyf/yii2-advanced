<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%user_login}}".
 *
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $user_agent
 * @property integer $success
 * @property string $app
 * @property string $ip
 * @property integer $time
 * @property string $device
 */
class UserLogin extends \common\lib\base\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_login}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'time'], 'required'],
            [['success', 'ip', 'time'], 'integer'],
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
            'id' => Yii::t('models/UserLogin', 'ID'),
            'username' => Yii::t('models/UserLogin', 'Username'),
            'password' => Yii::t('models/UserLogin', 'Password'),
            'user_agent' => Yii::t('models/UserLogin', 'User Agent'),
            'success' => Yii::t('models/UserLogin', 'Success'),
            'app' => Yii::t('models/UserLogin', 'App'),
            'ip' => Yii::t('models/UserLogin', 'Ip'),
            'time' => Yii::t('models/UserLogin', 'Time'),
            'device' => Yii::t('models/UserLogin', 'Device'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\UserLoginQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\UserLoginQuery(get_called_class());
    }
}
