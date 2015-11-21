<?php

namespace common\lib\themes\adminlte;


/**
 * Description of MainAsset
 *
 * @author     lyf <381296986@qq.com>
 * @date       2015-11-8
 */
class MainAsset extends \yii\web\AssetBundle{

    public $sourcePath = '@common/lib/themes/adminlte';
    
    public $css = [
        'css/css.css',
    ];
//    public $js = [
//    ];
    public $depends = [
        'common\lib\themes\adminlte\AdminLteAsset',
        'common\lib\assets\bower\AwesomeCheckboxAsset',
    ];
    
}
