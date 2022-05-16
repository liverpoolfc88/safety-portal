<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>


<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="<?=Url::to('/site/index')?>" class="logo d-flex align-items-center">
            <img src="/themes/FlexStart/assets/img/logo.png" alt="">
            <span>Safety</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <? if (Yii::$app->user->identity->role == 'admin'):?>
                <li><a class="nav-link scrollto <?=(($this->context->route == 'users/index')) ? 'active' :''?>" href="<?=Url::to('/users/index')?>">Foydalanuvchilar</a></li>
                <?endif;?>
                <li><a class="nav-link scrollto <?=($this->context->route == 'appeal/index') ? 'active' :''?>" href="<?=Url::to('/appeal/index')?>">Murojaatlar</a></li>
                <li><a class="nav-link scrollto <?=($this->context->route == 'measure/index') ? 'active' :''?>" href="<?=Url::to('/measure/index')?>">Hisobotlar</a></li>
                <li><a class="nav-link scrollto <?=($this->context->route == 'departments/index') ? 'active' :''?>" href="<?=Url::to('/departments/index')?>">Bo`lim&Tsexlar</a></li>

<!--                <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>-->
<!--                    <ul>-->
<!--                        <li><a href="#">Drop Down 1</a></li>-->
<!--                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>-->
<!--                            <ul>-->
<!--                                <li><a href="#">Deep Drop Down 1</a></li>-->
<!--                                <li><a href="#">Deep Drop Down 2</a></li>-->
<!--                                <li><a href="#">Deep Drop Down 3</a></li>-->
<!--                                <li><a href="#">Deep Drop Down 4</a></li>-->
<!--                                <li><a href="#">Deep Drop Down 5</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li><a href="#">Drop Down 2</a></li>-->
<!--                        <li><a href="#">Drop Down 3</a></li>-->
<!--                        <li><a href="#">Drop Down 4</a></li>-->
<!--                    </ul>-->
<!--                </li>-->

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
<!-- ======= Header ======= -->
<!--<header id="header">-->
<!--    <div class="container d-flex">-->
<!---->
<!--        <div class="logo mr-auto">-->
<!--            <h1 class="text-light"><a href="--><?//=Url::home()?><!--"><span>MedDoc</span></a></h1>-->
<!--        </div>-->
<!---->
<!--        <nav class="nav-menu d-none d-lg-block">-->
<!--            <ul>-->
<!--                <li class="active"><a href="--><?//=Url::home()?><!--">Asosiy</a></li>-->
<!--                <li><a href="--><?//=Url::to(['/menu/index'])?><!--">Menu</a></li>-->
<!--                <li><a href="--><?//=Url::to(['/item/index'])?><!--">Maxsulotlar</a></li>-->
<!--                <li><a href="--><?//=Url::to(['/site-text/index'])?><!--">Saxifa so`zlari</a></li>-->
<!--                <li><a href="--><?//=Url::to(['/books/index'])?><!--">Kitoblar</a></li>-->
<!--                <li><a href="--><?//=Url::to(['/user/index'])?><!--">User</a></li>-->
<!--                --><?// if (!Yii::$app->user->isGuest) {?>
<!--                    <li > --><?//= Html::a('Chiqish', ['/site/logout'], ['data' => ['method' => 'post']]) ?><!--</li>-->
<!--                --><?//}?>
<!--            </ul>-->
<!--        </nav>-->
<!--    </div>-->
<!--</header>-->
<script src="/themes/FlexStart/assets/vendor/glightbox/js/glightbox.min.js"></script>
