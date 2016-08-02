<?php
/**
 * @link https://github.com/phpyii
 * @copyright Copyright (c) 2016 phpyii
 */

namespace common\lib\behaviors;

use Yii;
use yii\db\BaseActiveRecord;
use common\lib\helpers\Tools;

/**
 * IP
 * @author lyf <381296986@qq.com>
 * @date 2016-7-31
 * @since 1.0
 */
class IpBehavior extends \yii\behaviors\AttributeBehavior{
  
    public $createIpAttributes;
    public $updateIpAttributes;

    /**
     * @inheritdoc
     *
     * will be used as value.
     */
    public $value;


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if (empty($this->attributes)) {
            $this->attributes = [
                BaseActiveRecord::EVENT_BEFORE_INSERT => $this->createIpAttributes,
                BaseActiveRecord::EVENT_BEFORE_UPDATE => $this->updateIpAttributes,
            ];
        }
    }

    /**
     * @inheritdoc
     *
     * will be used as value.
     */
    protected function getValue($event)
    {
        if ($this->value === null) {
            return Tools::getClientIP(1);
        }
        return parent::getValue($event);
    }

    /**
     * Updates a ip attribute to the current ip.
     *
     * ```php
     * $model->touch('lastVisit');
     * ```
     * @param string $attribute the name of the attribute to update.
     * @throws InvalidCallException if owner is a new record (since version 2.0.6).
     */
    public function touch($attribute)
    {
        /* @var $owner BaseActiveRecord */
        $owner = $this->owner;
        if ($owner->getIsNewRecord()) {
            throw new InvalidCallException('Updating the timestamp is not possible on a new record.');
        }
        $owner->updateAttributes(array_fill_keys((array) $attribute, $this->getValue(null)));
    }
  
}
