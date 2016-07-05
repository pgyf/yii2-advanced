<?php

namespace common\lib\enum;

use Yii;
/**
 * Description of BooleanEnum
 *
 * @author lyf
 */
class EnumBoolean extends EnumBase{
    

    const YESNO = 'yesno';
    const YESNO_YES = 1;
    const YESNO_NO = 0;
    
    protected static function yesnoList(){
        return [
            self::YESNO_YES => Yii::t('yii','Yes'),
            self::YESNO_NO => Yii::t('yii','No'),
        ];
    }
    

    const SUCCESS = 'success';
    const SUCCESS_SUCCESS = 1;
    const SUCCESS_FAIL = 0;
    protected static function successList(){
        return [
            self::SUCCESS_SUCCESS => Yii::t('enum','Success'),
            self::SUCCESS_FAIL => Yii::t('enum','Fail'),
        ];
    }

    
    
}
