<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\table\AdminLogin]].
 *
 * @see \common\models\table\AdminLogin
 */
class AdminLoginQuery extends \common\lib\base\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\table\AdminLogin[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\table\AdminLogin|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}