<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\themes\adminlte\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SystemInformationAsset extends AssetBundle
{
    //public $sourcePath = '@app/themes/adminlte/assets/static';  
    
    public $css = [
    ];
    public $js = ['js/system-information.js'];
    
    public $depends = [
        '\yii\web\JqueryAsset', 
        '\common\lib\assets\FlotAsset', 
        '\yii\bootstrap\BootstrapPluginAsset'
    ];
    public function init() {
        $this->sourcePath =  __DIR__. DIRECTORY_SEPARATOR . 'static';
        return parent::init();
    }
}
