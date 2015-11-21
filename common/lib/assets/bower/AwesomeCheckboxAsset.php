<?php

namespace common\lib\assets\bower;

/**
 * Description of HoverdropdownAsset
 *
 * @author     lyf <381296986@qq.com>
 * @date       2015-11-15
 */
class AwesomeCheckboxAsset extends \yii\web\AssetBundle{

    public $sourcePath = '@bower/awesome-bootstrap-checkbox';
    public $css = [
        'awesome-bootstrap-checkbox.css',
    ];
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
    ];
    
}

