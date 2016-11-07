<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%admin}}".
 *
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $nickname
 * @property string $auth_key
 * @property string $access_token
 * @property string $created_uid
 * @property string $updated_uid
 * @property string $login_ip
 * @property integer $login_at
 * @property integer $deleted_at
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $created_ip
 * @property string $updated_ip
 * @property integer $status
 * @property integer $blocked_at
 */
class Admin extends \common\lib\base\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password', 'nickname', 'auth_key', 'access_token', 'created_at', 'updated_at'], 'required'],
            [['created_uid', 'updated_uid', 'login_ip', 'login_at', 'deleted_at', 'created_at', 'updated_at', 'created_ip', 'updated_ip', 'status', 'blocked_at'], 'integer'],
            [['username', 'nickname', 'auth_key', 'access_token'], 'string', 'max' => 32],
            [['password'], 'string', 'max' => 255],
            [['username'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common/models/Admin', 'ID'),
            'username' => Yii::t('common/models/Admin', 'Username'),
            'password' => Yii::t('common/models/Admin', 'Password'),
            'nickname' => Yii::t('common/models/Admin', 'Nickname'),
            'auth_key' => Yii::t('common/models/Admin', 'Auth Key'),
            'access_token' => Yii::t('common/models/Admin', 'Access Token'),
            'created_uid' => Yii::t('common/models/Admin', 'Created Uid'),
            'updated_uid' => Yii::t('common/models/Admin', 'Updated Uid'),
            'login_ip' => Yii::t('common/models/Admin', 'Login Ip'),
            'login_at' => Yii::t('common/models/Admin', 'Login At'),
            'deleted_at' => Yii::t('common/models/Admin', 'Deleted At'),
            'created_at' => Yii::t('common/models/Admin', 'Created At'),
            'updated_at' => Yii::t('common/models/Admin', 'Updated At'),
            'created_ip' => Yii::t('common/models/Admin', 'Created Ip'),
            'updated_ip' => Yii::t('common/models/Admin', 'Updated Ip'),
            'status' => Yii::t('common/models/Admin', 'Status'),
            'blocked_at' => Yii::t('common/models/Admin', 'Blocked At'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\AdminQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AdminQuery(get_called_class());
    }
}
