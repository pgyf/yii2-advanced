<?php

namespace common\lib\assets;

use yii\web\View;

/**
 * Description of Html5shivAsset
 *
 * @author     lyf <381296986@qq.com>
 * @date       2015-11-7
 */
class Html5shivAsset extends \yii\web\AssetBundle{

    public $sourcePath = '@bower/html5shiv';
    public $js = [];
    public $jsOptions = [
        'condition'=>'lt IE 9',
        'position' => View::POS_HEAD,
    ];
    
    public function init() {
        $this->js[] = YII_DEBUG ? 'dist/html5shiv.js' : 'dist/html5shiv.min.js';
        parent::init();
    }
}
