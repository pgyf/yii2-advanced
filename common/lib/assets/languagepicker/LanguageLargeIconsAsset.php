<?php

namespace common\lib\assets\languagepicker;

use yii\web\AssetBundle;

/**
 * LanguageLargeIcons asset bundle
 * @author Lajos Molnár <lajax.m@gmail.com>
 * @since 1.0
 */
class LanguageLargeIconsAsset extends AssetBundle {

    /**
     * @inheritdoc
     */
    public $sourcePath = '@common/lib/assets/languagepicker';

    /**
     * @inheritdoc
     */
    public $css = [];
    
    public function init() {
        $this->css[] = YII_DEBUG ? 'stylesheets/language-picker.css' : 'stylesheets/language-picker.min.css';
        $this->css[] = YII_DEBUG ? 'stylesheets/flags-large.css' : 'stylesheets/flags-large.min.css';
        parent::init();
    }

}
