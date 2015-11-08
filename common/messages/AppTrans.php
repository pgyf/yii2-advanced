<?php

namespace common\messages;

use Yii;


/**
 * Description of message
 *
 * @author liyunfang <381296986@qq.com>
 * @date 2015-01-24
 */
class AppTrans extends Trans{

    public static function tCategory($category, $message, $params = [], $language = null)
    {
        return Yii::t(basename(Yii::getAlias('@app')).'/'.$category, $message,$params , $language);
    }

}
