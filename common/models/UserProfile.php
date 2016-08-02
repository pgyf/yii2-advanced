<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use common\lib\helpers\Tools;
use common\lib\behaviors\IpBehavior;

/**
 * Description of UserProfile
 *
 * @author     lyf <381296986@qq.com>
 * @date       2016-05-03
 */
class UserProfile extends \common\models\table\UserProfile{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => false,
                'updatedAtAttribute' => 'update_time',
                'value' => function(){
                    return Tools::getServerTime();
                },
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => false,
                'updatedByAttribute' => 'update_user',
            ],
            [
                'class' => IpBehavior::className(),
                'createIpAttributes' => false,
                'updateIpAttributes' => 'update_ip',
            ],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'gender', 'birthday', 'update_user', 'update_time', 'update_ip'], 'integer'],
            ['update_ip','filter','filter' => 'ip2long'],
            [['nickname','email'],'trim'],
            [['nickname','email'],'filter','filter' => '\common\lib\helpers\Tools::filterInput'],
            ['email','email'],
            [['nickname'], 'string', 'max' => 32],
            [['email', 'avatar'], 'string', 'max' => 255],
            ['user_id', 'unique'],
            ['user_id', 'exist','targetClass' => User::className(),'targetAttribute' => 'id'],
        ];
    }
    
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
   
    /**
     * @param null $default
     * @return bool|null|string
     */
    public function getAvatar($default = null)
    {
//        return $this->avatar_path
//            ? Yii::getAlias($this->avatar_base_url . '/' . $this->avatar_path)
//            : $default;
        if($this->avatar){
            return $this->avatar;
        }
        return $default;
         
    }
    
}
