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
    
    public static function tLabel($message, $params = [], $language = null)
    {
        return  static::tCategory('label', $message, $params, $language);
    }
    
    public static function tMsg($message, $params = [], $language = null)
    {
        return  static::tCategory('msg', $message, $params, $language);
    }
  
    public static function tTitle($message, $params = [], $language = null)
    {
        return  static::tCategory('title', $message, $params, $language);
    }
    
    
    
    
    /**
     * 语言 
     * 参考 https://github.com/lajax/yii2-translate-manager/blob/master/migrations/m141002_030233_translate_manager.php
     * @return string
     */
    public static function getLanguageNames(){
        //注册asset
        $view = Yii::$app->controller->getView();
        \common\lib\assets\bower\HoverDropdownAsset::register($view);
        \common\lib\assets\languagepicker\FlagLargeAsset::register($view);
        //\common\lib\assets\languagepicker\LanguageLargeIconsAsset::register($view);
        $languages = array_values(Yii::$app->urlManager->languages);
        $items = [];
        $itemParent = [];
        foreach ($languages as $language) {
            $params = array_merge([''],Yii::$app->request->queryParams, ['language' => $language]);
            $name = Yii::t('language', $language);
            $label = '<i style="vertical-align: middle;" class="'.$language.'"></i>'.$name;
            $url = yii\helpers\Url::to($params);
            if(Yii::$app->language == $language){
                $itemParent = [
                    'label' => $label,
                    'linkOptions' => [
                        'title' => $name,
                        'data' => [
                            'hover' => "dropdown",
                            'delay' => 100,
                            //'hover-delay' => 0,
                        ]
                    ]
                ];
            }
            else{
                $items[] = [
                    'label' => $label,
                    'url' => $url,
                    'linkOptions' => [
                        'title' => $name,
                        //'data-method' => 'post'
                    ]
                ];
            }
        }
        //language-picker dropdown-list large
        $itemParent['options'] = [
            'class' => 'language-picker large', 
        ];
        $itemParent['items'] = $items;
        return $itemParent;
    }

}
