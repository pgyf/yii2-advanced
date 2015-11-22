<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mdm\admin\models\Menu;
use yii\helpers\Json;
use mdm\admin\AutocompleteAsset;
use common\lib\widgets\Iconpicker;
use common\messages\Trans;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\Menu */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => 256]) ?>
    
    <?= $form->field($model, 'icon')->widget(Iconpicker::className(),[
        'rows'=> 6,
        'columns'=> 8,
        'removePrefix' => true,
        'pickerOptions' => ['data-search-text' => Trans::tLabel('Search Icon'),],
     ]); ?>
    
    <?= $form->field($model, 'description')->textInput(['maxlength' => 128]) ?>
    
    <?= $form->field($model, 'parent_name')->textInput(['id'=>'parent_name']) ?>

    <?= $form->field($model, 'route')->textInput(['id'=>'route']) ?>

    <?= $form->field($model, 'order')->input('number') ?>

    <?= $form->field($model, 'data')->textarea(['rows' => 4]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('rbac-admin', 'Create') : Yii::t('rbac-admin', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
AutocompleteAsset::register($this);

$options1 = Json::htmlEncode([
    'source' => Menu::find()->select(['name'])->column()
]);
$this->registerJs("$('#parent_name').autocomplete($options1);");

$options2 = Json::htmlEncode([
    'source' => Menu::getSavedRoutes()
]);
$this->registerJs("$('#route').autocomplete($options2);");
