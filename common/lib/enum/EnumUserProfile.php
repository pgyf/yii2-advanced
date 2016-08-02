<?php

namespace common\lib\enum;

use Yii;


/**
 * Description of EnumUser
 *
 * @author lyf
 */
class EnumUserProfile extends EnumBase{

//*********************************
//*    sex 性别
//*    ([0:未知][1:男][2:女])
//*********************************    
    const GENDER = 'gender';
    /**
     * 未知
     */
    const GENDER_UNKNOWN  = 0;
    /**
     * 男
     */
    const GENDER_MALE  = 1;
    /**
     * 女
     */
    const GENDER_FEMALE  = 2;

    
    protected static function genderList(){
        return [
            self::GENDER_UNKNOWN => Yii::t('enum','Unknown'),
            self::GENDER_MALE => Yii::t('enum','Male'),
            self::GENDER_FEMALE => Yii::t('enum','Female'),
       ];
    }
    
    
}
