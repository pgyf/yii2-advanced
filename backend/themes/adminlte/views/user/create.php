<?php
/* @var $this yii\web\View */
/* @var $model backend\models\form\UserForm */
/* @var $roles yii\rbac\Role[] */
$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => Yii::t('backend','User'),
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User List'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <?php echo $this->render('_form', [
        'model' => $model,
        'roles' => $roles
    ]) ?>

</div>