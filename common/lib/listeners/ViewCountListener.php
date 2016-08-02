<?php


namespace common\lib\listeners;

/**
 * Description of ViewCountListener
 *
 * @author     lyf <381296986@qq.com>
 * @date       2016-7-12
 */
class ViewCountListener {
    
    public static function handle($event)
    {
        /* @var $model \common\models\Article */
        $model = $event->model;
        // 浏览量变化
        $model->addView();
    }
}
