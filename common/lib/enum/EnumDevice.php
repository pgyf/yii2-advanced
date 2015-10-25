<?php

namespace common\lib\enum;

use Detection\MobileDetect;


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnumDevice
 *
 * @author WR
 */
class EnumDevice {

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
