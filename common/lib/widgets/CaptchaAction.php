<?php

namespace common\lib\widgets;

use Yii;


/**
 * Description of Captcha
 *
 * @author liyunfang <381296986@qq.com>
 * @date 2015-08-04
 */
class CaptchaAction extends \yii\captcha\CaptchaAction{
    //public $backColor = 0x55FF00;
    
    public $minLength = 4;

    public $maxLength = 4;
    
    public $width = 100;
    
    public $height = 45;
    
    public $offset = -2;

    public $padding = 2;
    
    public $transparent = true;
    
//    public function getVerifyCode($regenerate = true)
//    {
//        if ($this->fixedVerifyCode !== null) {
//            return $this->fixedVerifyCode;
//        }
//
//        $session = Yii::$app->getSession();
//        $session->open();
//        $name = $this->getSessionKey();
//        if ($session[$name] === null || $regenerate) {
//            $session[$name] = $this->generateVerifyCode();
//            $session[$name . 'count'] = 1;
//        }
//
//        return $session[$name];
//    }
    

}
