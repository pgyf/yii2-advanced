<?php

namespace common\lib\behaviors;

use Yii;
//use yii\db\ActiveRecord;

/**
 * 重复提交
 * @author     lyf <381296986@qq.com>
 * @date       2015-10-31
 */
class RepeatSubmitBehavior extends \yii\base\Behavior{

    /**
     * 是否通过csrf防止重复提交
     */
    //public $csrf = false;
    
    
//    /**
//     * @inheritdoc
//     */
//    public function events()
//    {
//        return [
//            ActiveRecord::EVENT_BEFORE_INSERT => 'validateRepeat',
//            ActiveRecord::EVENT_BEFORE_UPDATE => 'validateRepeat',
//            ActiveRecord::EVENT_BEFORE_DELETE => 'validateRepeat',
//            //ActiveRecord::EVENT_AFTER_FIND => 'afterFind',
//        ];
//    }
    
    public function validateRepeat($csrf = true){
        Yii::$app->controller->enableCsrfValidation;
    }
  
    
    public function loadNoRepeat(){
        
    }
}
