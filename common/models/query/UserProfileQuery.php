<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\table\UserProfile]].
 *
 * @see \common\models\table\UserProfile
 */
class UserProfileQuery extends \common\lib\base\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\table\UserProfile[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\table\UserProfile|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}