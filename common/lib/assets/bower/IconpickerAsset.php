<?php

namespace common\lib\assets\bower;


class IconpickerAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@bower/bootstrap-iconpicker/bootstrap-iconpicker';
    public $js = [
            'js/iconset/iconset-all.min.js',
            'js/bootstrap-iconpicker.min.js',
    ];
    public $css
        = [
            'css/bootstrap-iconpicker.min.css',
        ];
    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
 
} 