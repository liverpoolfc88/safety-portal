<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
$action = Yii::$app->controller->id;
$controlleraction = Yii::$app->controller->action->id;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="icon" type="image/png" sizes="32x32" href="/themes/logo.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/themes/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/themes/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!--    <meta property="og:type" content="website">-->
<!--    <meta property="og:site_name" content="Davronbek">-->
<!--    <meta property="og:title" content="Davronbek tavsiyalari, dori-darmonlar, tibbiyotga oid ma`lumotlar">-->
<!--    <meta property="og:description" content="Siz uchun qulay va arzon narxlarda.">-->
<!--    <meta property="og:url" content="https://davronbek.websar.uz">-->
<!--    <meta property="og:locale" content="ru_RU">-->
<!--    <meta property="og:image" content="http://davronbek.websar.uz/themes/assets/img/davronbek.jpg">-->
<!--    <meta property="og:image:width" content="968">-->
<!--    <meta property="og:image:height" content="504">-->
<!--    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,700' rel='stylesheet' type='text/css'>-->

    <?php $this->head() ?>
</head>
<style>
    .fon{
        background-color: aqua;
    }
    .index{
        background-image: url('/themes/img/chevrolet-onix-1.jpg')
    }
    .appeal{
        background-image: url('/themes/img/fon_safety.jpg'); background-repeat: no-repeat; background-size: cover;
    }
</style>
<? if ($controlleraction == 'login'){?>
<body class="index">
<? } elseif ($action == 'site' && $controlleraction=='index') { ?>
<body class="index" >
<? } elseif ($action == 'appeal') { ?>
<body class="index" >
<? } else { ?>
<body class="index" >
<?}?>
<?php $this->beginBody() ?>

    <div style="padding: 0" class="container-fluid">

        <?= $content ?>
    </div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
