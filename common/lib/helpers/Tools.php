<?php

namespace common\lib\helpers;

/**
 * Description of Tool
 *
 * @author     lyf <381296986@qq.com>
 * @date       2015-10-31
 */
class Tools {
	
    /**
     * Gets the user's IP address
     *
     * @param boolean $filterLocal whether to filter local & LAN IP (defaults to true)
     *
     * @return string
     */
    private static function userIP($filterLocal = true)
    {
        $ipSources = [
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_X_CLUSTER_CLIENT_IP',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED',
            'REMOTE_ADDR'
        ];
        foreach ($ipSources as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (array_map('trim', explode(',', $_SERVER[$key])) as $ip) {
                    if ($filterLocal) {
                        $checkFilter = filter_var(
                            $ip,
                            FILTER_VALIDATE_IP,
                            FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
                        );
                        if ($checkFilter !== false) {
                            return $ip;
                        }
                    } else {
                        return $ip;
                    }
                }
            }
        }
        return 'Unknown';
    }
	
   /**
     * 获取客户端IP地址
     * @param integer $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
     * @param boolean $adv 是否进行高级模式获取（有可能被伪装） 
     * @return mixed
     */
    public static function getClientIP($type = 1,$adv = true) {
//        $type       =  $type ? 1 : 0;
//        static $ip  =   NULL;
//        if ($ip !== NULL) return $ip[$type];
//        if($adv){
//            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//                $arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
//                $pos    =   array_search('unknown',$arr);
//                if(false !== $pos) unset($arr[$pos]);
//                $ip     =   trim($arr[0]);
//            }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
//                $ip     =   $_SERVER['HTTP_CLIENT_IP'];
//            }elseif (isset($_SERVER['REMOTE_ADDR'])) {
//                $ip     =   $_SERVER['REMOTE_ADDR'];
//            }
//        }elseif (isset($_SERVER['REMOTE_ADDR'])) {
//            $ip     =   $_SERVER['REMOTE_ADDR'];
//        }
//        // IP地址合法验证
//        $long = sprintf("%u",ip2long($ip));
//        $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
//        return $ip[$type];
        $userIP =  self::userIP(false);
        
        if('Unknown' == $userIP){
            return 0;
        }
        return ip2long($userIP);
    }

}
