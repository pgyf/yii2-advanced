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
class AppAsset extends AssetBundle
{
    public $css = [
        'css/css.css',
    ];

    public $depends = [
        'common\lib\assets\Html5shivAsset',
        'common\lib\themes\adminlte\AdminLteAsset',
        //'common\lib\assets\AwesomeCheckboxAsset',
        'common\lib\assets\JquerySlimScrollAsset',
        'light\widgets\LockBsFormAsset',
    ];
    
    public function init() {
        $this->sourcePath =  __DIR__. DIRECTORY_SEPARATOR . 'static';
        return parent::init();
    }
    
}
