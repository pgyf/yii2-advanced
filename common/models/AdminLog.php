<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use common\lib\helpers\Tools;
use common\lib\behaviors\IpBehavior;

/**
 * This is the model class for table "{{%admin_log}}".
 *
 * @property string $id
 * @property string $route
 * @property string $description
 * @property integer $create_time
 * @property string $user_id
 * @property string $ip
 */
class AdminLog extends \common\models\table\AdminLog
{
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create_time',
                'updatedAtAttribute' => false,
                'value' => function(){
                    return Tools::getServerTime();
                },
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'user_id',
                'updatedByAttribute' => false,
            ],
            [
                'class' => IpBehavior::className(),
                'createIpAttributes' => 'ip',
                'updateIpAttributes' => false,
            ],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
       return [
            [['description'], 'string'],
            //[['create_time'], 'required'],
            //['ip','filter','filter' => 'ip2long'],
            [['create_time', 'user_id', 'ip'], 'integer'],
            [['route'], 'string', 'max' => 255],
            //[['user_id'], 'exist','targetClass' => User::className(),'targetAttribute' => 'id'],
        ];
    }
}
