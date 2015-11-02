<?php

namespace common\lib\behaviors;


/**
 * 软删除
 * 
 * @usage:
 * ```
 * public function behaviors() {
 *     return [
 *         SoftDeleteBehavior::className(),
 *     ];
 * }
 * ```
 * 
 * @author     lyf <381296986@qq.com>
 * @date       2015-10-31
 */
class SoftDeleteBehavior extends \yii\base\Behavior{

    /**
     * @var string delete time attribute
     */
    public $timeAttribute = false;
    /**
     *  @var string delete attribute
     */
    public $deleteAttribute = "delete";
    /**
     *  @var string deleted status attribute
     */
    public $deletedValue = 1;
    /**
     *  @var string active status attribute
     */
    public $activeValue = 0;
    
    /**
     * 删除成功或失败
     * @return bool
     */
    public function softDelete() {
        $attributes = [];
        if($this->timeAttribute) {
            $attributes[] = $this->timeAttribute;
            $this->owner->{$this->timeAttribute} = time();
        }
        $attributes[] = $this->deleteAttribute;
        $this->owner->{$this->deleteAttribute} = $this->deletedValue;
        // save record
        return $this->owner->save(false, $attributes);
    }
    /**
     * 恢复正常状态
     * @return bool
     */
    public function unDelete() {
        $attributes = [];
        if($this->timeAttribute) {
            $attributes[] = $this->timeAttribute;
            $this->owner->{$this->timeAttribute} = 0;
        }
        $attributes[] = $this->deleteAttribute;
        $this->owner->{$this->deleteAttribute} = $this->activeValue;
        // save record
        return $this->owner->save(false, $attributes);
    }
    /**
     * 强制从数据库删除
     * @return bool
     */
    public function dbDelete() {
        // store model so that we can detach the behavior and delete as normal
        $model = $this->owner;
        $this->detach();
        $result = $model->delete();
        $this->attach($model);
        return $result;
    }
    
}
