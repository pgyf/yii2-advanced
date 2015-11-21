<?php
$params = [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'pager.pageSize' => 20,
    'pager.pageSizeList' => [10, 20, 30, 50],
    'captcha.login' => true,
    'fileStorage' => [
        'fileTarget' => 'oss',
        'mode' => [
            'qiniu' => [
                'ak' => 'S557wuc0wTQHuPuETajWXDMTQoqtTl8fXxBytiEp',
                'sk' => '52ISyQU7e-x_DseQiUBW64_7_l7v801hGfdXLT5U',
                'suffix' => '',
                'buckets' => [
                    'test' => ['host' => 'http://7xks02.com1.z0.glb.clouddn.com/']
                ]
            ],
        ],
    ],
];
return array_merge($params, require(__DIR__ . '/params-oauth.php'));
