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
 * @property integer $app
 * @property string $ip
 * @property integer $time
 * @property integer $device
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
            [['success', 'app', 'ip', 'time', 'device'], 'integer'],
            [['username'], 'string', 'max' => 32],
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
            'id' => Yii::t('common/models/UserLogin', 'ID'),
            'username' => Yii::t('common/models/UserLogin', 'Username'),
            'password' => Yii::t('common/models/UserLogin', 'Password'),
            'user_agent' => Yii::t('common/models/UserLogin', 'User Agent'),
            'success' => Yii::t('common/models/UserLogin', 'Success'),
            'app' => Yii::t('common/models/UserLogin', 'App'),
            'ip' => Yii::t('common/models/UserLogin', 'Ip'),
            'time' => Yii::t('common/models/UserLogin', 'Time'),
            'device' => Yii::t('common/models/UserLogin', 'Device'),
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
