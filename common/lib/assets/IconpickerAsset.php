<?php

namespace common\lib\assets;


class IconpickerAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@bower/bootstrap-iconpicker/bootstrap-iconpicker';
    public $js = [
            'js/iconset/iconset-all.min.js',
    ];
    public $css = [ ];
    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
    
    public function init() {
        $this->js[] = YII_DEBUG ? 'js/bootstrap-iconpicker.js' : 'js/bootstrap-iconpicker.min.js';
        $this->css[] = YII_DEBUG ? 'css/bootstrap-iconpicker.css' : 'css/bootstrap-iconpicker.min.css';
        parent::init();
    }
 
} 