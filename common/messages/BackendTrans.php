<?php

namespace common\messages;

use Yii;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of message
 *
 * @author liyunfang <381296986@qq.com>
 * @date 2015-01-24
 */
class BackendTrans extends Trans{

    
    public static function tCategory($category, $message, $params = [], $language = null)
    {
        return Yii::t('backend/'.$category, $message,$params , $language);
    }
 

}
