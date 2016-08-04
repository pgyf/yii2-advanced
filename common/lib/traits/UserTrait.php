<?php

namespace common\lib\traits;

use Yii;
use common\lib\enum\EnumUser;

/**
 * Description of UserTrait
 *
 * @author     lyf <381296986@qq.com>
 * @date       2016-7-17
 */
trait UserTrait {


    /**
     * 通过id查找未删除的用户
     * @param string $id
     * @return \common\models\query\UserQuery
     */
    public static function findIdentity($id)
    {
        return static::find()->andWhere(['id' => $id ])->notDeleted()->one();
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::find()->andWhere(['access_token' => $token ])->notDeleted()->one();
        //throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::find()->andWhere(['username' => $username ])->notDeleted()->one();
    }
    
    /**
     * Finds user by username,mobile,email
     *
     * @param string $username
     * @return static|null
     */
    public static function findByAccount($username)
    {
        return static::find()->notDeleted()
                ->andWhere(['or',['username' => $username ],['mobile' => $username ],['email' => $username ]])
                ->one();
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }
        return static::find()->andWhere(['password_reset_token' => $token ])->notDeleted()->one();
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     * 自动登录时，cookie中的authkey
     */
    public static function generateAuthKey($event)
    {
        //if (!$this->isNewRecord) {
            $identity = $event->identity;
            $identity->auth_key = Yii::$app->security->generateRandomString();
//            $identity->save(false,['auth_key']);
        //}
        Yii::$app->db->createCommand()->update('{{%user}}', ['auth_key' => $identity->auth_key],['id' => $identity->id])->execute();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    
    
    
}
