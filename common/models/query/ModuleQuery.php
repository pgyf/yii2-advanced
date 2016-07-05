<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\table\Module]].
 *
 * @see \common\models\table\Module
 */
class ModuleQuery extends \common\lib\base\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\table\Module[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\table\Module|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}