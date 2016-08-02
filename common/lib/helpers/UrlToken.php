<?php

namespace common\lib\helpers;

use Yii;

/**
 * 把url转换成token传递
 * 参考https://github.com/cornernote/yii2-returnurl
 * @author     lyf <381296986@qq.com>
 * @date       2016-7-20
 */
class UrlToken {


    /**
     * @var string The key used in GET and POST requests for the Return Url.
     */
    public static $requestKey = 'from_token';
    
    /**
     * 
     * @return \yii\caching\Cache
     */
    protected static function getCache(){
        return Yii::$app->cache;
    }

    /**
     * Get a new Token based on the current page url.
     *
     * @usage
     * in views/your_page.php
     * ```
     * echo Html::a('my link', ['test/form', 'ru' => ReturnUrl::getToken()]);
     * echo Html::hiddenInput('ru', ReturnUrl::getToken());
     * ```
     *
     * @return string
     */
    public static function getToken()
    {
        return self::urlToToken(Yii::$app->request->url);
    }
    /**
     * Get the existing Token from the request data.
     *
     * @usage
     * in views/your_page.php
     * ```
     * echo Html::a('my link', ['test/form', 'ru' => ReturnUrl::getRequestToken()]);
     * echo Html::hiddenInput('ru', ReturnUrl::getRequestToken());
     * ```
     *
     * @return string|bool
     */
    public static function getRequestToken()
    {
        $rk = self::$requestKey;
        $token = Yii::$app->request->get($rk);
        if (!$token) {
            $token = Yii::$app->request->post($rk);
        }
        if (!$token || !is_scalar($token)) {
            return false;
        }
        $token = str_replace(chr(0), '', $token); // strip nul byte
        $token = preg_replace('/\s+/', '', $token); // strip whitespace
        return $token;
    }
    /**
     * Get the URL where we should redirect to.
     *
     * @usage
     * in YourController::actionYourAction()
     * ```
     * return $this->redirect(ReturnUrl::getUrl());
     * ```
     *
     * @param mixed $altUrl alternative URL to use for redirect if there is no URL
     * @return string|bool
     */
    public static function getUrl($altUrl = null)
    {
        $url = self::tokenToUrl(self::getRequestToken());
        $url = $url ? $url : $altUrl;
        $url = $url ? $url : Yii::$app->homeUrl;
        return $url;
    }
    /**
     * Convert a URL to a Token.
     *
     * @param string $input the URL to convert
     * @return string
     */
    public static function urlToToken($input)
    {
        $key = self::khash($input);
        if (!self::getCache()->exists(self::$requestKey . '.' . $key)) {
            self::getCache()->set(self::$requestKey . '.' . $key, $input);
        }
        return $key;
    }
    /**
     * Convert a Token to a URL.
     *
     * @param string|bool $token the Token to convert
     * @return string|bool
     */
    public static function tokenToUrl($token)
    {
        if (!$token || !is_scalar($token)) return false;
        return self::getCache()->get(self::$requestKey . '.' . $token);
    }
    /**
     * Small sample convert crc32 to character map.
     * @link http://au1.php.net/crc32#111931
     *
     * @param string $data
     * @return string
     */
    protected static function khash($data)
    {
        static $map = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        static $hashes = [];
        if (isset($hashes[$data])) {
            return $hashes[$data];
        }
        $hash = bcadd(sprintf('%u', crc32($data)), 0x100000000);
        $str = '';
        do {
            $str = $map[bcmod($hash, 62)] . $str;
            $hash = bcdiv($hash, 62);
        } while ($hash >= 1);
        return $hashes[$data] = $str;
    }
    
}
