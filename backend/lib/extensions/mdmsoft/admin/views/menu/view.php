<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use rmrevin\yii\fontawesome\FontAwesome;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\Menu */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('rbac-admin', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('rbac-admin', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
           [
                'attribute'=>'parent', 
                'format'=>'raw', 
                'value'=> $model->menuParent ? $model->menuParent->label : null,
                'displayOnly'=>true
            ],
            //'menuParent.label:text:Parent',
            'name',
            'label',
            ['attribute'=>'icon', 
              'format'=>'raw', 
              'value'=> FontAwesome::icon($model->icon),
              'displayOnly'=>true
            ],
            'route',
            'order',
            'description',
        ],
    ])
    ?>

</div>
