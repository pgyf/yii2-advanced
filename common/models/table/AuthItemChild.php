<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%auth_item_child}}".
 *
 * @property string $parent
 * @property string $child
 */
class AuthItemChild extends \common\lib\base\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_item_child}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'child'], 'required'],
            [['parent', 'child'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'parent' => Yii::t('common/models/AuthItemChild', 'Parent'),
            'child' => Yii::t('common/models/AuthItemChild', 'Child'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\AuthItemChildQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AuthItemChildQuery(get_called_class());
    }
}
