<?php

namespace common\lib\components;

use Yii;
use yii\base\Component;
use yii\base\Event;
use common\models\User;

/**
 * Description of AppBootstrap
 *
 * @author     lyf <381296986@qq.com>
 * @date       2015-11-2
 */
class AppBootstrap extends Component implements \yii\base\BootstrapInterface{
    
//    /**
//     * @var array 事件处理器 => 类名.事件名
//     */
//    private $_listeners = [
//        //'common\lib\listeners\ViewArticleListener' => 'common\models\Article.viewArticle'
//    ];
//    /**
//     * @return array
//     */
//    public function listeners()
//    {
//        return $this->_listeners;
//    }
//    public function addListener($class, $name, $listener)
//    {
//        Event::on($class, $name, [$listener, 'handle']);
//    }
//    //初始化监听事情
//    public function initListener(){
//        foreach ($this->listeners() as $listener => $event) {
//            list($class, $name) = explode('.', $event);
//            // 同一个键可能监听多个事件,暂时想不到好的处理方法 @分隔下
//            if (strpos($listener, '@') !== false) {
//                list($listener,$many) = explode('@', $listener);
//            }
//            Event::on($class, $name, [$listener, 'handle']);
//        }
//    }

    
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
    
    
    public function bootstrap($app){
        $this->autoLogin($app);
        //$this->initListener();
    }
    

  
    
    
    
    
    
}
