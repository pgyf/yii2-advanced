<?php

namespace common\lib\enum;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnumAPP
 *
 * @author WR
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
    
}
