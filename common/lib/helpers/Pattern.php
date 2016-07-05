<?php

namespace common\lib\helpers;

use Yii;

/**
 * Description of Pattern
 *
 * @author     lyf <381296986@qq.com>
 * @date       2016-5-4
 */
class Pattern {
    /**
     * 账号 //只含有汉字、数字、字母、下划线不能以下划线开头和结尾
     * @var string 
     */
    public static $userName = '/^(?!_)(?!.*?_$)[a-zA-Z0-9_\u4e00-\u9fa5]+$';
}
