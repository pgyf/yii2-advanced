<?php

namespace common\lib\assets\languagepicker;


/**
 * Description of FlagLargeAsset
 *
 * @author     lyf <381296986@qq.com>
 * @date       2015-11-7
 */
class FlagLargeAsset extends \yii\web\AssetBundle{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@common/lib/assets/languagepicker';

    /**
     * @inheritdoc
     */
    public $css = [];
    
    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
    
    public function init() {
        $this->css[] = YII_DEBUG ? 'stylesheets/flags-large.css' : 'stylesheets/flags-large.min.css';
        parent::init();
    }
    
}
