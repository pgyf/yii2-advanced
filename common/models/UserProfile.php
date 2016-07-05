<?php

namespace common\models;


/**
 * Description of UserProfile
 *
 * @author     lyf <381296986@qq.com>
 * @date       2016-05-03
 */
class UserProfile extends \common\models\table\UserProfile{


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
