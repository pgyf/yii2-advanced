<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\searchs\Assignment */
/* @var $usernameField string */
/* @var $extraColumns string[] */

$this->title = Html::encode(Yii::t('rbac-admin', 'Assignments'));
$this->params['navActive'] = '/admin/assignment';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--                <ul class="pagination pagination-sm no-margin pull-right">
                  <li><a href="#">«</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">»</a></li>
                </ul>-->
<?php
$gridHeader = <<<EOT
<div class="box box-success">
    <div class="box-header with-border">
        <div>
            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
            </div>
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
        
            {summary}\n{pager}\n
        </div>
      
    </div> 

    <div class="box-body table-responsive no-padding" style="overflow: auto">

EOT;
$gridFooter = <<<EOT
    </div>
    <div class="box-footer">
        <div class="box-tools">
        \n{pager}\n
        </div>
    </div>
</div>
EOT;
?>
        
<!--        <div class="box-tools">
                <ul class="pagination pagination-sm no-margin pull-right">
                  <li><a href="#">«</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">»</a></li>
                </ul>
        </div>-->
    
<!--    <div class="box-body table-responsive no-padding">-->
	<?php
    Pjax::begin([
        'enablePushState'=>false,
    ]);
    $columns = array_merge(
        [
            [   
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => $usernameField,
                //'sortLinkOptions' => ['class' => 'fa fa-sort'],
                //'headerOptions' => ['class' => 'text-center'],
                //'filterInputOptions' => ['class' => 'form-control','style' => 'width:180px;'],
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
        //'options' => ['class' => 'box-body table-responsive no-padding'],
        'tableOptions' => ['class' => 'table table-hover table-striped table-bordered'], //table-striped table-bordered
        'summaryOptions' => ['style' => 'display: inline-block;margin-left:5px;vertical-align: middle;'],
        //'caption' => $this->title,
        'layout' => $gridHeader."\n{items}\n".$gridFooter,
        //'filterPosition' => GridView::FILTER_POS_HEADER,
        'pager' => [
            'options' => ['class' => 'pagination pagination-sm no-margin pull-right']
        ],
    ]);
    Pjax::end();
    ?>
<!--    </div>-->


