<?php

namespace common\lib\themes\adminlte;

/**
 * Description of AdminLteAsset
 *
 * @author     lyf <381296986@qq.com>
 * @date       2015-11-15
 */
class AdminLteAsset extends \dmstr\web\AdminLteAsset{
    
    public function init() {
        if(YII_DEBUG){
            $this->css = [
                'css/AdminLTE.css',
            ];
            $this->js = [
                'js/app.js'
            ];
        }
        parent::init();
    }
    
}
