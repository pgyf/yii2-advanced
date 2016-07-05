<?php

namespace common\lib\helpers;

use Yii;
use yii\helpers\VarDumper;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\web\Cookie;
use yii\helpers\ArrayHelper;

class BaseApp
{

    public static function getAsset($asset){
        return  Yii::$app->getAssetManager()->getBundle($asset);
    }
    public static function getAssetUrl($asset,$url){
        return  Yii::$app->getAssetManager()->getAssetUrl($asset, $url);
    }
    
    //防xss攻击过滤
    public static function xss($content, $config = null){
        return  HtmlPurifier::process($content, $config);
    }
    
    //module id
    public static function moduleId(){
        return Yii::$app->controller->module->id;
    }
    
    //controller id
    public static function controllerId(){
        return Yii::$app->controller->id;
    }

    //action id
    public static function actionId(){
        return Yii::$app->controller->action->id;
    }
    

    
    //theme url
    public static function themeUrl(){
        return Yii::$app->getView()->theme->baseUrl;
    }
    
    //theme path
    public static function themePath(){
        return Yii::$app->getView()->theme->basePath;
    }
    
    
    /**
     * 设置页面级token 防止重复提交
     * @return type
     */
    public static function reapetToken(){
        $tokenParam = "pageToken";
        $token = Yii::$app->security->generateRandomString();
        return Html::hiddenInput($tokenParam, $token);
    }
   
    /**
     * 验证重复提交 
     * @return boolean
     */
    public static function validateReapet($options = []) {
        $tokenParam = ArrayHelper::getValue($options, 'tokenParam', 'pageToken');
        $tokenSaveParam = ArrayHelper::getValue($options, 'tokenSaveParam', 'reapetToken');
        $useCookie = ArrayHelper::getValue($options, 'useCookie', true);
        $token = null;
        $request = Yii::$app->getRequest();
        //是否开启了csrf
        if(Yii::$app->controller->enableCsrfValidation){
            $token = $request->getBodyParam($request->csrfParam);
            if(!$token){
                $token = $request->getCsrfTokenFromHeader();
            }
        }
        else{
            $token = $request->post($tokenParam);
            if(!$token){
                $token =  $request->get($tokenParam);
            }
        }
        if($token){
            $token = Html::encode($token);
        }
        if($useCookie){
            $saveToken = $request->cookies->getValue($tokenSaveParam);
        }
        else{
            $saveToken = Yii::$app->getSession()->get($tokenSaveParam);
        }
//        if(null === $token){
//            return true;
//        }
        if($token == $saveToken){
            return false;
        }
        if($useCookie){
            $cookies = Yii::$app->response->cookies;
            $cookies->add(new Cookie([
                'name' => $tokenSaveParam,
                'value' => $token,
            ]));
        }
        else{
            Yii::$app->getSession()->set($tokenSaveParam, $token);
        }
        return  true;
    }

   /**
    * 接收表单数据
    * @param type $model
    * @param type $formName
    * @return boolean
    */
    public static function load(&$model,$formName = null) {
        if(self::validateReapet()){
            return $model->load(Yii::$app->request->post(),$formName);
        }
        return  false;
    }
    
//    public static function dateFormat($time, $format = null){
//        return Yii::$app->getFormatter()->asDate($time,$format);
//    }
//    
//    public static function timeFormat($time, $format = null ){
//        return Yii::$app->getFormatter()->asDatetime($time,$format);
//    }


    public static function getAlias($alia){
        return Yii::getAlias($alia);
    }
    


        
    //baseUrl
    public static function getBaseUrl($url = null)
    {
        $baseUrl = Yii::$app->getRequest()->getBaseUrl();
        if($url !== null)
        {
                $baseUrl .= $url;
        }
        return $baseUrl;
    }
	
    //homeUrl
    public static function getHomeUrl($url = null)
    {
        $homeUrl = Yii::$app->getHomeUrl();
        if($url !== null)
        {
                $homeUrl .= $url;
        }
        return $homeUrl;
    }

    public static function isAjaxPost($name = null)
    {
        $request =  Yii::$app->getRequest();
        if ($request->isAjax && $request->isPost) {
            if(null !== $name){
               return $request->post($name, false);
            }
            return true;
        }
        return false;
    }

    public static function isAjaxGet($name = null)
    {
        $request =  Yii::$app->getRequest();
        if ($request->isAjax && $request->isGet) {
            if(null !== $name){
               return $request->get($name, false);
            }
            return true;
        }
        return false;
    }
  
    //获取post或者get的值
    public static function getParam($name, $default = NULL)
    {
        $request =  Yii::$app->getRequest();
        $value = $request->post($name);
        if(!$value){
            $value = $request->get($name);
        }
        if($value){
            return  $value;
        }
        return $default;
    }
    

    
    
    
    //设置flash
    public static function setFlash($type, $message)
    {
        Yii::$app->getSession()->setFlash($type, $message);
    }

    public static function setWarningFlash($message)
    {
        Yii::$app->getSession()->setFlash('warning', $message);
    }

    public static function setSuccessFlash($message)
    {
        Yii::$app->getSession()->setFlash('success', $message);
    }
    public static function setErrorFlash($message)
    {
        Yii::$app->getSession()->setFlash('error', $message);
    }
    
    public static function info($var, $category = 'application')
    {
        $dump = VarDumper::dumpAsString($var);
        Yii::info($dump, $category);
    }

    public static function getUser()
    {
        return Yii::$app->getUser();
    }
    
    public static function getUserId()
    {
        return static::getUser()->getId();
    }
    

    public static function getIdentity($redirect = false)
    {
        if(static::checkIsGuest($redirect)){
            return static::getUser()->getIdentity();
        }
        return false;
    }

    public static function isGuest()
    {
        $user = static::getUser();
        return $user->isGuest;
    }

    public static function checkIsGuest($redirect = false)
    {
        if(static::isGuest())
        {
            if($redirect)
            {
                //$loginUrl = ['/default/login'];
                Yii::$app->getUser()->loginRequired();
            }
            //Yii::$app->getResponse()->redirect(Url::to($loginUrl), 302);
            return false;
        }
        return true;
    }

    //检查权限
    public static function checkAuth($permissionName, $params = [], $allowCaching = true)
    {
        $user = static::getUser();
        return $user->can($permissionName, $params, $allowCaching);
    }

    /**
     * 连接翻译
     * 非中文直接使用空格
     */
    public static function connectMsg($msg = []){
        if('zh-CN' == Yii::$app->language){
            return implode('',$msg);
        }
        else{
            return implode(' ',$msg);
        }
    }

    //获取真实表名
    public static function rawTableName($name)
    {
        if (strpos($name, '{{') !== false) {
            $name = preg_replace('/\\{\\{(.*?)\\}\\}/', '\1', $name);
            return str_replace('%', Yii::$app->db->tablePrefix, $name);
        } else {
            return $name;
        }
    }
    
    
    public static function getDB()
    {
        return Yii::$app->getDb();
    }

}



