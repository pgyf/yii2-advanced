<?php
use yii\helpers\Html;
use backend\themes\adminlte\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this \yii\web\View */
/* @var $content string */
$applicationName = Yii::t('backend','Application Name');
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1 ,maximum-scale=1, user-scalable=no">
    <?= Html::csrfMetaTags() ?>
    <title><?= $applicationName.' - '.Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="login-page">

<?php $this->beginBody() ?>

    <?= $content ?>

<?php $this->endBody() ?>
  <?php if(isset($this->blocks['block_footer'])){echo $this->blocks['block_footer'];} ?>
</body>
</html>
<?php $this->endPage() ?>
