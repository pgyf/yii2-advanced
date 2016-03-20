<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timeZone' => 'Asia/Shanghai', //'PRC'
    'language' => 'zh-CN', //en-US zh-CN
    'components' => [
//        'db' => [
//            'class' => 'yii\db\Connection',
//            'dsn' => 'mysql:host=dalie150116.mysql.rds.aliyuncs.com;dbname=dl_d',
//            'username' => '',
//            'password' => '',
//            'charset' => 'utf8',
//            'tablePrefix' => 'yii2_',
//            'enableSchemaCache' => true,
//            'schemaCacheDuration' => 3600,
//            'schemaCache' => 'cache',
//            'queryCache' => 'cache',
//        ],
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'linkAssets' => true,
            'appendTimestamp' => YII_ENV_DEV,
        ],
        'cache' => function(){
            return Yii::$app->fileCache;
        },
       'fileCache' => [
            'class' => 'yii\caching\FileCache',
            'keyPrefix' => 'common_',
            'directoryLevel' => 2,
        ],
        'wechatCache' => [
            'class' => 'yii\caching\FileCache',
            'keyPrefix' => 'wechat_',
            'directoryLevel' => 2,
        ],
        'urlManager' => [
            //'class' => 'yii\web\urlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ]
        ],
        'i18n'=> [
            'class' => 'yii\i18n\I18N',
            'translations' => [
//                '*' => [
//                    'class' => 'yii\i18n\PhpMessageSource',
//                    'sourceLanguage' => 'en-US',
//                    'basePath' => '@app/messages',
//                    'forceTranslation' => true,
//                ],
                'language' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en-US', //'en-US',
                    'basePath' => '@common/messages',
                    'forceTranslation' => true,
                ],
                'common*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en-US',
                    'basePath' => '@common/messages',
                    'forceTranslation' => true,
                ],
            ],
        ],
        'formatter' => [
            'class' => 'common\lib\i18n\Formatter',
            'dateFormat' => 'yyyy-MM-dd',
            'datetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
            'decimalSeparator' => '.',
            'thousandSeparator' => ',',
            'currencyCode' => 'CNY',
            'timeZone' => 'UTC', //'PRC'
            //'defaultTimeZone' => 'Asia/Shanghai',
//            'locale' => 'zh-CN',

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
    ],
];
