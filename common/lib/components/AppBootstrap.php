<?php

namespace common\lib\components;

use Yii;
use common\models\User;

/**
 * Description of AppBootstrap
 *
 * @author     lyf <381296986@qq.com>
 * @date       2015-11-2
 */
class AppBootstrap implements \yii\base\BootstrapInterface{
    
//    /**
//     * 支持的语言
//     * @var array
//     */
//    public $supportedLanguages = [];
//    
//    /**
//     * cookie name
//     * @var string
//     */
//    public $languageCookieName = 'language'; //_locale


    public function bootstrap($app){
        $this->autoLogin($app);
    }
    
    /**
     * 自动登录功能
     * @param application $app
     */
    public function autoLogin($app){
        if(Yii::$app->user->enableAutoLogin){
            $app->user->on(\common\lib\components\User::EVENT_BEFORE_LOGIN, [User::className(), 'generateAuthKey']);
        }
//      $app->user->on(\yii\web\User::EVENT_BEFORE_LOGIN,['app\models\user\User', 'beforeLogin']);
//      $app->user->on(\yii\web\User::EVENT_AFTER_LOGIN,['app\models\user\User', 'afterLogin']);
//      $app->user->on(\yii\web\User::EVENT_BEFORE_LOGOUT,['app\models\user\User', 'beforeLogout']);
    }

    /**
     * 多语言功能
     * @param application $app
     */
//    public function languageSelector($app){
//        $cookeName = $this->languageCookieName;
//        $preferredLanguage = isset($app->request->cookies[$cookeName]) ? (string)$app->request->cookies[$cookeName] : null;
//        // 或者从数据库读取
//        // $preferredLanguage = $app->user->language;
//        if (empty($preferredLanguage)) {
//            $preferredLanguage = $app->request->getPreferredLanguage($this->supportedLanguages);
//        }
//        if($preferredLanguage){
//            $app->language = $preferredLanguage;
//        }
//    }
//    
    
    
    
    
    
}
