<?php
/**
 * HoverzoomAsset
 * @author xjflyttp <xjflyttp@gmail.com>
 * @see http://www.htmldrive.net/items/demo_show/1133
 * @see http://www.htmldrive.net/items/show/1133/Awesome-jQuery-image-Swish-Zoom-Hover-Effect
 */
namespace common\lib\assets\hoverzoom;

/**
 * 参考之 https://github.com/xjflyttp/yii2-hoverzoom-widget
 */
class HoverzoomAsset extends \yii\web\AssetBundle {
    
    public $basePath = '@webroot/assets';
    
    public $publishOptions = ['forceCopy' => YII_DEBUG];
    
    public $depends = ['yii\web\JqueryAsset'];
    
    public function init() {
        $this->sourcePath =  __DIR__;
        //$this->sourcePath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets';
        $this->js[] =  YII_DEBUG ? 'js/jquery.hover.zoom.js' : 'js/jquery.hover.zoom.min.js';
        return parent::init();
    }
}