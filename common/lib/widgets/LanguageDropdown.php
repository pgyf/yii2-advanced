<?php

namespace common\lib\widgets;

use Yii;

/**
 * Description of LanguageDropdown
 *
 * @author     lyf <381296986@qq.com>
 * @date       2015-11-7
 */
class LanguageDropdown extends \yii\bootstrap\Dropdown
{
    //private static $_labels;

    private $_isError;

    public function init()
    {
        $route = Yii::$app->controller->route;
        $appLanguage = Yii::$app->language;
        $params = $_GET;
        $this->_isError = $route === Yii::$app->errorHandler->errorAction;

        array_unshift($params, '/'.$route);

        foreach (Yii::$app->urlManager->languages as $language) {
            $isWildcard = substr($language, -2)==='-*';
//            if (
//                $language===$appLanguage ||
//                // Also check for wildcard language
//                $isWildcard && substr($appLanguage,0,2)===substr($language,0,2)
//            ) {
//                continue;   // Exclude the current language
//            }
            if ($isWildcard) {
                $language = substr($language,0,2);
            }
            $params['language'] = $language;
            $this->items[] = [
                'label' => self::label($language),
                'url' => $params,
            ];
        }
        parent::init();
    }

    public function run()
    {
        // Only show this widget if we're not on the error page
        if ($this->_isError) {
            return '';
        } else {
            return parent::run();
        }
    }

    public static function label($code)
    {
        return Yii::t('language', $code);
//        if (self::$_labels===null) {
//            self::$_labels = [
//                'de' => Yii::t('language', 'German'),
//                'fr' => Yii::t('language', 'French'),
//                'en' => Yii::t('language', 'English'),
//            ];
//        }
//
//        return isset(self::$_labels[$code]) ? self::$_labels[$code] : null;
    }
}
