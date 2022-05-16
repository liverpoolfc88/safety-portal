<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Measure */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="measure-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'measure_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'measure_file')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'appeal_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
