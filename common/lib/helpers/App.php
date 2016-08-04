<?php

namespace common\lib\helpers;

use Yii;

class App extends BaseApp
{

    //用户类型
    public static function userType()
    {
        return static::getIdentity(true)->type;
    }
    
    
   //生成链接
    public static function createUrl($params, $scheme = false){
        return  Yii::$app->getUrlManager()->createUrl($params);
        //return \yii\helpers\Url::to($params, $scheme);
    }
    
    //response format
    public static function responseFormat($format = \yii\web\Response::FORMAT_JSON)
    {
        Yii::$app->getResponse()->format = $format;
    }
    
    //app param
    public static function param($key, $defaultValue = null)
    {
        $params = Yii::$app->params;
        if(array_key_exists($key,$params))
        {
            return $params[$key];
        }
        return $defaultValue;
    }
    
    //view param
    public static function viewParam($key, $defaultValue = null)
    {
        $view = Yii::$app->getView();
        if(isset($view->params[$key]))
        {
            return $view->params[$key];
        }
        return $defaultValue;
    }
    
    
    
    
    

}



