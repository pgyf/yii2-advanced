<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'mKAA8-gJZYdzGz1oqthD-4YanusNyNvv',
        ],
    ],
];

if (!YII_ENV_PROD) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [ //here
                    'model' => [ //name generator
                       'class' => 'common\lib\modules\gii\generators\model\Generator', //class generator
                    ],
                    'messages' => [ //name generator
                        'class' => 'common\lib\modules\gii\generators\messages\Generator', //class generator
                    ],
                ],
    ];
}

return $config;
