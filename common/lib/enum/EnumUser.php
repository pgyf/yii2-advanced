<?php

namespace common\lib\enum;

use Yii;


/**
 * Description of EnumUser
 *
 * @author lyf
 */
class EnumUser extends EnumBase{

    
//*********************************
//*    type 用户类型 98-199是后台预设类型
//*********************************    
    const TYPE = 'type';
    /**
     * 系统管理员
     */
    const TYPE_ADMIN = 100;
    /**
     * 管理员
     */
    const TYPE_MANAGER  = 99;
    
    /**
     * 后台用户
     */
    const TYPE_BACKEND_USER = 90;

    /**
     * 用户
     */
    const TYPE_USER  = 1;
    
    protected static function typeList(){
        return [
            self::TYPE_ADMIN => Yii::t('enum','Admin'),
            self::TYPE_MANAGER => Yii::t('enum','Manager'),
            self::TYPE_BACKEND_USER => Yii::t('enum','Backend User'),
            self::TYPE_USER => Yii::t('enum','User'),
       ];
    }
    

    /**
     *后台类型用户
     * @var type 
     */
    public static $backendTypeList = [
        self::TYPE_MANAGER,
        self::TYPE_BACKEND_USER,
    ];
    /**
     *可登录前台的用户类型
     * @var type 
     */
    public static $frontendTypeList = [
        self::TYPE_USER,
    ];
    
    

//*********************************
//*    status 状态
//*    ([0:正常][-1:禁用][-2:删除])
//*********************************    
    
    /**
     * 正常
     */
    const STATUS_ACTIVE  = 10;

    protected static function statusList(){
        return  array_merge(
        [
            static::STATUS_ACTIVE => Yii::t('enum','Normal'),
        ],parent::statusList());
    }
    
    
    /**
     * 可用的状态
     * @return type
     */
    public static function statusActive() {
        return [
            static::STATUS_ACTIVE,
        ];
    } 
    /**
     * 不可用状态
     */
    public static function statusInactive() {
        return [
            static::STATUS_DELETED => Yii::t('enum','The user has been removed'),
            static::STATUS_DISABLED => Yii::t('enum','The user has been disabled'),
        ];
    } 
    
    
    
}
