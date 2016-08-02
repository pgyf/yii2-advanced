<?php

namespace common\lib\assets\languagepicker;

use yii\web\AssetBundle;

/**
 * LanguagePlugin asset bundle
 * @author Lajos Molnár <lajax.m@gmail.com>
 * @since 1.0
 */
class LanguagePluginAsset extends AssetBundle {

    /**
     * @inheritdoc
     */
    public $sourcePath = '@common/lib/assets/languagepicker';

    /**
     * @inheritdoc
     */
    public $js = [];

    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
    ];
    
    public function init() {
        $this->js[] = YII_DEBUG ? 'javascripts/language-picker.js' : 'javascripts/language-picker.min.js';
        parent::init();
    }

}
