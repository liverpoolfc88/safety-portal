<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Departments;

/* @var $this yii\web\View */
/* @var $model app\models\Appeal */
/* @var $form yii\widgets\ActiveForm */
?>

<section class="container">
    <div style="padding: 20px" class="appeal-form card">

        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-4">
<!--                --><?//= $form->field($model, 'departments_id')->textInput() ?>
<!--                    <select>sasas</select>-->

                <?= $form->field($model, 'departments_id')
                    ->dropDownList(ArrayHelper::map(Departments::find()->all(), 'id', 'department_name'),['prompt'=>'Танланг', 'style'=>'appearance: auto'])
                ->label('Bo`lim & Tsexni tanlang')
                ?>
                <div><i style="color: red">Tanlash majburiy emas </i> </div>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'tbl_number')->textInput()->label('Tabel raqam') ?>
                <div><i style="color: red">To`ldirish shart emas</i> </div>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'address')->textInput(['maxlength' => true])->label('Muommo aniqlangan manzil.') ?>
                <div><i style="color: red">To`ldirish shart !!!</i> </div>
            </div>
        </div>







<!--        --><?//= $form->field($model, 'branch')->textInput() ?>
<!---->
<!--        --><?//= $form->field($model, 'section')->textInput() ?>

        <?= $form->field($model, 'appeal_text')->textarea(['rows' => 6])->label('Murojaat matni') ?>


        <!--        --><?//= $form->field($model, 'appeal_date')->textInput() ?>


        <div style="padding-top: 20px" class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</section>

