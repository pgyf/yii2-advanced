<?php

namespace common\lib\enum;

use Yii;
use Detection\MobileDetect;

/**
 * Description of EnumAPP
 *
 * @author lyf
 */
class EnumAPP extends EnumBase{

    //*********************************
    //*  app 应用平台
    //*  (web：网站，android:：安卓，apple：苹果)
    //*********************************    
    const APP = 'app';
    
    /**
     * 未知
     */
    const APP_UNKNOWN = '';
    
    /**
     * web网站
     */
    const APP_WEB = 'web';
    
    /**
     * 移动网站
     */
    const APP_WEB_MOBILE = 'mobile';
    
    /**
     * 后台
     */
    const APP_WEB_ADMIN = 'admin';
    
    /**
     * 安卓
     */
    const APP_ANDROID  = 'android';
    /**
     * 苹果
     */
    const APP_APPLE   = 'apple';
   
    protected static function appList(){
        return [
            self::APP_WEB => Yii::t('enum','Web'),
            self::APP_WEB_ADMIN => Yii::t('enum','Admin Backend'),
            self::APP_WEB_MOBILE => Yii::t('enum','Mobile Web'),
            self::APP_APPLE => Yii::t('enum','Apple'),
            self::APP_ANDROID => Yii::t('enum','Android'),
            self::APP_UNKNOWN => Yii::t('enum','Unknown'),
       ];
    }
    
    
    /**
     *后台的应用
     * @var type 
     */
    public static $backendAppList = [
        self::APP_WEB_ADMIN,
    ];
    /**
     *前台的应用
     * @var type 
     */
    public static $frontendAppList = [
        self::APP_WEB,
        self::APP_WEB_MOBILE,
        self::APP_APPLE ,
        self::APP_ANDROID,
    ];
    
    
    
   //*********************************
    //*  设备 应用平台
    //*  (device：安卓，苹果)
    //*********************************    
        const DEVICE = 'device';

        const DEVICE_UNKNOWN = '';

        /**
         * 安卓手机
         */
        const DEVICE_ANDROID  = 'android';
        /**
         * 安卓平板
         */
        const DEVICE_ANDROID_TABLE  = 'androidTable';
        
        /**
         * 苹果手机
         */
        const DEVICE_APPLE   = 'apple';
       
        /**
         * 苹果平板
         */
        const DEVICE_APPLE_TABLE   = 'appleTable';

        /**
         * 电脑
         */
        const DEVICE_COMPUTER   = 'computer';
        
        protected static function deviceList(){
            return [
                self::DEVICE_APPLE => Yii::t('enum','Apple'),  
                self::DEVICE_APPLE_TABLE => Yii::t('enum','Ipad'),  
                self::DEVICE_ANDROID => Yii::t('enum','Android'),  
                self::DEVICE_ANDROID_TABLE => Yii::t('enum','Android Tablet'),  
                self::DEVICE_COMPUTER => Yii::t('enum','Computer'),  
                self::DEVICE_UNKNOWN => Yii::t('enum','Unknown'), 
            ];
        }
        /**
         * 获取设备
         * @param type $ua
         * @return boolean
         */
        public static function getDevice(){
            //$detect = \Yii::$app->deviceDetect;
            $detect = new MobileDetect;
            if($detect->isMobile()){
                if($detect->isTablet()){
                    if($detect->isIOS()){
                        return self::DEVICE_APPLE_TABLE;
                    }
                    if($detect->isAndroidOS()){
                        return self::DEVICE_ANDROID_TABLE;
                    }
                }
                else{
                    if($detect->isIOS()){
                        return self::DEVICE_APPLE;
                    }
                    if($detect->isAndroidOS()){
                        return self::DEVICE_ANDROID;
                    }
                }
                return self::DEVICE_UNKNOWN;
            }
            else{
                return self::DEVICE_COMPUTER;
            }
            
        }
    
}
