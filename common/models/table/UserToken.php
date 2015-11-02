<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%user_token}}".
 *
 * @property string $id
 * @property string $user_id
 * @property integer $type
 * @property string $token
 * @property integer $verifies
 * @property integer $expires_time
 * @property integer $verifies_time
 * @property integer $create_time
 */
class UserToken extends \common\lib\base\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_token}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'type', 'token', 'expires_time', 'create_time'], 'required'],
            [['user_id', 'type', 'verifies', 'expires_time', 'verifies_time', 'create_time'], 'integer'],
            [['token'], 'string', 'max' => 255],
            [['token'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common/models/UserToken', 'ID'),
            'user_id' => Yii::t('common/models/UserToken', 'User ID'),
            'type' => Yii::t('common/models/UserToken', 'Type'),
            'token' => Yii::t('common/models/UserToken', 'Token'),
            'verifies' => Yii::t('common/models/UserToken', 'Verifies'),
            'expires_time' => Yii::t('common/models/UserToken', 'Expires Time'),
            'verifies_time' => Yii::t('common/models/UserToken', 'Verifies Time'),
            'create_time' => Yii::t('common/models/UserToken', 'Create Time'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\UserTokenQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\UserTokenQuery(get_called_class());
    }
}
