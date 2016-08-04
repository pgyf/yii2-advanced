<?php
namespace backend\models\form;
use backend\models\User;
use yii\base\Exception;
use Yii;
use yii\helpers\ArrayHelper;
use common\lib\enum\EnumUser;
use common\messages\Trans;

/**
 * Create user form
 */
class UserForm extends \yii\base\Model
{
    //public $username;
    public $email;
    public $password;
    public $type;
    public $status;
    public $roles;
    private $model;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            ['username', 'filter', 'filter' => 'trim'],
//            ['username', 'required'],
//            ['username', 'match', 'pattern' => Pattern::$userName],
//            ['username', 'unique', 'targetClass' => User::className(), 'filter' => function ($query) {
//                if (!$this->getModel()->isNewRecord) {
//                    $query->andWhere(['not', ['id'=>$this->getModel()->id]]);
//                }
//            }],
//            ['username', 'string', 'min' => 2, 'on' => ['create','update']],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass'=> User::className(), 'filter' => function ($query) {
                if (!$this->getModel()->isNewRecord) {
                    $query->andWhere(['not', ['id'=>$this->getModel()->id]]);
                }
            }],
            ['password', 'required', 'on' => 'create'],
            ['password', 'string', 'min' => 6],
//            ['type', 'default', 'value' => EnumUser::TYPE_USER, 'on' => 'register'],
//            ['status', 'default', 'value' => EnumUser::STATUS_ACTIVE],
//            ['status', 'in', 'range' => EnumUser::getAllValue(EnumUser::STATUS)],
//            [['roles'], 'each',
//                'rule' => ['in', 'range' => ArrayHelper::getColumn(
//                    Yii::$app->authManager->getRoles(),
//                    'name'
//                )]
//            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $modelName = 'models/User';
        return [
            'username' => Yii::t($modelName, 'Username'),
            'email' => Yii::t($modelName, 'Email'),
            'status' => Yii::t($modelName, 'Status'),
            'password' => Yii::t($modelName, 'Password'),
            'type' => Yii::t($modelName, 'Type'),
            'roles' => Yii::t('backend','Roles'),
        ];
    }
    /**
     * @param User $model
     * @return mixed
     */
    public function setModel($model)
    {
        $this->email = $model->email;
        $this->status = $model->status;
        $this->type = $model->type;
        $this->model = $model;
        $this->roles = ArrayHelper::getColumn(
            Yii::$app->authManager->getRolesByUser($model->getId()),
            'name'
        );
        return $this->model;
    }
    /**
     * @return User
     */
    public function getModel()
    {
        if (!$this->model) {
            $this->model = new User();
        }
        return $this->model;
    }
    /**
     * Signs user up.
     * @return User|null the saved model or null if saving fails
     * @throws Exception
     */
    public function save()
    {
        if ($this->validate()) {
            $model = $this->getModel();
            $isNewRecord = $model->getIsNewRecord();
            $model->email = $this->email;
            $model->type = $this->type;
            $model->status = $this->status;
//            if ($this->password) {
//                $model->setPassword($this->password);
//            }
            if (!$model->save()) {
                throw new Exception('Model not saved');
            }
            if ($isNewRecord) {
                $model->afterSignup();
            }
            return !$model->hasErrors();
        }
        return null;
    }
}