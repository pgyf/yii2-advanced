<?php

namespace common\lib\enum;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BooleanEnum
 *
 * @author WR
 */
class EnumBoolean extends EnumBase{
    

    const YESNO = 'yesno';
    const YESNO_YES = 1;
    const YESNO_NO = 0;
    
    protected static function yesnoList(){
        return [
            self::YESNO_YES => \Yii::t('yii','Yes'),
            self::YESNO_NO => \Yii::t('yii','No'),
        ];
    }
    

    const SUCCESS = 'success';
    const SUCCESS_SUCCESS = 1;
    const SUCCESS_FAIL= 0;
    protected static function successList(){
        return [
            self::SUCCESS_SUCCESS => Trans::tEnum('Success'),
            self::SUCCESS_FAIL => Trans::tEnum('Fail'),
        ];
    }
}
