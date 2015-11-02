<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\table\AuthItemChild]].
 *
 * @see \common\models\table\AuthItemChild
 */
class AuthItemChildQuery extends \common\lib\base\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\table\AuthItemChild[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\table\AuthItemChild|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}