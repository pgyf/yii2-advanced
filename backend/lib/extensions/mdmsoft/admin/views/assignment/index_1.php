<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\searchs\Assignment */
/* @var $usernameField string */
/* @var $extraColumns string[] */

$this->title = Yii::t('rbac-admin', 'Assignments');
$this->params['navActive'] = '/admin/assignment';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success">
    <div class="box-header">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        <div class="box-tools">
                <ul class="pagination pagination-sm no-margin pull-right">
                  <li><a href="#">«</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">»</a></li>
                </ul>
        </div>
    </div>
<!--    <div class="box-body table-responsive no-padding">-->
	<?php
    Pjax::begin([
        'enablePushState'=>false,
    ]);
    $columns = array_merge(
        [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => $usernameField,
                'sortLinkOptions' => [],
//                /'filterInputOptions' => ['class' => 'form-control','style' => 'width:180px;'],
            ],
        ],
        $extraColumns,
        [
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view}'
            ],
        ]
    );
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
        'options' => ['class' => 'box-body table-responsive no-padding'],
        'tableOptions' => ['class' => 'table table-hover table-striped table-bordered'], //table-striped table-bordered
        //'layout' => "{summary}\n{items}\n{pager}",
        //'filterPosition' => GridView::FILTER_POS_HEADER,
    ]);
    Pjax::end();
    ?>
<!--    </div>-->
    <div class="box-footer">
        <div class="box-tools">
                <ul class="pagination pagination-sm no-margin pull-right">
                  <li><a href="#">«</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">»</a></li>
                </ul>
        </div>
    </div>
</div>
