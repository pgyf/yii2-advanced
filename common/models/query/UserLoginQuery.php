<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\table\UserLogin]].
 *
 * @see \common\models\table\UserLogin
 */
class UserLoginQuery extends \common\lib\base\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\table\UserLogin[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\table\UserLogin|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}