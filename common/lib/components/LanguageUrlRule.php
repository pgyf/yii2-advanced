<?php

namespace common\lib\components;

use Yii;

/**
 * Description of LanguageUrlRule
 *
 * @author     lyf <381296986@qq.com>
 * @date       2015-11-4
 */
class LanguageUrlRule extends \yii\web\UrlRule{
    
    public function init()
    {
        if ($this->pattern !== null) {
            $this->pattern = '<language>/' . $this->pattern;
            // for subdomain it should be:
            // $this->pattern =  'http://<language>.example.com/' . $this->pattern,
        }
        $this->defaults['language'] = Yii::$app->language;
        parent::init();
    }
    
}
