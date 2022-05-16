<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Yii::$app->controller->renderPartial("//layouts/headeradmin") ?>
<div class="container">


    <div style="background-color: white; margin-top: 100px; padding: 10px" class="users-index">

<!--        <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

        <p>
            <?= Html::a('Foydalanuvchi qo`shish', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'fullname',
                'username',
                'phone',
                'tel',
                'email:email',
                //'section',
                //'shop_id',
                //'branch_id',
                //'can_modify',
                //'password',
                //'role',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '  {update}  {delete}',
                ],
            ],
        ]); ?>


    </div>
</div>
