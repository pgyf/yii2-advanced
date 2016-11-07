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
        'appBootstrap',
    ],
    'modules' => [
    'rbac' => [
        'class' => 'mdm\admin\Module',
        'layout' => 'left-menu', // default to null mean use application layout.
        'mainLayout' => '@app/views/layouts/main.php',
        'viewPath' => '@app/lib/extensions/mdmsoft/admin/views',
        'controllerMap' => [
           'assignment' => [
                'class' => 'mdm\admin\controllers\AssignmentController',
                'userClassName' => 'common\models\User',
                'searchClass' => 'backend\lib\extensions\mdmsoft\admin\models\search\UserSearch',
                'idField' => 'id'
            ],
        ],
        'menus' => [
//                'assignment' => [
//                    'label' => 'Grand Access' // change label
//                ],
//                'route' => null, // disable menu
              'user' => null,
        ],
//            'class' => 'backend\lib\extensions\mdmsoft\admin\Module',//'mdm\admin\Module', 'backend\lib\extensions\mdmsoft\admin\Module',
//            'controllerNamespace' => 'mdm\admin\controllers',
//            'controllerMap' => [
//                'assignment' => [
//                    'class' => 'mdm\admin\controllers\AssignmentController',
//                    /* 'userClassName' => 'app\models\User', */
//                    'searchClass' => 'backend\lib\extensions\mdmsoft\admin\models\search\UserSearch'
//            ],
//            'menu' => [
//                    'class' => 'backend\lib\extensions\mdmsoft\admin\controllers\MenuController',
//                ]
//            ],
//            'layout' => 'left-menu',
//            'mainLayout' => '@app/views/layouts/main.php'
        ]
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'cache' => function(){
            return Yii::$app->backendFileCache;
        },
       'backendFileCache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@common/runtime/cache',
            'keyPrefix' => 'backend_',
            'directoryLevel' => 1,
        ],
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
        'view' => [
            'class' => '\rmrevin\yii\minify\View',
            'enableMinify' => !YII_DEBUG,
            'web_path' => '@web', // path alias to web base
            'base_path' => '@webroot', // path alias to web base
            'minify_path' => '@webroot/minify', // path alias to save minify result
            'js_position' => [ \yii\web\View::POS_END ], // positions of js files to be minified
            'force_charset' => 'UTF-8', // charset forcibly assign, otherwise will use all of the files found charset
            'expand_imports' => !YII_DEBUG, // whether to change @import on content
            'compress_output' => !YII_DEBUG, // compress result html page
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
        'urlManager' => require(__DIR__.'/_urlManager.php'),
        'frontendCache' => require(Yii::getAlias('@frontend/config/_cache.php')),
        'appBootstrap' => \backend\lib\components\AppBootstrap::className(),
    ],
    'as access' => [
        'class' => 'backend\lib\extensions\mdmsoft\admin\components\AccessControl', //mdm\admin\components\AccessControl
        'allowActions' => [
            'site/*',
            'test/*',
            'rbac/*', //生产环境应该移除
            'gii/*', //生产环境应该移除
            'debug/*', //生产环境应该移除
        ]
    ],
    'as appAdminLog' => 'backend\lib\behaviors\AppAdminLogBehavior',
    'params' => $params,
];
