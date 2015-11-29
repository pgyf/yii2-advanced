<?php

namespace common\models\query;
use common\lib\enum\EnumUser;

/**
 * This is the ActiveQuery class for [[\common\models\table\User]].
 *
 * @see \common\models\table\User
 */
class UserQuery extends \common\lib\base\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\table\User[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\table\User|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
   /**
     * 前台用户
     * @param type $db
     * @return \common\models\query\UserQuery
     */
    public function isAllFrontendUser()
    {
        $this->andWhere([$this->asFieldName('type') => EnumUser::$frontendTypeList]);
        return $this;
    }
    
   /**
     * 后台用户
     * @param type $db
     * @return \common\models\query\UserQuery
     */
    public function isAllBackendUser()
    {
        $this->andWhere([$this->asFieldName('type') => EnumUser::$backendTypeList]);
        return $this;
    }
    
    /**
     * 后台用户
     * @param type $db
     * @return \common\models\query\UserQuery
     */
    public function isBackendUser()
    {
        $this->andWhere([$this->asFieldName('type') => EnumUser::TYPE_BACKEND_USER]);
        return $this;
    }
    
    /**
     * 管理员
     * @param type $db
     * @return \common\models\query\UserQuery
     */
    public function isManager()
    {
        $this->andWhere([$this->asFieldName('type') => EnumUser::TYPE_MANAGER]);
        return $this;
    }
    

    
}