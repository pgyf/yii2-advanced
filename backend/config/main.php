<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'name' => 'XX后台管理系统',
    'defaultRoute' => '/site/index',
    'language' => 'zh-CN', //en-US zh-CN
    'controllerNamespace' => 'backend\controllers',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'backend\lib\components\AppBootstrap',
    ],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
        ]
    ],
    'components' => [
        'user' => [
            'class' =>  'common\lib\components\User',
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => [0 => '/site/login'],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\PhpManager'
            'defaultRoles' => ['?'],
            'cache' => 'cache',   // this enables RBAC caching
        ],
        'errorHandler' => [
            'errorAction' => '/site/error',
        ],
        'urlManager' => [
            'class' => 'common\lib\components\UrlManager', //'yii\web\urlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'enableDefaultLanguageUrlCode' => true,
            'languages' => ['cn' => 'zh-CN','en' => 'en-US'],
            'ruleConfig' => [
                'class' => 'yii\web\UrlRule', //'common\lib\components\LanguageUrlRule'
                'encodeParams' => false,
            ],
            'rules' => [
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ]
        ],
        'view' => [
            'theme' => [
                   'class'=>'common\lib\components\Theme',
                   'active'=>'adminlte',
                   'pathMap' => [ 
                        'adminlte' => [
                           '@app/views' => ['@app/themes/adminlte/views']
                        ],
                    ],
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 'skin-black',
                ],
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'admin/*', //生产环境应该移除
            'gii/*', //生产环境应该移除
            'debug/*', //生产环境应该移除
        ]
    ],
    'params' => $params,
];
