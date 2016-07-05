<?php

namespace common\lib\assets;

/**
 * Description of Html5shivAsset
 *
 * @author     lyf <381296986@qq.com>
 * @date       2015-11-7
 */
class JquerySlimScrollAsset extends \yii\web\AssetBundle{

    public $sourcePath = '@bower/jquery-slimscroll';
    public $js = [
        'jquery.slimscroll.min.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
    
}
