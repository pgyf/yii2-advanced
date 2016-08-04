<?php

namespace backend\models;

use Yii;
use yii\web\JsExpression;
use common\lib\enum\EnumUser;

/**
 * Description of User
 *
 * @author     lyf <381296986@qq.com>
 * @date       2015-11-25
 */
class User extends \common\models\User{
    //场景常量
    const SCENARIO_UPDATE_PWD = 'update-login-pwd';

    //增加属性
    public $password_old;
    public $password_new;
    public $password_confirm;
    
    public function attributeLabels()
    {
        return  array_merge(parent::attributeLabels(), [
            'password_old' => Yii::t('models/User', 'Old Password'),
            'password_new' => Yii::t('models/User', 'New Password'),
            'password_confirm' => Yii::t('models/User', 'Confirm Password'),
        ]);
    }
    
    /**
     * 规则
     * @return array
     */
    public function rules()
    {
        return  array_merge(parent::rules(),
        [
            ['username', 'string', 'min' => 2 , 'max' => 32],
            ['type', 'in', 'range' => EnumUser::getAllValue(EnumUser::TYPE)],
            ['status', 'default', 'value' => EnumUser::STATUS_ACTIVE],
            //修改密码部分
            ['password_new', 'trim'],
            ['password_old', 'required','when' => function($model) {
                return !empty($model->password_new);
            }, 'whenClient' => "function (attribute, value) {
                 return $('#user-password_new').val() != '';
            }"], 
            ['password_old', function($attribute, $params){
                if (!$this->validatePassword($this->$attribute)) {
                    $this->addError($attribute, Yii::t('backend', '{attribute} error',['attribute' => $this->getAttributeLabel($attribute)]));
                }
                else{
                    $this->password = $this->password_new;
                }
            },'when' => function($model) {
                return !empty($model->password_new);
            }], 
            ['password_confirm', 'compare', 'compareAttribute' => 'password_new', 'skipOnEmpty' => false,'when' => function($model) {
                return !empty($model->password_new);
            }],
        ]);
    }
    
    
    /**
     * 场景
     * @return array
     */
    public function scenarios()
    {
        return  array_merge(parent::scenarios(),
        [
            //修改登录密码
            self::SCENARIO_UPDATE_PWD => 
                [
                    'password_new','password_old', 'password_confirm', 'password','update_user','update_time' , 'update_ip',
                ],
        ]);
    }
    
    /**
     * 场景事务
     * @return array
     */
//    public function transactions()
//    {
//        $transactions = parent::transactions();
//        $transactions[self::SCENARIO_UPDATE_PWD] = self::OP_ALL;
//        return $transactions;
//    }
    
    
}
