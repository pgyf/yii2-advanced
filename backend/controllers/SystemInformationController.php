<?php
/**
 * @link https://github.com/phpyii
 * @copyright Copyright (c) 2016 phpyii
 */

namespace backend\controllers;

use Yii;
use probe\Factory;
use yii\helpers\Html;
use yii\web\Response;

/**
 * 服务器系统信息控制器
 * @author lyf <381296986@qq.com>
 * @date 2016-7-10
 * @since 1.0
 */
class SystemInformationController extends AdminController
{
    public function actionIndex()
    {
        $provider = Factory::create();
        if ($provider) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                if ($key = Yii::$app->request->get('data')) {
                    switch($key){
                        case 'cpu_usage':
                            return$provider->getCpuUsage();
                            break;
                        case 'memory_usage':
                            return ($provider->getTotalMem() - $provider->getFreeMem()) / $provider->getTotalMem();
                            break;
                    }
                }
            } else {
                return $this->render('index', ['provider' => $provider]);
            }
        } else {
            return $this->render('fail');
        }
    }
}