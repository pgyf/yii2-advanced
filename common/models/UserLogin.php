<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use common\lib\helpers\Tools;

/**
 * Description of UserLogin
 *
 * @author     lyf <381296986@qq.com>
 * @date       2015-11-1
 */
class UserLogin extends \common\models\table\UserLogin{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'time',
                'updatedAtAttribute' => false,
                'value' => function(){
                    return Tools::getServerTime();
                },
            ],
        ];
    }
    
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['ip','filter','filter' => 'ip2long'],
            [['success', 'ip', 'time'], 'integer'],
            [['username', 'app', 'device'], 'string', 'max' => 32],
            [['password'], 'string', 'max' => 255],
            [['user_agent'], 'string', 'max' => 1024]
        ];
    }
    
}
