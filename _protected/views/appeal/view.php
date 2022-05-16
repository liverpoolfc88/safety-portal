<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Appeal */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Appeals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<style>

    .ochiq{
        background: red;
        border-radius: 25px;
        padding: 5px 10px;
        color: white !important;
    }
    .jarayonda{
        background: yellow;
        border-radius: 25px;
        padding: 5px 10px;
        /*color: white !important;*/
    }
    .yopiq{
        background: blue;
        border-radius: 25px;
        padding: 5px 10px;
        color: white !important;
    }
</style>
<?= Yii::$app->controller->renderPartial("//layouts/headeradmin") ?>
<div class="container">
    <div style="margin-top: 100px; padding: 10px" class="row">
        <div class="col-md-6">
            <? if ($model_a->status == 0): ?>
                <div style="background-color: white; padding: 10px; margin-bottom: 10px" class="measure-form">

                    <?php $form = ActiveForm::begin(['action' => '/measure/create?id=' . $model_a->id, 'method' => 'post']); ?>

                    <?= $form->field($model, 'measure_text')->textarea(['rows' => 6]) ?>

                    <!--                --><? //= $form->field($model, 'measure_file')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'measure_file')->fileInput(['style' => 'padding-top:34px', 'required'=>true])->label('') ?>

                    <!--            --><? //= $form->field($model, 'status')->textInput() ?>

                    <!--            --><? //= $form->field($model, 'user_id')->textInput() ?>

                    <!--                            --><? //= $form->field($model, 'appeal_id')->textInput() ?>

                    <!--            --><? //= $form->field($model, 'created_at')->textInput() ?>

                    <div style="margin-top: 20px" class="form-group">
                        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
                        <!--                    <button type="button" class="measure btn btn-success">Saqlash</button>-->
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            <? endif; ?>
            <div class="">
                <!-- F.A.Q List 1-->
                <div class="accordion accordion-flush" id="faqlist1">
                    <? foreach ($measure as $key => $m): ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-<?= $key + 1 ?>">
                                    <?= ($key + 1) . '. Xisobot tayyorlangan vaqt: ' . $m->created_at ?>
                                </button>
                            </h2>
                            <div id="faq-content-<?= $key + 1 ?>" class="accordion-collapse collapse"
                                 data-bs-parent="#faqlist1">
                                <div class="accordion-body">
                                    Izoh: <?= $m->measure_text ?>
                                    <? if ($m->measure_file): ?><a style="margin-left: 10px"
                                                                   href="/<?= $m->measure_file ?>" type="button"
                                                                   class="btn btn-primary ">file</a><? endif; ?>
                                </div>
                            </div>
                        </div>
                    <? endforeach; ?>

                </div>
            </div>


        </div>
        <div class="col-md-6">
            <div style="background-color: white; padding: 10px " class=" appeal-view">

                <h1><?= Html::encode($this->title) ?></h1>

                <p>
                    <!--                --><? //= Html::a('Update', ['update', 'id' => $model_a->id], ['class' => 'btn btn-primary']) ?>
                    <!--                    --><? //= (Yii::$app->user->identity->role == 'admin') ? Html::a('Delete', ['delete', 'id' => $model_a->id], [
                    //                        'class' => 'btn btn-danger',
                    //                        'data' => [
                    //                            'confirm' => 'Are you sure you want to delete this item?',
                    //                            'method' => 'post',
                    //                        ],
                    //                    ]) : '' ?>
                </p>

                <?= DetailView::widget([
                    'model' => $model_a,
                    'attributes' => [
                        'id',
//                    'departments_id',
                        [
                            'attribute' => 'departments_id',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return ($data->departments_id) ? $data->dep->department_name : '<i>Kiritilmagan</i>';
                            }
                        ],
                        [
                            'attribute' => 'tbl_number',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return ($data->tbl_number) ? $data->tbl_number : '<i>Kiritilmagan</i>';
                            }
                        ],
//                    'tbl_number',
                        'address',

                        [
                            'attribute' => 'status',
                            'format' => 'raw',
                            'value' => function($data){
                                return ($data->status == 0)? '<span class="ochiq">ochiq</span>':(($data->status == 1) ? '<span class="jarayonda">jarayonda</span>' : '<span class="yopiq">yopiq</span>');
                            }
                        ],
//                    'branch',
                        'appeal_text',
                        'appeal_date',
//                    'section',
                        [
                            'attribute' => 'section',
                            'value' => function ($data) {
                                return ($data->section == 1) ? 'Ish joyidagi xavfsizlik' : 'mahsulot xavfsizligi';
                            }
                        ]
                    ],
                ]) ?>
                <p class="navbar">Murojaat holati:
                    <?= ($model_a->status == 0) ? '<a class="getstarted">Ochiq</a>' : (($model_a->status == 1)? '<a class="getstarted">Jarayonda</a>':'<a class="getstarted">Yopiq</a>') ?>
                </p>
                <? if ((Yii::$app->user->identity->role == 'admin') && ($model_a->status == 1)): ?>
                    <button class="status btn btn-success">Statusni yopish</button>
                <? endif; ?>
                <? if ((Yii::$app->user->identity->role == 'admin') && ($model_a->status == 1)): ?>
                    <button class="rejection  btn btn-success">Hisobotni rad etish</button>
                <? endif; ?>
            </div>
        </div>
    </div>
</div>
<script src="/themes/jquery/jquery.min.js"></script>
<script>
    $(function () {
        var appeal_id = <?=$model_a->id?>;

        // var text = 'sasasa';

        // $('.measure').click(function () {
        //     var text = $('#measure-measure_text').val();
        //     var file = $('#measure-measure_file').val();
        // alert(file);
        // $.get("/measure/mcreate", {appeal_id: appeal_id}, function (res) {
        // alert(text);
        // });
        // });
        $('.rejection').click(function (){
            $.get("/appeal/rejection", { appeal_id: appeal_id}, function (res) {
                if (res =='success'){
                    alert('Rad etildi.');
                    location.reload();
                }
                if (res =='eroor'){
                    alert('Damini ol!');
                    // location.reload();
                }

            });
        })
        $('.status').click(function () {
            $.get("/appeal/status", {appeal_id: appeal_id}, function (res) {
                if (res =='success'){
                    alert('Status yopildi.');
                    location.reload();
                }
                if (res =='eroor'){
                    alert('Damini ol!');
                    // location.reload();
                }

            })

        })

    });
</script>