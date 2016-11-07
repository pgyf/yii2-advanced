<?php
/**
 * @link https://github.com/phpyii
 * @copyright Copyright (c) 2016 phpyii
 */

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use common\models\form\LoginForm;
use common\lib\widgets\CaptchaAction;
use common\lib\enum\EnumAPP;
use common\lib\helpers\App;
use common\lib\components\keyStorage\FormModel;
use common\lib\base\MultiModel;
use backend\models\User;

/**
 * 默认控制器
 * @author lyf <381296986@qq.com>
 * @date 2016-7-10
 * @since 1.0
 */
class SiteController extends AdminController
{
    /**
     * behaviors
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','captcha','test'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','settings','update-profile'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * 
     * @return array
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' =>[
                'class' => CaptchaAction::className(),
                'height' => 42,
                //'fixedVerifyCode' => YII_ENV_DEV ? '1111' : null,
            ],
        ];
    }

    /**
     * 首页
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 登录
     * @return string|\yii\web\Response
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if (App::validateReapet() && $model->load(Yii::$app->request->post()) && $model->login(EnumAPP::APP_WEB_ADMIN)) {
            return $this->goBack();
        } else {
//            \yii\helpers\VarDumper::dump($model->getErrors(), 10, true);
//            exit;
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * 退出
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
    
    
    /**
     * 网站设置
     * @return string|\yii\web\Response
     */
    public function actionSettings()
    {
        $model = new FormModel([
            'keys' => [
                'frontend.maintenance' => [
                    'label' => Yii::t('backend', 'Frontend maintenance mode'),
                    'type' => FormModel::TYPE_CHECKBOX
//                    'type' => FormModel::TYPE_DROPDOWN,
//                    'items' => [
//                        'disabled' => Yii::t('backend', 'Disabled'),
//                        'enabled' => Yii::t('backend', 'Enabled')
//                    ]
                ],
                'backend.theme-skin' => [
                    'label' => Yii::t('backend', 'Backend Theme'),
                    'type' => FormModel::TYPE_RADIOLIST,
                    'options' => ['inline'=>true],
                    'items' => [
                        'skin-black' => Yii::t('backend', 'Skin-Black'),
                        'skin-blue' => Yii::t('backend', 'Skin-Blue'),
                        'skin-green' => Yii::t('backend', 'Skin-Green'),
                        'skin-purple' => Yii::t('backend', 'Skin-Purple'),
                        'skin-red' => Yii::t('backend', 'Skin-Red'),
                        'skin-yellow' => Yii::t('backend', 'Skin-Yellow'),
                    ]
                ],
                'backend.layout-fixed' => [
                    'label' => Yii::t('backend', 'Fixed backend layout'),
                    'type' => FormModel::TYPE_CHECKBOX
                ],
                'backend.layout-boxed' => [
                    'label' => Yii::t('backend', 'Boxed backend layout'),
                    'type' => FormModel::TYPE_CHECKBOX
                ],
                'backend.layout-collapsed-sidebar' => [
                    'label' => Yii::t('backend', 'Backend sidebar collapsed'),
                    'type' => FormModel::TYPE_CHECKBOX
                ],
                'backend.layout-sidebar-mini' => [
                    'label' => Yii::t('backend', 'Backend sidebar mini'),
                    'type' => FormModel::TYPE_CHECKBOX
                ],
            ]
        ]);
        if (App::validateReapet() && $model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('alert', [
                'body' => Yii::t('backend', 'Settings was successfully saved'),
                'options' => ['class' => 'alert alert-success']
            ]);
            return $this->refresh();
        }
        return $this->render('settings', ['model' => $model]);
    }
    
    

    /**
     * 更新登录用户资料
     * @return string|\yii\web\Response
     */
    public function actionUpdateProfile()
    {
        $loginUser = new User(['scenario' => User::SCENARIO_UPDATE_PWD]);
        $oldAttr = Yii::$app->user->identity->getAttributes();
        $loginUser->setOldAttributes($oldAttr);
        $loginUser->setAttributes($oldAttr,false);
        //var_dump($loginUser);exit;
        //$loginUser->id = Yii::$app->user->getId();
        
        $model = new MultiModel([
            'models' => [
                'account' => $loginUser,
                'profile' => Yii::$app->user->identity->userProfile
            ]
        ]);
        if (App::validateReapet() && $model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('alert', [
                'options' => ['class'=>'alert-success'],
                'body' => Yii::t('backend', 'Your account has been successfully saved')
            ]);
            return $this->refresh();
        }
        return $this->render('update-profile', ['model'=>$model]);
    }
    
    
    public function actionTest(){
        return $this->render('test');
    }
    
    
}
