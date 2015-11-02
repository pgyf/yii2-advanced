<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%auth_assignment}}".
 *
 * @property string $item_name
 * @property string $user_id
 * @property integer $created_at
 */
class AuthAssignment extends \common\lib\base\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_assignment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_name', 'user_id'], 'required'],
            [['created_at'], 'integer'],
            [['item_name', 'user_id'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_name' => Yii::t('common/models/AuthAssignment', 'Item Name'),
            'user_id' => Yii::t('common/models/AuthAssignment', 'User ID'),
            'created_at' => Yii::t('common/models/AuthAssignment', 'Created At'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\AuthAssignmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AuthAssignmentQuery(get_called_class());
    }
}
