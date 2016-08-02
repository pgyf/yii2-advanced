<?php

namespace common\models;

use Yii;
use common\lib\enum\EnumUser;

class User extends \common\models\User
{


    /**
     * rules
     */
    public function rules()
    {
        return  array_merge(parent::rules(),
        [
            ['username', 'string', 'min' => 6],
            ['password', 'string', 'min' => 6],
            ['type', 'default', 'value' => EnumUser::TYPE_USER, 'on' => 'register'],
            ['type', 'in', 'range' => EnumUser::$frontendTypeList, 'on' => 'register'],
            ['status', 'default', 'value' => EnumUser::STATUS_ACTIVE, 'on' => 'register'],
        ]);
    }
    
    
    /**
     * 情景模式
     */
    public function scenarios()
    {
        return [
            'register' => [
                    'type', 'username', 'mobile','email', 'password', 'auth_key' , 'create_form_url', 'create_aouth_app' , 
                    'create_app', 'create_device','create_time' ,'create_ip','status'
                ],
            'update-pwd' => 
                [
                    'password','update_user','update_time' , 'update_ip',
                ],
        ];
    }
    

    
}
