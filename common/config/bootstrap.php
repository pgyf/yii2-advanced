<?php

Yii::setAlias('base', dirname(dirname(__DIR__)));
Yii::setAlias('root', dirname(dirname(__DIR__)));
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');
//Yii::setAlias('storage', dirname(dirname(__DIR__)) . '/storage');
Yii::setAlias('tests', dirname(dirname(__DIR__)) . '/tests');


Yii::setAlias('@frontendUrl', env('FRONTEND_URL'));
Yii::setAlias('@backendUrl', env('BACKEND_URL'));

Yii::setAlias('storagePath', '@root/web/storage');
Yii::setAlias('storageUrl', env('STORAGE_URL', env('FRONTEND_URL/storage')));
