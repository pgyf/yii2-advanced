<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%auth_item}}".
 *
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $rule_name
 * @property string $data
 * @property integer $created_at
 * @property integer $updated_at
 */
class AuthItem extends \common\lib\base\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_item}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('common/models/AuthItem', 'Name'),
            'type' => Yii::t('common/models/AuthItem', 'Type'),
            'description' => Yii::t('common/models/AuthItem', 'Description'),
            'rule_name' => Yii::t('common/models/AuthItem', 'Rule Name'),
            'data' => Yii::t('common/models/AuthItem', 'Data'),
            'created_at' => Yii::t('common/models/AuthItem', 'Created At'),
            'updated_at' => Yii::t('common/models/AuthItem', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\AuthItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AuthItemQuery(get_called_class());
    }
}
