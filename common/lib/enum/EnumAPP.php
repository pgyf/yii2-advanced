<?php

namespace common\lib\enum;

use common\messages\Trans;
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
     * 电脑网站
     */
    const APP_WEB = 'web';
    
    /**
     * 手机移动网站
     */
    const APP_MWEB = 'mweb';
    
    /**
     * 后台
     */
    const APP_WEB_ADMIN = 'backend';
    
    
    /**
     * 安卓
     */
    const APP_ANDROID  = 'android';
    /**
     * 苹果
     */
    const APP_APPLE   = 'apple';
    /**
     * 微信
     */
    const APP_WECHAT   = 'wechat';
    
    const APP_UNKNOWN = 'unknown';
   
    protected static function appList(){
        return [
            self::APP_WEB_ADMIN => Trans::tEnum('Admin Backend'),
            self::APP_APPLE => Trans::tEnum('Apple'),
            self::APP_ANDROID => Trans::tEnum('Android'),
            self::APP_WECHAT => Trans::tEnum('Wechat'),
            self::APP_WEB => Trans::tEnum('Web'),
            self::APP_MWEB => Trans::tEnum('Mobile Web'),
            self::APP_UNKNOWN => Trans::tEnum('Unknown'),
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
            self::APP_APPLE ,
            self::APP_ANDROID,
            self::APP_WECHAT,
            self::APP_WEB,
            self::APP_MWEB,
    ];
    
    
    
   //*********************************
    //*  设备 应用平台
    //*  (device：安卓，苹果)
    //*********************************    
        const DEVICE = 'device';

        const DEVICE_UNKNOWN = 'unknown';

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
                self::DEVICE_APPLE => Trans::tEnum('Apple'),  
                self::DEVICE_APPLE_TABLE => Trans::tEnum('Ipad'),  
                self::DEVICE_ANDROID => Trans::tEnum('Android'),  
                self::DEVICE_ANDROID_TABLE => Trans::tEnum('Android Tablet'),  
                self::DEVICE_COMPUTER => Trans::tEnum('Computer'),  
                self::DEVICE_UNKNOWN => Trans::tEnum('Unknown'), 
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
