<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use rmrevin\yii\fontawesome\FA;
use common\lib\enum\EnumUserProfile;
/* @var $this yii\web\View */
/* @var $model common\base\MultiModel */
/* @var $form yii\widgets\ActiveForm */
$this->title = Yii::t('backend', 'User Setting');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box">
    <div class="box-body">

    <?php $form = ActiveForm::begin(
            ['layout' => 'horizontal']
    ); ?>
    
   
    <h2><?php echo Yii::t('backend', 'Profile Setting') ?></h2>


    <?php echo $form->field($model->getModel('profile'), 'nickname')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model->getModel('profile'), 'email')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model->getModel('profile'), 'gender')->inline(true)->radioList(EnumUserProfile::getAll(EnumUserProfile::GENDER)) ?>
 
    
    <h2><?php echo Yii::t('backend', 'Account Setting') ?></h2>
    <?php echo $form->field($model->getModel('account'), 'password_old')->passwordInput() ?>
    
    <?php echo $form->field($model->getModel('account'), 'password_new')->passwordInput() ?>

    <?php echo $form->field($model->getModel('account'), 'password_confirm')->passwordInput() ?>
    


    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-3">

            </div>
            <div class="col-sm-6">
                
        <?php echo Html::submitButton(FA::icon('check').' '.Yii::t('backend','Update'), ['class' => 'btn btn-primary pull-left']) ?>
            </div>
        </div>
     </div>


    <?php ActiveForm::end(); ?>
   </div>
</div>