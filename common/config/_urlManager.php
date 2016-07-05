<?php
return [
    'class' => 'common\lib\components\UrlManager', //'yii\web\urlManager',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    //'enableDefaultLanguageUrlCode' => true,
    'languages' => ['en-US'=>'English (US)','zh-CN' => '简体中文',],
    'ruleConfig' => [
        'class' => 'yii\web\UrlRule', //'common\lib\components\LanguageUrlRule'
        'encodeParams' => false,
    ],
    'rules' => [
        '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
    ]
];