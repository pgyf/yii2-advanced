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
use common\messages\Trans;


/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $captcha;
    public $rememberMe = true;
    private $_user;
    
    
    public function attributeLabels()
    {
        return [
                'username' => Trans::t('Username'),
                'password' => Trans::t('Password'),
                'rememberMe' => Trans::t('Remember Me'),
                'reCaptcha' => Trans::t('Verification Code'),
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
            ['captcha', 'required',
                'when' => function($model){
                    return App::configParam('captcha.login', false);
                }
            ],
            ['captcha', CaptchaValidator::className(), 
                'when' => function($model){
                   return App::configParam('captcha.login', false);
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
            if($user){
                foreach ($user as $u) {
                    if($u->validatePassword($this->password)){
                        $this->_user = $u;
                    }
                }
            }
            if(!$this->_user){
                $this->addError($attribute, Trans::tMsg('Incorrect username or password.'));
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
        if ($this->_user && $this->validate()) {
            if($this->_user->validateUser($app, $errorMsg)){
                $this->log($app, 1);
                return Yii::$app->user->login($this->_user, $this->rememberMe ? 3600 * 24 * 30 : 0);
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
     * @return User|null
     */
    protected function getUser()
    {
        return User::findByAccount($this->username);
    }
    

    protected function log($app, $success = 0){
        $loginLog = new UserLogin();
        $loginLog->username = $this->username;
        $loginLog->password = $success ? '******' : $this->password;
        $loginLog->ip = Tools::getClientIP();
        $loginLog->user_agent = \Yii::$app->getRequest()->userAgent;
        $loginLog->app = $app;
        $loginLog->device = EnumAPP::getDevice();
        $loginLog->success = $success;
        $loginLog->insert(false);
    }
    
}
