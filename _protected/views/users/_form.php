<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class=" users-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'tbn')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
    </div>








<!--    --><?//= $form->field($model, 'role')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'section')->textInput() ?>

<!--    --><?//= $form->field($model, 'shop_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'branch_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'can_modify')->textInput() ?>

<!--    --><?//= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>



    <div style="padding-top: 10px" class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script src="/themes/jquery/jquery.min.js"></script>
<script>
    $(function () {
        $('#users-tbn').on('input',function(){
            $.get("/users/usercreate", {tbn: $(this).val() }, function (res) {

                if (res !=null){
                    $('#users-email').val(res.email);
                    $('#users-fullname').val(res.fuulname);
                    $('#users-username').val(res.username);
                    console.log(res);
                }
            })
            // alert('sasas');
        })


    })
</script>