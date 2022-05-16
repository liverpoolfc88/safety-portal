<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AppealSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appeal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'departments_id') ?>

    <?= $form->field($model, 'tbl_number') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'branch') ?>

    <?php // echo $form->field($model, 'appeal _text') ?>

    <?php // echo $form->field($model, 'appeal _date') ?>

    <?php // echo $form->field($model, 'section') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
