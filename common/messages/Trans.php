<?php

namespace common\messages;

use Yii;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of message
 *
 * @author liyunfang <381296986@qq.com>
 * @date 2015-01-24
 */
class Trans{

    
    public static function tCategory($category, $message, $params = [], $language = null)
    {
        return Yii::t('common/'.$category, $message,$params , $language);
    }
    
    public static function t($message, $params = [], $language = null)
    {
        return  static::tCategory('app', $message, $params, $language);
    }
    
    public static function tModel($category, $message, $params = [], $language = null)
    {
        return  static::tCategory('models/'. $category, $message, $params, $language);
    }
    
    public static function tPlugin($category, $message, $params = [], $language = null)
    {
        return  static::tCategory('plugin/'. $category, $message, $params, $language);
    }
    
    public static function tEnum($message, $params = [], $language = null)
    {
        return  static::tCategory('enum', $message, $params, $language);
    }
    
    public static function tMsg($message, $params = [], $language = null)
    {
        return  static::tCategory('msg', $message, $params, $language);
    }
  
    public static function tTitle($message, $params = [], $language = null)
    {
        return  static::tCategory('title', $message, $params, $language);
    }

}
