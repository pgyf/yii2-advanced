<?php

namespace common\lib\assets;

/**
 * Description of Html5shivAsset
 *
 * @author     lyf <381296986@qq.com>
 * @date       2015-11-7
 */
class Html5shivAsset extends \yii\web\AssetBundle{

    public $sourcePath = '@bower/html5shiv';
    public $js = [
        'dist/html5shiv.min.js'
    ];
    public $jsOptions = [
        'condition'=>'lt IE 9'
    ];
    
}
