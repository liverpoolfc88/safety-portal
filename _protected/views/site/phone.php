<?php
/* @var $this yii\web\View */

$this->title = Yii::t('app', Yii::$app->name);

use yii\helpers\Url;
use yii\helpers\Html;

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

<main id="main">
    <i class="bi bi-list mobile-nav-toggle"></i>
    <?= Yii::$app->controller->renderPartial("//layouts/header") ?>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

        <div class="container" data-aos="fade-up">

            <header class="section-header">

                <p style="color: white">Aloqa</p>
            </header>

            <div class="row gy-4">

                <div class="col-lg-12">

                    <div class="row gy-4">
<!--                        <div class="col-md-6">-->
<!--                            <div class="info-box">-->
<!--                                <i class="bi bi-geo-alt"></i>-->
<!--                                <h3>Address</h3>-->
<!--                                <p>A108 Adam Street,<br>New York, NY 535022</p>-->
<!--                            </div>-->
<!---->
<!--                        </div>-->
                        <? foreach ($users as $key=>$u):?>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i><b>IChki: </b></i> <i class="bi bi-telephone"> <?=$u->phone?> </i><br>
                                <hr>
                                <i><b> Shaxsiy: </b></i><i class="bi bi-telephone">  <?=$u->tel?></i>
                                <h3><?=$u->fullname?></h3>

<!--                                <p>+1 5589 55488 55<br></p>-->
                            </div>
                        </div>
                        <? endforeach;?>
<!--                        <div class="col-md-6">-->
<!--                            <div class="info-box">-->
<!--                                <i class="bi bi-envelope"></i>-->
<!--                                <h3>Email Us</h3>-->
<!--                                <p>info@example.com<br>contact@example.com</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-md-6">-->
<!--                            <div class="info-box">-->
<!--                                <i class="bi bi-clock"></i>-->
<!--                                <h3>Open Hours</h3>-->
<!--                                <p>Monday - Friday<br>9:00AM - 05:00PM</p>-->
<!--                            </div>-->
<!--                        </div>-->
                    </div>

                </div>



            </div>

        </div>

    </section><!-- End Contact Section -->


</main>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

<script src="/themes/FlexStart/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/themes/FlexStart/assets/vendor/glightbox/js/glightbox.min.js"></script>

<script src="/themes/FlexStart/assets/js/main.js"></script>
