<?php

namespace common\lib\behaviors;

use Yii;
use yii\db\ActiveRecord;
//use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use common\models\ActionLog;
use common\models\enum\EnumActionLog;


/**
 * To use ActionLogBehavior, simply insert the following code to your ActiveRecord class:
 *
 * ```php
 * public function behaviors()
 * {
 *     return [
 *          [
 *              'class' => ActionLogBehavior::className(),
 *              'excludeAttributes' => ['content']
 *          ],
 *     ];
 * }
 * ```
 */




/**
 * Description of ActionLogBehavior
 *
 * @author liyunfang <381296986@qq.com>
 * @date 2015-08-07
 */
class ActionLogBehavior extends \yii\base\Behavior{

    /**
     * 应用
     * @var type 
     */
    public $app = null;


    /**
     * 不包括的属性
     * @var array 
     */
    public $excludeAttributes = []; //content
    
    /**
     * 隐藏值得属性
     * @var array 
     */
    public $hideAttributes = []; //password
    
    /**
     * @inheritdoc
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeInsert',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdate',
            ActiveRecord::EVENT_BEFORE_DELETE => 'beforeDelete',
            //ActiveRecord::EVENT_AFTER_FIND => 'afterFind',
        ];
    }
    public function beforeInsert($event)
    {
        $this->addLog(EnumActionLog::TYPE_CREATE);
    }
    public function beforeUpdate($event)
    {
        $this->addLog(EnumActionLog::TYPE_UPDATE);
    }
    public function beforeDelete($event)
    {
         $this->addLog(EnumActionLog::TYPE_DELETE);
    }
//    public function afterFind($event)
//    {
//         
//    }
    
    public function addLog($type){
        $desc = EnumActionLog::getName($type, EnumActionLog::TYPE);
        /* @var $model \yii\db\ActiveRecord */
        $model = $this->owner;
        //$model::className();
        $realName = strtolower(StringHelper::basename($model::className()));//Inflector::tableize($model->className());
        
        //改变的属性
        $dirtyAttributes = $model->getPrimaryKey(true);
        //原来的属性
        $oldAttributes = $model->getOldAttributes();
        //获取改变的值
        $dirtyAttributes = array_merge($dirtyAttributes, $model->getDirtyAttributes());
        //排除属性
        foreach ($this->excludeAttributes as $value) {
            if(isset($dirtyAttributes[$value])){
                unset($dirtyAttributes[$value]);
            }
            if(isset($oldAttributes[$value])){
                unset($oldAttributes[$value]);
            }
        }
        //隐藏的属性
        foreach ($this->hideAttributes as $value) {
            if(isset($dirtyAttributes[$value])){
                $dirtyAttributes[$value] = "******";
            }
            if(isset($oldAttributes[$value])){
                $oldAttributes[$value] = "******";
            }
        }   
        ActionLog::add($type, $desc.$realName,$dirtyAttributes, $oldAttributes);
    }
    
}
