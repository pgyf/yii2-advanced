<?php

namespace common\models\table;

use Yii;

/**
 * This is the model class for table "{{%migration}}".
 *
 * @property string $version
 * @property integer $apply_time
 */
class Migration extends \common\lib\base\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%migration}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['version'], 'required'],
            [['apply_time'], 'integer'],
            [['version'], 'string', 'max' => 180]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'version' => Yii::t('common/models/Migration', 'Version'),
            'apply_time' => Yii::t('common/models/Migration', 'Apply Time'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\MigrationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\MigrationQuery(get_called_class());
    }
}
