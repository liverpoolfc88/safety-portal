<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Departments */

$this->title = 'Bo`lim&Tsex qo`shish';
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Yii::$app->controller->renderPartial("//layouts/headeradmin") ?>
<div class="container">
    <div style="background-color: white; margin-top: 100px; padding: 10px" class="departments-create">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
<!--<div class="departments-create">-->
<!---->
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    --><?//= $this->render('_form', [
//        'model' => $model,
//    ]) ?>
<!---->
<!--</div>-->
