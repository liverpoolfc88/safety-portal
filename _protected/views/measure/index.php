<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MeasureSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hisobotlar ';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Yii::$app->controller->renderPartial("//layouts/headeradmin") ?>

<style>
    .short {
        text-overflow: ellipsis;
        white-space: nowrap;
        width: 150px;
        overflow: hidden;
        /*color: #2a9fd6;*/
    }
</style>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
<div class="container">
    <div style="background-color: white; margin-top: 100px; padding: 10px" class="measure-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <!--        --><? //= Html::a('Create Measure', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => '{items}{pager}',
//        'options' => ['class' => 'color:white'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
//                'appeal_id',

                [
                    'attribute' => 'appeal_id',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return '<div class="short" data-bs-toggle="modal" data-bs-target="#modal' . $data->appeal->id . '"><a href="#">' . $data->appeal->appeal_text . '</a></div>
                                <div class="modal fade" id="modal' . $data->appeal->id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Murojaat matni</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ' . $data->appeal->appeal_text . '
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>';
                    }
                ],
                'measure_text:ntext',
                [
                    'attribute' => 'measure_file',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return '<a class="btn btn-success" href="/'.$data->measure_file.'">file</a>';
                    }
                ],
//                'measure_file',
//                'status',

                [
                    'attribute' => 'created_at',
                    'value' => 'created_at',
                    'header' => 'Hisobot qo`shilgan sana',
                    'filter' => DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'created_at',
                        'language' => 'ru',
                        'size' => 'ms',
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                            'clearBtn' => true
                        ]
                    ]),
                ],
//                'created_at',


                [
                    'attribute' => 'fullname',
//                    'header' => 'Vinno',
                    'value' => 'user.fullname',
                ],
//                'user_id',

//            ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>