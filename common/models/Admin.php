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
use common\lib\behaviors\SoftDeleteBehavior;

class User extends \common\models\table\Admin implements IdentityInterface
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
            'TimestampBehavior' =>[
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create_time',
                'updatedAtAttribute' => 'update_time',
                'value' => function(){
                    return Tools::getServerTime();
                },
            ],
            'BlameableBehavior' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'create_user',
                'updatedByAttribute' => 'update_user',
            ],
            'softDeleteBehavior' => [
                'class' => SoftDeleteBehavior::className(),
                'softDeleteAttributeValues' => [
                    'deleted' => function($model){
                      return Tools::getServerTime();
                   }
                ],
                'restoreAttributeValues' => [
                    'deleted' => 0,
                ],
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
            [['type', 'create_user', 'update_user', 'create_time', 'update_time', 'create_ip', 'update_ip', 'status', 'login_ip', 'login_time','deleted'], 'integer'],
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
            ['type', 'default', 'value' => EnumUser::TYPE_USER],
            ['type', 'in', 'range' => EnumUser::getAllValue(EnumUser::TYPE)],
            ['status', 'default', 'value' => EnumUser::STATUS_ACTIVE],
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
     * 场景事务
     * @return array
     */
//    public function transactions()
//    {
//        return [
//            self::SCENARIO_DEFAULT => self::OP_ALL,
//        ];
//    }
    
    
    /**
     * 验证登录应用
     * @param string $app
     * @param string $msg
     * @return boolean
     */
    public function validateLogin($app, &$msg = ""){
        //系统用户无需验证
        if($this->isRoot){
            return true;
        }
        //验证用户状态
        $inactives = EnumUser::statusInactive();
        if($inactives && isset($inactives[$this->status])){
            $msg = $inactives[$this->status];
            return false;
        }
        
//        //后台项目
//        if(in_array($app, EnumAPP::$backendAppList)){
//           
//        }
//        //前台项目
//        else if(in_array($app, EnumAPP::$frontendAppList)){
//            
//        }
//        $msg =  Yii::t('common','You do not have permission to sign in');
        return true;
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
        return $this->hasOne(UserProfile::className(), ['user_id' => 'id'])->inverseOf('user');
    }
    
    /**
     * 是否管理员
     * @return boolean
     */
    public function getIsRoot(){
        return $this->type === EnumUser::TYPE_ROOT;
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
    
    /**
     * 首次增加
     * @param type $relations
     * @param type $runValidation
     * @param type $attributes
     */
    public function insertFirst($relations,$runValidation = true, $attributes = null) {
        $this->on(self::EVENT_AFTER_INSERT, function($event) use ($relations){
            foreach ($relations as $m) {
               $m->save(false);
            }
        });
        return $this->save($runValidation, $attributes);
    }
    
}
