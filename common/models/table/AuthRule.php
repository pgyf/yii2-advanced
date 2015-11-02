<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%auth_rule}}".
 *
 * @property string $name
 * @property string $data
 * @property integer $created_at
 * @property integer $updated_at
 */
class AuthRule extends \common\lib\base\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_rule}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['data'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('common/models/AuthRule', 'Name'),
            'data' => Yii::t('common/models/AuthRule', 'Data'),
            'created_at' => Yii::t('common/models/AuthRule', 'Created At'),
            'updated_at' => Yii::t('common/models/AuthRule', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\AuthRuleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AuthRuleQuery(get_called_class());
    }
}
