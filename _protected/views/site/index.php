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
    <? if ($model) : ?>
        <section style="padding: unset" class="footer">
            <div class="container">
                <h3 style="margin-top: 5px; text-align: center"><i>Murojaatingiz yetkazildi!</i></h3>
            </div>
            <div class="footer-top">
                <div class="container">
                    <div class="row gy-4">
                        <div class="col-lg-5 col-md-12 footer-info">
                            <a class="logo d-flex align-items-center">
                                <i style="font-size: 30px; margin-right: 10px" class="bi bi-chat-left-dots"></i>
                                <span>Murojaat matni</span>
                            </a>
                            <p><?= $model->appeal_text ?></p>

                        </div>

                        <div class="col-lg-2 col-6 footer-links">
                            <h4>Manzil</h4>
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <a><?= $model->address ?></a></li>
                            </ul>
                        </div>

                        <div class="col-lg-2 col-6 footer-links">
                            <h4>Murojaat vaqti</h4>
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <a><?= $model->appeal_date ?></a></li>
                            </ul>
                        </div>
                        <div class="col-lg-2 col-6 footer-links">
                            <h4>Tabel raqami</h4>
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <a>TB:<?= $model->tbl_number ?></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container">
                <p><?= ($model->section == 1) ? 'Ish joyidagi xavfsizlik' : 'Mahsulot xavfsizligi' ?></p>
            </div>
        </section>
    <? endif; ?>
    <section class="pricing">

        <div class="container" data-aos="fade-up">


            <div class="row gy-4" data-aos="fade-left">

                <div class="col-lg-6 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="box">
                        <img style="padding: unset; height: 250px; width: 100%" src="/themes/img/workplace-safety.jpg"
                             class="img-fluid" alt="">
<!--                        <a style="margin-top: 20px" href="--><?//= Url::to(['/appeal/create', 'section' => 1]) ?><!--"-->
                        <a style="margin-top: 20px" href="<?= Url::to(['/appeal', 'section' => 1]) ?>"
                           class="btn-buy">Ish joyidagi xavfsizlik</a>
                    </div>
                </div>

                <!--                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">-->
                <!--                </div>-->
                <!---->
                <!--                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">-->
                <!--                </div>-->

                <div class="col-lg-6 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="box">
                        <img style="padding: unset; height: 250px; width: 100%" src="/themes/img/auto_safety.jpg"
                             class="img-fluid" alt="">
<!--                        <a style="margin-top: 20px" href="--><?//= Url::to(['/appeal/create', 'section' => 2]) ?><!--"-->
                        <a style="margin-top: 20px" href="<?= Url::to(['/appeal', 'section' => 2]) ?>"
                           class="btn-buy">Mahsulot xavfsizligi</a>
                    </div>
                </div>

            </div>

        </div>

    </section>
</main>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<!--<script src="/themes/FlexStart/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>-->
<!--<script src="/themes/FlexStart/assets/vendor/aos/aos.js"></script>-->
<!--<script src="/themes/FlexStart/assets/vendor/php-email-form/validate.js"></script>-->
<script src="/themes/FlexStart/assets/vendor/swiper/swiper-bundle.min.js"></script>
<!--<script src="/themes/FlexStart/assets/vendor/purecounter/purecounter.js"></script>-->
<!--<script src="/themes/FlexStart/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>-->
<script src="/themes/FlexStart/assets/vendor/glightbox/js/glightbox.min.js"></script>

<!-- Template Main JS File -->
<script src="/themes/FlexStart/assets/js/main.js"></script>

<!--<div class="btns" id="btns">-->
<!--    <a href="https://t.me/dorixonaVAdavolashDOKTOR" target="_blank" class="tg" ><img alt="Napa Telegram" src="/themes/telegram.svg" width="60"/></a>-->
<!--</div>-->
<!---->
<!--<script src="/themes/jquery/jquery.min.js"></script>-->

<!--<script>-->
<!--    $(function () {-->
<!---->
<!--            $("#but_upload").click(function(){-->
<!--                var fd = new FormData();-->
<!--                var files = $('#file')[0].files[0];-->
<!--                fd.append('file',files);-->
<!--                $.ajax({-->
<!--                    url: 'site/photo',-->
<!--                    type: 'post',-->
<!--                    data: fd,-->
<!--                    contentType: false,-->
<!--                    processData: false,-->
<!--                    success: function(response){-->
<!---->
<!--                        if(response != 0){-->
<!--                            $("#img").attr("src",response);-->
<!--                            $(".preview img").show(); // Display image element-->
<!--                        }else{-->
<!--                            alert('file not uploaded');-->
<!--                        }-->
<!--                    },-->
<!--                });-->
<!--                window.location.reload();-->
<!--            });-->
<!--        })-->
<!---->
<!--</script>-->