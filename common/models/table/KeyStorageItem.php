<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%key_storage_item}}".
 *
 * @property string $key
 * @property string $value
 * @property string $comment
 * @property string $create_user
 * @property string $update_user
 * @property integer $create_time
 * @property integer $update_time
 */
class KeyStorageItem extends \common\lib\base\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%key_storage_item}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'value', 'create_time', 'update_time'], 'required'],
            [['value', 'comment'], 'string'],
            [['create_user', 'update_user', 'create_time', 'update_time'], 'integer'],
            [['key'], 'string', 'max' => 128],
            [['key'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'key' => Yii::t('models/KeyStorageItem', 'Key'),
            'value' => Yii::t('models/KeyStorageItem', 'Value'),
            'comment' => Yii::t('models/KeyStorageItem', 'Comment'),
            'create_user' => Yii::t('models/KeyStorageItem', 'Create User'),
            'update_user' => Yii::t('models/KeyStorageItem', 'Update User'),
            'create_time' => Yii::t('models/KeyStorageItem', 'Create Time'),
            'update_time' => Yii::t('models/KeyStorageItem', 'Update Time'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\KeyStorageItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\KeyStorageItemQuery(get_called_class());
    }
}
