<?php
namespace common\models\form;

use Yii;
use yii\base\Model;
use common\models\User;
use common\models\UserLogin;
use common\lib\validators\CaptchaValidator;
use common\lib\helpers\App;
use common\lib\enum\EnumAPP;
use common\lib\helpers\Tools;


/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $verifyCode;
    public $rememberMe = false;
    private $_user = false;
    
    
    public function attributeLabels()
    {
        return [
                'username' => Yii::t('models/User', 'Username'),
                'password' => Yii::t('models/User', 'Password'),
                'rememberMe' => Yii::t('common', 'Remember Me'),
                'verifyCode' => Yii::t('common', 'Verification Code'),
            ];
    }
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            ['username', 'string', 'min' => 2],
            ['verifyCode', 'required',
                'when' => function($model){
                    return App::param('captcha.login', false);
                }
            ],
            ['verifyCode', CaptchaValidator::className(), 
                'when' => function($model){
                   return App::param('captcha.login', false);
                }
            ],
        ];
    }

    
    /**
     * 情景模式
     */
//    public function scenarios()
//    {
//        return [
//            'login' => [ 'username', 'password'],
//        ];
//    }
    
    
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if(!$user || !$user->validatePassword($this->password)){
                $this->addError($attribute, Yii::t('common','Incorrect username or password'));
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login($app)
    {
        if ($this->validate()) {
            if($this->getUser()->validateLogin($app, $errorMsg)){
                $this->log($app, 1);
                return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
            }
            else{
                $this->addError('username', $errorMsg);
            }
        }
        $this->log($app, 0);
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return \common\models\User
     */
    protected function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByAccount($this->username);
        }
        return $this->_user;
    }
    
    /**
     * 记录登录日志
     * @param string $app
     * @param int $success
     */
    protected function log($app, $success = 0){
        $loginLog = new UserLogin();
        $loginLog->username = $this->username;
        $loginLog->password = $success ? '******' : $this->password;
        $loginLog->ip = Tools::getClientIP();
        $loginLog->user_agent = \Yii::$app->getRequest()->userAgent;
        $loginLog->app = $app;
        $loginLog->device = EnumAPP::getDevice();
        $loginLog->success = $success;
        $loginLog->save();
        //更新用户登录次数
        if($success){
            Yii::$app->db->createCommand()->update('{{%user}}', ['login_ip' => Tools::getClientIP(1),'login_time' => Tools::getServerTime()],['id' => $this->getUser()->id])->execute();
        }
    }
    
}
