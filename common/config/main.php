<?php
$config = [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timeZone' => 'Asia/Shanghai', //'PRC'
    'sourceLanguage'=>'en-US',
    'language' => 'zh-CN', //en-US zh-CN
    'bootstrap' => ['log'],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => env('DB_DSN'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'tablePrefix' => env('DB_TABLE_PREFIX'),
            'charset' => 'utf8',
            'enableSchemaCache' => YII_ENV_PROD,
            'schemaCacheDuration' => 3600,
            'schemaCache' => 'cache',
            'queryCache' => 'cache',
        ],
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            //'linkAssets' => true,
            'appendTimestamp' => YII_ENV_DEV,
        ],
        'commonCache' => function(){
            return Yii::$app->commonFileCache;
        },
       'commonFileCache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@common/runtime/cache',
            'keyPrefix' => 'common_',
            'directoryLevel' => 1,
        ],
        'wechatCache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@common/runtime/cache',
            'keyPrefix' => 'wechat_',
            'directoryLevel' => 1,
        ],
//        'commandBus' => [
//            'class' => 'trntv\bus\CommandBus',
//            'middlewares' => [
//                [
//                    'class' => '\trntv\bus\middlewares\BackgroundCommandMiddleware',
//                    'backgroundHandlerPath' => '@console/yii',
//                    'backgroundHandlerRoute' => 'command-bus/handle',
//                ]
//            ]
//        ],
        'formatter' => [
            'class' => 'common\lib\i18n\Formatter',
            'dateFormat' => 'yyyy-MM-dd',
            'datetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
            'decimalSeparator' => '.',
            'thousandSeparator' => ',',
            'currencyCode' => 'CNY',
            'timeZone' => 'UTC', //'PRC'
//            'defaultTimeZone' => 'Asia/Shanghai',
//            'locale' => 'zh-CN',
        ],
//        'glide' => [
//            'class' => 'trntv\glide\components\Glide',
//            'sourcePath' => '@storage/web/source',
//            'cachePath' => '@storage/cache',
//            'urlManager' => 'urlManagerStorage',
//            'maxImageSize' => env('GLIDE_MAX_IMAGE_SIZE'),
//            'signKey' => env('GLIDE_SIGN_KEY')
//        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            //'useFileTransport' => true,
            'messageConfig' => [
                'charset' => 'UTF-8',
                'from' => env('ADMIN_EMAIL')
            ]
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                'file' => [
                    'class' => 'yii\log\FileTarget',
                    'levels' => YII_DEBUG ? ['error', 'warning'] : ['error', 'warning'] ,
                ],
                'dbFile' => [
                    'class' => 'yii\log\FileTarget',
                    'levels' => YII_DEBUG ? ['info','error', 'warning'] : ['error', 'warning'] ,
                    'categories' => ['yii\db\*'],
                    'logFile' => '@runtime/logs/app_db.log',
                ],
//                'db'=>[
//                    'class' => 'yii\log\DbTarget',
//                    'levels' => ['error', 'warning'],
//                    'except'=>['yii\web\HttpException:*', 'yii\i18n\I18N\*'],
//                    'prefix'=>function () {
//                        $url = !Yii::$app->request->isConsoleRequest ? Yii::$app->request->getUrl() : null;
//                        return sprintf('[%s][%s]', Yii::$app->id, $url);
//                    },
//                    'logVars'=>[],
//                    'logTable'=>'{{%system_log}}'
//                ]
//                'email' => [
//                    'class' => 'yii\log\EmailTarget',
//                    'levels' => ['error', 'warning'],
//                    'message' => [
//                        'to' => ['admin@example.com', 'developer@example.com'],
//                        'subject' => '来自 example.com 的新日志消息',
//                    ],
//                ],
            ],
        ],
//        'urlManager' => [
//            //'class' => 'yii\web\urlManager',
//            'enablePrettyUrl' => true,
//            'showScriptName' => false,
//            'rules' => [
//                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
//                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
//            ]
//        ],
        'i18n'=> [
            'class' => 'yii\i18n\I18N',
            'translations' => [
//                'models'=>[
//                    'class' => 'yii\i18n\PhpMessageSource',
//                    'basePath'=>'@common/messages/models',
//                ],
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en-US',
                    'basePath' => '@common/messages',
                    'forceTranslation' => true,
                    'fileMap'=>[
                        'common'=>'common.php',
                        'backend'=>'backend.php',
                        'frontend'=>'frontend.php',
                        'enum'=>'enum.php',
                    ],
                    'on missingTranslation' => ['\backend\modules\i18n\Module', 'missingTranslation'],
                ],
                /* Uncomment this code to use DbMessageSource
                 '*'=> [
                    'class' => 'yii\i18n\DbMessageSource',
                    'sourceMessageTable'=>'{{%i18n_source_message}}',
                    'messageTable'=>'{{%i18n_message}}',
                    'enableCaching' => YII_ENV_DEV,
                    'cachingDuration' => 3600,
                    'on missingTranslation' => ['\backend\modules\i18n\Module', 'missingTranslation']
                ],
                */
            ],
        ],
        'keyStorage' => [
            'class' => 'common\lib\components\keyStorage\KeyStorage'
        ],
        'urlManagerBackend' => \yii\helpers\ArrayHelper::merge(
            [
                'hostInfo' => Yii::getAlias('@backendUrl')
            ],
            require(Yii::getAlias('@common/config/_urlManager.php')),
            require(Yii::getAlias('@backend/config/_urlManager.php'))
        ),
        'urlManagerFrontend' => \yii\helpers\ArrayHelper::merge(
            [
                'hostInfo' => Yii::getAlias('@frontendUrl')
            ],
            require(Yii::getAlias('@common/config/_urlManager.php')),
            require(Yii::getAlias('@frontend/config/_urlManager.php'))
        ),
//        'urlManagerStorage' => \yii\helpers\ArrayHelper::merge(
//            [
//                'hostInfo'=>Yii::getAlias('@storageUrl')
//            ],
//            require(Yii::getAlias('@storage/config/_urlManager.php'))
//        ),
    ],
];

if (YII_ENV_PROD) {
    $config['components']['log']['targets']['email'] = [
        'class' => 'yii\log\EmailTarget',
        'except' => ['yii\web\HttpException:*'],
        'levels' => ['error', 'warning'],
        'message' => ['from' => env('ROBOT_EMAIL'), 'to' => env('ADMIN_EMAIL')]
    ];
}
$allowedIPs = ['127.0.0.1', '::1', '192.168.1.102'];

if (YII_ENV_DEV) {    
//    $config['bootstrap'][] = 'gii';
//    $config['modules']['gii'] = [
//        'class' => 'yii\gii\Module',
//        'allowedIPs' => $allowedIPs,
//        'generators' => [ //here
//                    'model' => [ //name generator
//                       'class' => 'common\lib\modules\gii\generators\model\Generator', //class generator
//                    ],
//                    'messages' => [ //name generator
//                        'class' => 'common\lib\modules\gii\generators\messages\Generator', //class generator
//                    ],
//                ],
//    ];
//    $config['components']['cache'] = [
//        'class' => 'yii\caching\DummyCache'
//    ];
    $config['components']['mailer']['transport'] = [
        'class' => 'Swift_SmtpTransport',
        'host' => env('SMTP_HOST'),
        'port' => env('SMTP_PORT'),
    ];
}

//
//if (YII_DEBUG) {
//    $config['bootstrap'][] = 'debug';
//    $config['modules']['debug'] = [
//        'class' => 'yii\debug\Module',
//        'allowedIPs' => $allowedIPs,
//    ];
//}

return $config;
