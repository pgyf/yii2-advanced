<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\web\IdentityInterface;
use common\lib\enum\EnumUser;
use common\lib\validators\PhoneValidator;
use common\lib\enum\EnumAPP;
use common\lib\helpers\Pattern;

class User extends \common\models\table\User implements IdentityInterface
{

    const EVENT_AFTER_SIGNUP = 'afterSignup';
    const EVENT_AFTER_LOGIN = 'afterLogin';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create_time',
                'updatedAtAttribute' => 'update_time',
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'create_user',
                'updatedByAttribute' => 'update_user',
            ],
        ];
    }

    /**
     * rules
     */
    public function rules()
    {
        return  array_merge(parent::rules(),
        [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'match', 'pattern' => Pattern::$userName],
            ['username', 'string', 'min' => 6, 'on' => ['create','update']],
            ['username', 'unique', 'targetClass' => User::className(), 'filter' => function ($query) {
                if (!$this->getModel()->isNewRecord) {
                    $query->andWhere(['not', ['id'=>$this->getModel()->id]]);
                }
            }],
//            ['username', 'string', 'min' => 2, 'on' => ['create','update']],
//            ['username', 'string', 'min' => 6, 'except' => ['backend-create','backend-update']],

            ['mobile', PhoneValidator::className()],
            ['email', 'email'],
            ['password', 'string', 'min' => 6],
            ['type', 'default', 'value' => EnumUser::TYPE_USER, 'on' => 'register'],
            ['type', 'in', 'range' => EnumUser::$frontendTypeList, 'on' => 'register'],
            ['type', 'default', 'value' => EnumUser::TYPE_BACKEND_USER, 'on' => ['create','update']],
            ['type', 'in', 'range' => [EnumUser::TYPE_BACKEND_USER], 'on' => 'create','update'],
            ['status', 'default', 'value' => EnumUser::STATUS_ACTIVE],
            ['status', 'in', 'range' => EnumUser::getAllValue(EnumUser::STATUS)],
        ]);
    }
    
    
    /**
     * 情景模式
     */
    public function scenarios()
    {
        return [
            'register' => [
                    'type', 'username', 'mobile','email', 'password', 'auth_key' , 'create_form_url', 'create_aouth_app' , 
                    'create_app', 'create_device','create_time' ,'create_ip','status'
                ],
            'create' => [
                    'type', 'username','password', 'auth_key' , 'create_form_url', 'create_aouth_app' , 
                    'create_app', 'create_device', 'create_user', 'create_time' ,'create_ip','status'
                ],
            'update' => 
                [
                    'type','username', 'password','update_user','update_time' , 'update_ip',
                ],
            'update-pwd' => 
                [
                    'password','update_user','update_time' , 'update_ip',
                ],
            'update-username' => 
                [
                    'username','update_user','update_time' , 'update_ip',
                ],
            'update-mobile' => 
                [
                    'mobile','update_user','update_time' , 'update_ip',
                ],
            'update-email' => 
                [
                    'email','update_user','update_time' , 'update_ip',
                ],
        ];
    }
    

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::find()->andWhere(['id' => $id ])->andWhere(['!=','status', EnumUser::STATUS_DELETED])->one();
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::find()->andWhere(['access_token' => $token ])->andWhere(['!=','status', EnumUser::STATUS_DELETED])->one();
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
        return static::find()->andWhere(['username' => $username ])->andWhere(['!=','status', EnumUser::STATUS_DELETED])->one();
    }
    
    /**
     * Finds user by username,mobile,email
     *
     * @param string $username
     * @return static|null
     */
    public static function findByAccount($username)
    {
        return static::find()->andWhere(['!=','status', EnumUser::STATUS_DELETED])
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
        return static::find()->andWhere(['password_reset_token' => $token ])->andWhere(['!=','status', EnumUser::STATUS_DELETED])->one();
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
    
    
    
    /**
     * 验证登录应用和用户类型
     * @param type $app
     * @param type $msg
     * @return boolean
     */
    public function validateUser($app, &$msg = ""){
        $userStatus = $this->status;
        $userType = $this->type;
        $inactives = EnumUser::statusInactive();
        if($inactives && isset($inactives[$userStatus])){
            $msg = $inactives[$userStatus];
            return false;
        }
        if(in_array($app, EnumAPP::$backendAppList)){
            if(in_array($userType,EnumUser::$backendTypeList)){
                return true;
            }
            else if($userType == EnumUser::TYPE_ADMIN){
                return true;
            }
        }
        else if(in_array($app, EnumAPP::$frontendAppList) && in_array($userType,EnumUser::$frontendTypeList)){
            return true;
        }
        $msg =  Yii::t('You do not have permission to sign in');
        return false;
    }
    
    
    public function beforeSave($insert) {
       if (parent::beforeSave($insert)) {
            if ($this->isNewRecord || (!$this->isNewRecord && $this->password)) {
                $this->setPassword($this->password);
            }
            if($this->isNewRecord){
                $this->auth_key = Yii::$app->security->generateRandomString();
                $this->access_token = Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfile()
    {
        return $this->hasOne(UserProfile::className(), ['user_id' => 'id']);
    }
    
    /**
     * Creates user profile and application event
     * @param array $profileData
     */
    public function afterSignup(array $profileData = [])
    {
//        $this->refresh();
//        Yii::$app->commandBus->handle(new AddToTimelineCommand([
//            'category' => 'user',
//            'event' => 'signup',
//            'data' => [
//                'public_identity' => $this->getPublicIdentity(),
//                'user_id' => $this->getId(),
//                'created_at' => $this->created_at
//            ]
//        ]));
//        $profile = new UserProfile();
//        $profile->locale = Yii::$app->language;
//        $profile->load($profileData, '');
//        $this->link('userProfile', $profile);
//        $this->trigger(self::EVENT_AFTER_SIGNUP);
//        // Default role
//        $auth = Yii::$app->authManager;
//        $auth->assign($auth->getRole(User::ROLE_USER), $this->getId());
    }
    
}
