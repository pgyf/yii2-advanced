<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\themes\adminlte\assets\AppAsset;
use common\lib\helpers\App;

/* @var $this \yii\web\View */
/* @var $content string */
if(App::isGuest()){
    echo $this->render(
        'main-error',
        ['content' => $content]
    );
}
else if (Yii::$app->controller->action->id === 'login') { 
/**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {

    AppAsset::register($this);
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    
    $this->params['body-class'] = array_key_exists('body-class', $this->params) ?
        $this->params['body-class']
        : null;
 ?>
<?php $this->beginPage() ?><!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1 ,maximum-scale=1, user-scalable=no">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title).' - '.Yii::t('backend','Application Name') ?></title>
        <?php $this->head() ?>
    </head>
    <?php echo Html::beginTag('body', [
        'class' => implode(' ', [
            ArrayHelper::getValue($this->params, 'body-class'),
            Yii::$app->keyStorage->get('backend.theme-skin', 'skin-blue'),
            Yii::$app->keyStorage->get('backend.layout-fixed') ? 'fixed' : null,
            Yii::$app->keyStorage->get('backend.layout-boxed') ? 'layout-boxed' : null,
            Yii::$app->keyStorage->get('backend.layout-collapsed-sidebar') ? 'sidebar-collapse' : null,
            Yii::$app->keyStorage->get('backend.layout-sidebar-mini') ? 'sidebar-mini' : null,
        ])
    ])?>
<!--    <body class="hold-transition skin-blue sidebar-mini">-->
    <?php $this->beginBody() ?>
        <div class="wrapper">

            <?= $this->render(
                'header.php',
                ['directoryAsset' => $directoryAsset]
            ) ?>

            <?= $this->render(
                'left.php',
                ['directoryAsset' => $directoryAsset]
            )
            ?>

            <?= $this->render(
                'content.php',
                ['content' => $content, 'directoryAsset' => $directoryAsset]
            ) ?>

        </div>
    <?php $this->endBody() ?>
    <?php echo Html::endTag('body') ?>
<!--    </body>-->
    </html>
    <?php $this->endPage() ?>
<?php } ?>
