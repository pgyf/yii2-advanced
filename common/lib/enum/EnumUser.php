<?php
/**
 * @link https://github.com/phpyii
 * @copyright Copyright (c) 2016 phpyii
 */

namespace common\lib\enum;

use Yii;


/**
 * User表枚举类
 * @author lyf <381296986@qq.com>
 * @date 2016-7-10
 * @since 1.0
 */
class EnumUser extends EnumBase{

    /**
     * 用户类型
     */
    const TYPE = 'type';
    /**
     * 系统管理员
     */
    const TYPE_ROOT = 100;
    /**
     * 默认用户
     */
    const TYPE_USER  = 1;
    
    protected static function typeList(){
        return [
            self::TYPE_USER => Yii::t('enum','User'),
       ];
    }
  

    
    
    
    /**
     * 用户类型
     */
    const STATUS = 'status';
    /**
     * 正常
     */
    const STATUS_ACTIVE  = 10;
    /**
     * 禁用
     */
    const STATUS_DISABLED  = 0;


    protected static function statusList(){
        return [
            static::STATUS_ACTIVE => Yii::t('enum','Normal'),
            self::STATUS_DISABLED => Yii::t('enum','Disabled'),
       ];
    }

    /**
     * 不可用状态
     */
    public static function statusInactive() {
        return [
            //static::STATUS_DELETED => Yii::t('enum','The user has been removed'),
            static::STATUS_DISABLED => Yii::t('enum','The user has been disabled'),
        ];
    } 
    
    
    
}
