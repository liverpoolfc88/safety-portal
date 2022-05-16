<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = 'Foydalanuvchini o`zgartirish: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?= Yii::$app->controller->renderPartial("//layouts/headeradmin") ?>
<div class="container">
    <div style="background-color: white; margin-top: 100px; padding: 10px" class="users-update">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>

<!---->
<!--<div class="users-update">-->
<!---->
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    --><?//= $this->render('_form', [
//        'model' => $model,
//    ]) ?>
<!---->
<!--</div>-->
