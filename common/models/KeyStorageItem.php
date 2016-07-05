<?php
namespace common\models;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "key_storage_item".
 *
 * @property integer $key
 * @property integer $value
 */
class KeyStorageItem extends \common\models\table\KeyStorageItem
{

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create_time',
                'updatedAtAttribute' => 'update_time',
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'create_user',
                'updatedByAttribute' => 'update_user',
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'value'], 'required'],
            [['key'], 'string', 'max' => 128],
            [['value', 'comment'], 'safe'],
            [['key'], 'unique']
        ];
    }
 
}