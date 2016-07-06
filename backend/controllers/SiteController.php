<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\form\LoginForm;
use yii\filters\VerbFilter;
use common\lib\widgets\CaptchaAction;
use common\lib\enum\EnumAPP;
use common\lib\helpers\App;
use common\lib\components\keyStorage\FormModel;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','captcha'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','settings'],
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
     * @inheritdoc
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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        //App::validateReapet() && $model->load(Yii::$app->request->post()) 
        if (App::load($model) && $model->login(EnumAPP::APP_WEB_ADMIN)) {
            return $this->goBack();
        } else {
//            \yii\helpers\VarDumper::dump($model->getErrors(), 10, true);
//            exit;
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    
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
                    'label' => Yii::t('backend', 'Backend theme'),
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
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('alert', [
                'body' => Yii::t('backend', 'Settings was successfully saved'),
                'options' => ['class' => 'alert alert-success']
            ]);
            return $this->refresh();
        }
        return $this->render('settings', ['model' => $model]);
    }
    
}
