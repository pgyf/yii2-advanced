<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mdm\admin\models\Menu;
use yii\helpers\Json;
use mdm\admin\AutocompleteAsset;
use common\lib\widgets\Iconpicker;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\Menu */
/* @var $form yii\widgets\ActiveForm */
AutocompleteAsset::register($this);
$opts = Json::htmlEncode([
        'menus' => Menu::getMenuSource(),
        'routes' => Menu::getSavedRoutes(),
    ]);
$this->registerJs("var _opts = $opts;");
$this->registerJs($this->render('_script.js'));
?>

<div class="menu-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= Html::activeHiddenInput($model, 'parent', ['id' => 'parent_id']); ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'parent_name')->textInput(['id' => 'parent_name']) ?>
            
            <?= $form->field($model, 'name')->textInput(['maxlength' => 128]) ?>

            <?= $form->field($model, 'label')->textInput(['maxlength' => 128]) ?>

            <?= $form->field($model, 'route')->textInput(['id' => 'route']) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'icon')->widget(Iconpicker::className(),[
                'rows'=>6,
                'columns'=>8,
                'removePrefix' => true,
                'iconset' => 'fontawesome',
                'pickerOptions' => ['data-search-text' => Yii::t('backend','Search Icon'),],
            ]); ?>
            
            <?= $form->field($model, 'order')->widget(\yii\widgets\MaskedInput::className(),
                [
                    'type' => 'number',
                    //'mask' => '0-9999999999',
                    'clientOptions' => [
                        'alias' => 'integer',
                        'numericInput' => true,
                        'rightAlign' => false,
                        //'allowMinus' => true,
                        //'allowPlus' => true,
                    ],
                ]
            ); ?>

            <?= $form->field($model, 'description')->textInput(['maxlength' => 128]) ?>
            
            <?= $form->field($model, 'data')->textarea(['rows' => 4]) ?>
        </div>
    </div>

    <div class="form-group">
        <?=
        Html::submitButton($model->isNewRecord ? Yii::t('rbac-admin', 'Create') : Yii::t('rbac-admin', 'Update'), ['class' => $model->isNewRecord
                    ? 'btn btn-success' : 'btn btn-primary'])
        ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
