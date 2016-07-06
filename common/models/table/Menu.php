<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%menu}}".
 *
 * @property string $id
 * @property string $name
 * @property string $label
 * @property string $parent
 * @property string $route
 * @property string $icon
 * @property string $order
 * @property string $data
 * @property string $description
 */
class Menu extends \common\lib\base\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'label'], 'required'],
            [['parent', 'order'], 'integer'],
            [['data'], 'string'],
            [['name', 'label', 'icon', 'description'], 'string', 'max' => 128],
            [['route'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('models/Menu', 'ID'),
            'name' => Yii::t('models/Menu', 'Name'),
            'label' => Yii::t('models/Menu', 'Label'),
            'parent' => Yii::t('models/Menu', 'Parent'),
            'route' => Yii::t('models/Menu', 'Route'),
            'icon' => Yii::t('models/Menu', 'Icon'),
            'order' => Yii::t('models/Menu', 'Order'),
            'data' => Yii::t('models/Menu', 'Data'),
            'description' => Yii::t('models/Menu', 'Description'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\MenuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\MenuQuery(get_called_class());
    }
}
