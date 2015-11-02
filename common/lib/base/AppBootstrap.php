<?php

namespace common\lib\base;

use Yii;
use common\models\User;

/**
 * Description of AppBootstrap
 *
 * @author     lyf <381296986@qq.com>
 * @date       2015-11-2
 */
class AppBootstrap implements \yii\base\BootstrapInterface{
    
    public function bootstrap($app){
        if(Yii::$app->user->enableAutoLogin){
            Yii::$app->user->on(\yii\web\User::EVENT_BEFORE_LOGIN, [User::className(), 'generateAuthKey']);
        }
//      $app->user->on(\yii\web\User::EVENT_BEFORE_LOGIN,['app\models\user\User', 'beforeLogin']);
//      $app->user->on(\yii\web\User::EVENT_AFTER_LOGIN,['app\models\user\User', 'afterLogin']);
//      $app->user->on(\yii\web\User::EVENT_BEFORE_LOGOUT,['app\models\user\User', 'beforeLogout']);
    }
}
