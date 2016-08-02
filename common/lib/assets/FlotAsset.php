<?php

namespace common\lib\assets;

/**
 * Description of FlotAsset
 *
 * @author     lyf <381296986@qq.com>
 * @date       2016-7-10
 */
class FlotAsset extends \yii\web\AssetBundle{
    public $sourcePath = '@bower/flot';
    public $js = [
        'jquery.flot.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
