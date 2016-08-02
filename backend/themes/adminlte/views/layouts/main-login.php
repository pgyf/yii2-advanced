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

    <?php
    NavBar::begin([
        'brandLabel' => $applicationName,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
//    $menuItems = [
//        ['label' => 'Home', 'url' => ['/site/index']],
//    ];
    if (Yii::$app->user->isGuest) {
//        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    $menuItems[] = \common\messages\Trans::getLanguageNames();
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => $menuItems,
    ]);
    
//    echo \common\lib\widgets\LanguagePicker::widget([
//        'isAutoLabel' => true,
//        'skin' => \common\lib\widgets\LanguagePicker::SKIN_DROPDOWN,
//        'size' => \common\lib\widgets\LanguagePicker::SIZE_LARGE
//    ]);
    
    NavBar::end();
    ?>
    
    
<?php $this->beginBody() ?>

    <?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
