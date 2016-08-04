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
        return '';
    }
	
   /**
     * 获取客户端IP地址
     * @param integer $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
     * @param boolean $filterLocal 是否过滤本地ip
     * @return mixed
     */
    public static function getClientIP($type = 0,$filterLocal = false) {
        $userIP =  self::userIP($filterLocal);
        $type == 1 && $userIP = ip2long($userIP);
        return $userIP;
    }
    
    /**
     * 获取服务器时间戳
     * @return int
     */
    public static function getServerTime(){
        return time();
    }
    
    
    /**
     * 获取服务器毫秒时间戳
     * @param bool $unixTimestamp 是否时间戳
     * @param bool $asFloat 
     * @return mixed
     */
    public static function getMicroTime($unixTimestamp = true,$asFloat = false){
        if($unixTimestamp){
            list($t1, $t2) = explode(' ', microtime());  
            //return ((float)$t1 + (float)$t2);
            return (float)sprintf('%.0f', (floatval($t1) + floatval($t2)) * 1000);  
        }
        else{
            return microtime($asFloat);
        }
    }
    
    /**
     * 格式化毫秒
     * @param type $microTime
     * @param type $format
     * @return type
     */
    public static function formatMicroTime($microTime,$format = null){
        $micro = 0;
        $time = $microTime;
        if(strlen($microTime) > 10){
           $time = substr($microTime, 0, 10);
           $micro = substr($microTime, 10);
        }
        return \Yii::$app->formatter->asDatetime($time,'yyyy/MM/dd HH:mm:ss').'.'.$micro;
    }


    /**
     * 过滤用户输入
     * @param string $input
     * @return string
     */
    public static function filterInput($input){
        $output = "";
        if (is_array($input)) {
               foreach($input as $var=>$val) {
                   $output[$var] = filterInput($val);
               }
        }
        else {
            if (get_magic_quotes_gpc()) {
                $input = stripslashes($input);
            }
            $search = array(
               '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
               '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
               '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
               '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
            );
            $output = preg_replace($search, '', $input);
            //$output = mysql_real_escape_string($input);
        }
        return $output;
    }
    
    /**
     * 生成缩略图链接 默认阿里云
     * @param array $params
     * @return string
     */
    public static function thumb($params){
        $url = isset($params['original']) ? $params['original'] : '';
        //宽
        $w = isset($params['w']) ? $params['w'] : 0;
        //高
        $h = isset($params['h']) ? $params['h'] : 0;
        //是否正方形
        $square = isset($params['square']) ? $params['square'] : false;
        $style = array();
        if($w){
            $style[] = $w.'w';
        }
        if($h){
            $style[] = $h.'h';
        }
        if($style){
            $url.= '@'.implode('_', $style);
            if($square){
                $url.= '_1e_1c';
            }
        }
        return $url;
    }

    /**
     * urlencode
     * @param $url
     * @return mixed
     */
    public static function urlencode($url) {
        if($url && strpos($url,'%') === false){
            return urlencode($url);
        }
        return $url;
    }
    
}
