<?php

namespace backend\lib\components;

/**
 * Description of AppBootstrap
 *
 * @author     lyf <381296986@qq.com>
 * @date       2015-11-2
 */
class AppBootstrap extends \common\lib\components\AppBootstrap{
    
    public function listeners()
    {
        return array_merge(parent::listeners(), [
            'backend\lib\listeners\AdminLogListener' => 'yii\db\BaseActiveRecord.afterUpdate',
        ]);
    }
    
    
    public function bootstrap($app){
        parent::bootstrap($app);
//        $app->user->on(\yii\web\User::EVENT_BEFORE_LOGIN,['app\models\user\User', 'beforeLogin']);
//        $app->user->on(\yii\web\User::EVENT_AFTER_LOGIN,['app\models\user\User', 'afterLogin']);
//        $app->user->on(\yii\web\User::EVENT_BEFORE_LOGOUT,['app\models\user\User', 'beforeLogout']);
    }
}
