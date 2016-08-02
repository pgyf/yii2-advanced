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
use common\lib\traits\UserTrait;
use common\lib\helpers\Tools;

class User extends \common\models\table\User implements IdentityInterface
{

    use UserTrait;
    
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
                'value' => function(){
                    return Tools::getServerTime();
                },
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
        return  [
            [['username','email','mobile'], 'trim'],
            [['type', 'password', 'auth_key', 'access_token'], 'required'],
            [['type', 'create_user', 'update_user', 'create_time', 'update_time', 'create_ip', 'update_ip', 'status', 'login_ip', 'login_time'], 'integer'],
            [['username', 'mobile', 'auth_key', 'access_token', 'create_aouth_app', 'create_app', 'create_device'], 'string', 'max' => 32],
            [['email', 'password', 'create_form_url'], 'string', 'max' => 255],
            [['create_ip','update_ip','login_ip'],'filter','filter' => 'ip2long'],
            ['username', 'match', 'pattern' => Pattern::$userName],
            [['username','email','mobile'], 'unique', 'targetClass' => User::className(), 'filter' => function ($query) {
                if (!$this->getModel()->isNewRecord) {
                    $query->andWhere(['not', ['id'=>$this->getModel()->id]]);
                }
            }],
            ['mobile', PhoneValidator::className()],
            ['email', 'email'],
            ['password', 'string', 'min' => 6, 'max' => 255],
            //['type', 'default', 'value' => EnumUser::TYPE_USER, 'on' => 'register'],
            //['type', 'in', 'range' => EnumUser::$frontendTypeList, 'on' => 'register'],
            //['type', 'default', 'value' => EnumUser::TYPE_BACKEND_USER, 'on' => ['create','update']],
            //['status', 'default', 'value' => EnumUser::STATUS_ACTIVE],
            ['status', 'in', 'range' => EnumUser::getAllValue(EnumUser::STATUS)],
        ];
    }
    
    
    /**
     * 情景模式
     */
    public function scenarios()
    {
        return parent::scenarios();
//        return [
//            'register' => [
//                    'type', 'username', 'mobile','email', 'password', 'auth_key' , 'create_form_url', 'create_aouth_app' , 
//                    'create_app', 'create_device','create_time' ,'create_ip','status'
//                ],
//            'create' => [
//                    'type', 'username','password', 'auth_key' , 'create_form_url', 'create_aouth_app' , 
//                    'create_app', 'create_device', 'create_user', 'create_time' ,'create_ip','status'
//                ],
//            'update' => 
//                [
//                    'type','username', 'password','update_user','update_time' , 'update_ip',
//                ],
//            'update-pwd' => 
//                [
//                    'password','update_user','update_time' , 'update_ip',
//                ],
//            'update-username' => 
//                [
//                    'username','update_user','update_time' , 'update_ip',
//                ],
//            'update-mobile' => 
//                [
//                    'mobile','update_user','update_time' , 'update_ip',
//                ],
//            'update-email' => 
//                [
//                    'email','update_user','update_time' , 'update_ip',
//                ],
//        ];
    }
    

    
    /**
     * 验证登录应用
     * @param string $app
     * @param string $msg
     * @return boolean
     */
    public function validateLogin($app, &$msg = ""){
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
    
    /**
     * 
     * @param boolean $insert
     * @return boolean
     */
    public function beforeSave($insert) {
       if (parent::beforeSave($insert)) {
            if ($this->isNewRecord || (!$this->isNewRecord && $this->password)) {
                if($this->isAttributeChanged('password')){
                    $this->setPassword($this->password);
                }
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
     * 用户资料
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfile()
    {
        return $this->hasOne(UserProfile::className(), ['user_id' => 'id']);
    }
    
    /**
     * 是否管理员
     * @return boolean
     */
    public function getIsAdmin(){
        return in_array($this->type, [EnumUser::TYPE_ADMIN , EnumUser::TYPE_MANAGER])  ? true : false;
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
