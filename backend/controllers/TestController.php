<?php
/**
 * @link https://github.com/phpyii
 * @copyright Copyright (c) 2016 phpyii
 */

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;

/**
 * 默认控制器
 * @author lyf <381296986@qq.com>
 * @date 2016-7-10
 * @since 1.0
 */
class TestController extends AdminController
{

    /**
     * 首页
     * @return string
     */
    public function actionIndex()
    {
        //return $this->render('index');
    }
    
    public function actionWebuploader()
    {
        return $this->render('webuploader');
    }

    public function actionWebuploaderModal()
    {
        return $this->render('webuploader-modal');
    }
    
    public function actionHtml5upload()
    {
        return $this->render('html5upload');
    }
  
    
    
}
