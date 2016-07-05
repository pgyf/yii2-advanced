<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property string $id
 * @property integer $type
 * @property string $username
 * @property string $mobile
 * @property string $email
 * @property string $password
 * @property string $auth_key
 * @property string $access_token
 * @property string $create_form_url
 * @property integer $create_aouth_app
 * @property integer $create_app
 * @property integer $create_device
 * @property string $create_user
 * @property string $update_user
 * @property integer $create_time
 * @property integer $update_time
 * @property string $create_ip
 * @property string $update_ip
 * @property integer $status
 */
class User extends \common\lib\base\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'password', 'auth_key', 'access_token', 'create_time', 'update_time'], 'required'],
            [['type', 'create_aouth_app', 'create_app', 'create_device', 'create_user', 'update_user', 'create_time', 'update_time', 'create_ip', 'update_ip', 'status'], 'integer'],
            [['username', 'mobile', 'auth_key', 'access_token'], 'string', 'max' => 32],
            [['email', 'password', 'create_form_url'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['mobile'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('models/User', 'ID'),
            'type' => Yii::t('models/User', 'Type'),
            'username' => Yii::t('models/User', 'Username'),
            'mobile' => Yii::t('models/User', 'Mobile'),
            'email' => Yii::t('models/User', 'Email'),
            'password' => Yii::t('models/User', 'Password'),
            'auth_key' => Yii::t('models/User', 'Auth Key'),
            'access_token' => Yii::t('models/User', 'Access Token'),
            'create_form_url' => Yii::t('models/User', 'Create Form Url'),
            'create_aouth_app' => Yii::t('models/User', 'Create Aouth App'),
            'create_app' => Yii::t('models/User', 'Create App'),
            'create_device' => Yii::t('models/User', 'Create Device'),
            'create_user' => Yii::t('models/User', 'Create User'),
            'update_user' => Yii::t('models/User', 'Update User'),
            'create_time' => Yii::t('models/User', 'Create Time'),
            'update_time' => Yii::t('models/User', 'Update Time'),
            'create_ip' => Yii::t('models/User', 'Create Ip'),
            'update_ip' => Yii::t('models/User', 'Update Ip'),
            'status' => Yii::t('models/User', 'Status'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\UserQuery(get_called_class());
    }
}
