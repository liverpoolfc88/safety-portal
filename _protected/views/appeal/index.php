<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AppealSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Murojaatlar';
$this->params['breadcrumbs'][] = $this->title;

?>
<style>
    .short {
        text-overflow: ellipsis;
        white-space: nowrap;
        width: 150px;
        overflow: hidden;
    }
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

<!--    <script src="/themes/jquery/jquery.min.js"></script>-->
<!--    <script src="/themes/FlexStart/assets/js/main.js"></script>-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->


    <div class="container">
        <div style="background-color: white; margin-top: 100px; padding: 10px" class="appeal-index">

            <h1><?= Html::encode($this->title) ?></h1>

            <!--    <p>-->
            <!--        --><? //= Html::a('Create Appeal', ['create'], ['class' => 'btn btn-success']) ?>
            <!--    </p>-->

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'layout' => '{items}{pager}',
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

            'id',
                    'address',
//            'appeal_text:ntext',

//                    [
//                        'attribute' => 'appeal_text',
//                        'format' => 'raw',
//                        'value' => function ($data) {
//                            return Html::a(' <div class="short">' . $data->appeal_text . '</div>', [Yii::$app->controller->id . 'textview', 'id' => $data->id], ['class' => ' s_modal']);
//                        }
//                    ],

                    [
                        'attribute' => 'appeal_text',
                        'format' => 'raw',
//                        'value' => 'appeal_text',
                        'value' => function($model){
                            return  '<div class="short" data-bs-toggle="modal" data-bs-target="#modal'.$model->id.'"><a href="#">'.$model->appeal_text.'</a></div>
                                <div class="modal fade" id="modal'.$model->id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Murojaat matni</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                '.$model->appeal_text.'
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>';
                        },

//                'headerOptions' => ['style' => ' width:150px; text-align: center;vertical-align: middle;'],
//                'contentOptions'=>['style'=>'white-space: break-spaces; vertical-align: middle;'],
                    ],

                    'appeal_date',
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
//            'departments_id',
//            'tbl_number',
//            'branch',
//                'status',
                    [
                         'attribute' => 'status',
                        'format' => 'raw',
                        'value' => function($data){
                            return ($data->status == 0)? '<span class="ochiq">ochiq</span>':(($data->status == 1) ? '<span class="jarayonda">jarayonda</span>' : '<span class="yopiq">yopiq</span>');
                        }
                    ],

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view}  {update}  {delete}',

                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('', $url,
                                    [
                                        'title' => Yii::t('app', 'Кўриш'),
                                        'class' => 'ri-pencil-line'
                                    ]);
                            },
                            'update' => function ($url, $model) {
                                return Html::a('', $url,
                                    [
                                        'title' => Yii::t('app', 'Тахрирлаш'),
                                        'class' => ''
                                    ]);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a('', ['delete', 'id' => $model->id], [
                                    'class' => 'fas fa-cut',
                                    'data' => [
                                        'confirm' => 'Ўчириб юборилсинми?',
                                        'method' => 'post',
                                    ],
                                ]);
                            },

                        ],
                        'urlCreator' => function ($action, $model, $key, $index) {
                            if ($action === 'view') {
                                return Url::to(['view', 'id' => $model->id]);
                            }
                            if ($action === 'update') {
                                return Url::to(['update', 'id' => $model->id]);
                            }

                        }


                    ],
                ],
            ]); ?>


        </div>
    </div>
<!--    <script src="/themes/jquery/jquery.min.js"></script>-->
<!--    <script src="/themes/FlexStart/assets/js/main.js"></script>-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<!---->
<!--    <script>-->
<!--        $(".s_modal").click(function (e) {-->
<!--            // alert('sasas');-->
<!--            e.preventDefault();-->
<!--            $("#modal").modal('show')-->
<!--                .find('#modalContent')-->
<!--                .load($(this).attr("href"));-->
<!---->
<!--        });-->
<!--    </script>-->
<!---->
<?//
//Modal::begin([
////    'header' => 'Тўлов мақсади',
//    'id' => 'modal',
//]);
//?>