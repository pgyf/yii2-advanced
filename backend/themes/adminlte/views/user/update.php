<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $roles yii\rbac\Role[] */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => Yii::t('backend','User'),
]).$model->username;
?>


<?php $this->beginContent('@app/views/user/_update-layout.php', ['model' => $model]) ?>

<?php echo $this->render('_form', [
    'model' => $model,
    'roles' => $roles
]) ?>

<?php $this->endContent() ?>

