<?php
/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
$this->title = Yii::t('backend', 'Settings');
$this->params['breadcrumbs'][] = $this->title;
$this->params['navActive'] = '/site/settings';
?>
<div class="box">
    <div class="box-body">
        <?php echo \common\lib\components\keyStorage\FormWidget::widget([
            'model' => $model,
            'formClass' => '\yii\bootstrap\ActiveForm',
            'submitText' => Yii::t('backend', 'Save'),
            'submitOptions' => ['class' => 'btn btn-primary']
        ]); ?>
</div>
</div>