<?php

namespace common\lib\enum;

use Yii;
use yii\helpers\ArrayHelper;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnumBase
 * 枚举基类
 * 枚举集合list必须按照顺序排列
 * @author liyunfang <381296986@qq.com>
 * @date 2015-01-23
 */
abstract class EnumBase extends \yii\base\Object{
    
    protected static function initData(){}


    protected static function getArrayList($field, $suffix = "List"){
        $listName = $field.$suffix;
        return static::$listName();
    }

    /**
     * 验证枚举合法性
     * @param type $value
     * @return type  $field = 'status'
     */
    public static function validate($value, $field)
    {
        $list = static::getArrayList($field);
        return isset($list[$value]);
    }

    /**
     * 获取枚举描述
     * @param type $value
     * @return string $field = 'status'
     */
    public static function getLabel($value , $field)
    {
        $list = static::getArrayList($field);
        if(isset($list[$value]))
        {
            return $list[$value];
        }
        return Yii::t('enum','Unknown');
    }

    /**
     * 获取所有类型
     */
    public static function getAll($field){
        $list = static::getArrayList($field);
        return $list;
    }
    
    
    /**
     * 获取所有值
     */
    public static function getAllValue($field){
        return array_keys(static::getArrayList($field));
    }
    
    
    /**
     * 获取所有类型
     */
    public static function getAllRemoveEmpty($field){
        $list = static::getArrayList($field);
        ArrayHelper::remove($list, '');
        return $list;
    }
 
    
    /**
     * 获取该枚举所对应的显示颜色
     * @param type $value
     * @return string $field = 'status'
     */
    public static function getColor($value , $field)
    {
        $list = static::getArrayList($field,'Colors');
        if(isset($list[$value]))
        {
            return $list[$value];
        }
        return '';
    }
    
//    
//    public static function getLabels($list){
//        foreach ($list as $k => $value) {
//            $list[$k] = Trans::tEnum($value);
//        }
//        return $list;
//    }
    
    

}
