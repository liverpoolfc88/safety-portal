<?php

use yii\helpers\Url;
use app\models\Menu;
use yii\helpers\Html;

//$menu = Menu::find()->all();

$controlleraction = Yii::$app->controller->action->id;
$action = Yii::$app->controller->id;
?>

<style>
    #login {
        font-size: 50px;
        margin-left: 100px;
        color: #012970;
    }

    #login:hover {
        color: antiquewhite;
    }
</style>

<section style="padding: 30px 0px">
    <header class="section-header">
        <h2>GM Uzauto <i> <?= (!Yii::$app->user->isGuest) ? Yii::$app->user->identity->fullname : '' ?></i></h2>
        <div>
            <p style="text-transform: uppercase; ">
               <a style="color: #012970;" href="<?=Url::to('/site/index')?>" >Safety yangi portali</a>
                <? if (Yii::$app->user->isGuest): ?>
                    <a href="<?= Url::to(['/login']) ?>">
                        <i id="login" class="bi bi-box-arrow-in-right"></i>
                    </a>
                <? endif; ?>
                <? if (!Yii::$app->user->isGuest): ?>
                    <!--                        --><? //= Html::a('sasa', ['/site/logout'], ['data' => ['method' => 'post']]) ?>
                    <a href="<?= Url::to(['/site/logout', 'method' => 'post']) ?>" data-method="post">
                        <i id="login" class="bi bi-box-arrow-in-left"></i>
                    </a>
                <? endif; ?>
            </p>
        </div>
    </header>
    <div class="row">
        <div class="col-md-3">
            <div id="recent-blog-posts" class=" recent-blog-posts">
                <div class="container-fluid" data-aos="fade-up">
                    <a href="<?=Url::to('/appeal/index')?>">
                        <div style="text-align: center" class="post-box">
                            <div class="post-img"><img style="height: 100px" src="/themes/img/motors-logo.jpg"
                                                       class="img-fluid" alt=""></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6">

            <div id="testimonials" class="testimonials">

                <div class="container" data-aos="fade-up">

                    <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="200">
                        <div class="swiper-wrapper">


                            <div class="swiper-slide">
                                <img style="height: 150px; width: 280px" src="/themes/img/saf-2.jpg"
                                     class="testimonial-img" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img style="height: 150px; width: 280px" src="/themes/img/saf-1.jpg"
                                     class="testimonial-img" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img style="height: 150px; width: 280px" src="/themes/img/saf-3.jpg"
                                     class="testimonial-img" alt="">
                            </div>

                        </div>
                        <!--                            <div class="swiper-pagination"></div>-->
                    </div>

                </div>

            </div>

        </div>
        <div class="col-md-3">
            <div id="recent-blog-posts" class=" recent-blog-posts">
                <div class="container-fluid" data-aos="fade-up">
                    <a href="http://safety.uzautomotors.com/" target="_blank">
                        <div style="text-align: center" class="post-box">
                            <div class="post-img"><img style="height: 100px" src="/themes/img/safety-logo.jpg"
                                                       class="img-fluid" alt=""></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Vendor JS Files -->
<!--<script src="/themes/FlexStart/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>-->
<!--<script src="/themes/FlexStart/assets/vendor/aos/aos.js"></script>-->
<!--<script src="/themes/FlexStart/assets/vendor/php-email-form/validate.js"></script>-->
<!--<script src="/themes/FlexStart/assets/vendor/swiper/swiper-bundle.min.js"></script>-->
<!--<script src="/themes/FlexStart/assets/vendor/purecounter/purecounter.js"></script>-->
<!--<script src="/themes/FlexStart/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>-->
<script src="/themes/FlexStart/assets/vendor/glightbox/js/glightbox.min.js"></script>

<!-- Template Main JS File -->
<script src="/themes/FlexStart/assets/js/main.js"></script>
