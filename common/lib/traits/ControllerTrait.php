<?php

namespace common\lib\traits;

use yii\base\Model;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * Description of ControllerTrait
 *
 * @author     lyf <381296986@qq.com>
 * @date       2016-7-7
 */
trait ControllerTrait {
    /**
     * Performs ajax validation.
     *
     * @param Model $model
     *
     * @throws \yii\base\ExitException
     */
    protected function performAjaxValidation(Model $model)
    {
        if (\Yii::$app->request->isAjax && $model->load(\Yii::$app->request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            \Yii::$app->response->data   = ActiveForm::validate($model);
            \Yii::$app->response->send();
            \Yii::$app->end();
        }
    }
}
