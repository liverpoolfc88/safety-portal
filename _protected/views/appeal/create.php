<?php
/* @var $this yii\web\View */

$this->title = 'Murojaat yo`llash';

use yii\helpers\Url;
use yii\helpers\Html;

?>

<main id="main">
    <i class="bi bi-list mobile-nav-toggle"></i>
    <?= Yii::$app->controller->renderPartial("//layouts/header") ?>

    <div class="appeal-create">

        <!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</main>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
