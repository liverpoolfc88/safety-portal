<?php

use yii\helpers\Url; ?>
<?= Yii::$app->controller->renderPartial("//layouts/header") ?>
<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 100%;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    .container {
        padding: 2px 16px;
    }
</style>
<section>
    <div class="container">
        <h2>Online o`qish <a class="btn btn-primary" style="text-decoration: none; font-size: 20px" href="<?=Url::to(['/site/book'])?>">Kitoblar ro'yxati</a></h2>

        <div class="card">
            <div style="padding: 20px" class="container">
                <h4><b><?=$model->name?></b></h4>
                <p><?=$model->text?></p>
            </div>
        </div>
    </div>
</section>
