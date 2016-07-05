<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\lib\widgets\AwesomeCheckbox;
use common\lib\helpers\App;
use yii\captcha\Captcha;
use yii\helpers\Json;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title =  Yii::t('common','Sign In');

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='fa fa-user form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='fa fa-key form-control-feedback'></span>"
];

$fieldOptions3 = [
    'options' => ['class' => 'form-group form-horizontal has-feedback'],
    //'inputTemplate' => "{input}<span class='glyphicon glyphicon-check form-control-feedback'></span>"
];

?>
<div class="outer">
    <div class="middle bg-overlay">
        <div class="container-fluid">
        
        
<div class="login-box">
<!--    <div class="login-logo">
        <a href="#"><b>管理后台</b></a>
    </div>-->
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"></p>

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            // 'layout' => 'horizontal'
            ]); ?>

        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
        
         <?= App::param('captcha.login', false) ? 
           $form->field($model, 'verifyCode', $fieldOptions3)
            ->label(false)
            ->widget(Captcha::classname(),['template' => '<div class="row"><div class="col-lg-8 col-xs-9 col-sm-8">{input}<span style="right: 15px;" class="glyphicon glyphicon-check form-control-feedback"></span></div> <div class="col-lg-4  col-xs-3 col-sm-4">{image}</div></div>','imageOptions' => ['style' => 'cursor:pointer', 'title' => Yii::t('common','Click replace verification code')],'options' => [ 'placeholder'=> $model->getAttributeLabel('verifyCode'),'class' => 'form-control','style' => '','maxlength' => 7]])
            //->textInput(['placeholder' => $model->getAttributeLabel('verifyCode')])
            //$form->field($model, 'reCaptcha')->widget(\yii\captcha\Captcha::classname(),['template' => '{input} {image}','imageOptions' => ['style' => 'cursor:pointer', 'title' => Trans::tMsg('Click replace verification code')],'options' => [ 'placeholder'=> $model->getAttributeLabel('reCaptcha'),'class' => 'form-control','style' => 'display:inline-block;width:150px;','maxlength' => 7]])->label(false) 
            : ''
            ?>
        
        <div class="row">
            <div class="col-xs-6">
                <?= $form->field($model, 'rememberMe')->widget(AwesomeCheckbox::classname(),[
                    'type'=>AwesomeCheckbox::TYPE_CHECKBOX, //optional string default type TYPE_CHECKBOX
                    'style'=>[
                        AwesomeCheckbox::STYLE_INFO
                    ],
                ])->label(false) ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-6">
                <div class="form-group">
                <?= Html::submitButton(Yii::t('common','Sign In'), ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button','data' => [
                    'loading-text' => '<i class="fa fa-spinner fa-spin"></i> '.Yii::t('common','Sign In...'),  
                ]]) ?>
                </div>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>


    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->

        </div>

   </div>
</div>

<?php $this->beginBlock('js_end') ?>
    $('#<?= $form->id ?>').on('beforeSubmit', function(evt, messages, attribute) {
       var  submitBtn = $(':submit');
       submitBtn.button('loading');
       //submitBtn.text('登录中').prop('disabled', true);
   });
<?php $this->endBlock(); ?>
<?php $this->registerJs($this->blocks['js_end'],View::POS_READY) ?>