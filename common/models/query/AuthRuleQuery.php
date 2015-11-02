<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\table\AuthRule]].
 *
 * @see \common\models\table\AuthRule
 */
class AuthRuleQuery extends \common\lib\base\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\table\AuthRule[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\table\AuthRule|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}