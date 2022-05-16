<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Appeal */

$this->title = 'Create Appeal';
$this->params['breadcrumbs'][] = ['label' => 'Appeals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Yii::$app->controller->renderPartial("//layouts/header") ?>

<div class="appeal-create">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
