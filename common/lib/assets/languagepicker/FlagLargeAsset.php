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
    public $css = [
        'stylesheets/flags-large.min.css',
    ];
    
    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
    
}
