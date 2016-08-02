<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;

/* @var $this yii\web\View */
/* @var $model common\models\User */


$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User List'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <?= Nav::widget([
                    'options' => [
                        'class' => 'nav-pills nav-stacked',
                    ],
                    'items' => [
                        ['label' => Yii::t('user', 'Account details'), 'url' => ['/user/update', 'id' => $model->id]],
                        ['label' => Yii::t('user', 'Profile details'), 'url' => ['/user/update-profile', 'id' => $model->id]],
                        ['label' => Yii::t('user', 'Information'), 'url' => ['/user/info', 'id' => $model->id]],
                        [
                            'label' => Yii::t('user', 'Assignments'),
                            'url' => ['/user/admin/assignments', 'id' => $model->id],
                            'visible' => isset(Yii::$app->extensions['dektrium/yii2-rbac']),
                        ],
                        '<hr>',
//                        [
//                            'label' => Yii::t('user', 'Confirm'),
//                            'url'   => ['/user/admin/confirm', 'id' => $model->id],
//                            'visible' => !$user->isConfirmed,
//                            'linkOptions' => [
//                                'class' => 'text-success',
//                                'data-method' => 'post',
//                                'data-confirm' => Yii::t('user', 'Are you sure you want to confirm this user?'),
//                            ],
//                        ],
//                        [
//                            'label' => Yii::t('user', 'Block'),
//                            'url'   => ['/user/admin/block', 'id' => $model->id],
//                            'visible' => !$model->isBlocked,
//                            'linkOptions' => [
//                                'class' => 'text-danger',
//                                'data-method' => 'post',
//                                'data-confirm' => Yii::t('user', 'Are you sure you want to block this user?'),
//                            ],
//                        ],
//                        [
//                            'label' => Yii::t('user', 'Unblock'),
//                            'url'   => ['/user/admin/block', 'id' => $model->id],
//                            'visible' => $model->isBlocked,
//                            'linkOptions' => [
//                                'class' => 'text-success',
//                                'data-method' => 'post',
//                                'data-confirm' => Yii::t('user', 'Are you sure you want to unblock this user?'),
//                            ],
//                        ],
                        [
                            'label' => Yii::t('user', 'Delete'),
                            'url'   => ['/user/admin/delete', 'id' => $model->id],
                            'linkOptions' => [
                                'class' => 'text-danger',
                                'data-method' => 'post',
                                'data-confirm' => Yii::t('user', 'Are you sure you want to delete this user?'),
                            ],
                        ],
                    ],
                ]) ?>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-body">
                <?= $content ?>
            </div>
        </div>
    </div>
</div>
