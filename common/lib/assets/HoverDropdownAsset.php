<?php

namespace common\lib\assets;

/**
 * Description of HoverdropdownAsset
 *
 * @author     lyf <381296986@qq.com>
 * @date       2015-11-7
 */
class HoverDropdownAsset extends \yii\web\AssetBundle{

    public $sourcePath = '@bower/bootstrap-hover-dropdown';
    public $js = [ ];
    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
    
    public function init() {
        $this->js[] = YII_DEBUG ? 'bootstrap-hover-dropdown.js' : 'bootstrap-hover-dropdown.min.js';
        parent::init();
    }
    
}
