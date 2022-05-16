<?php
/* @var $this yii\web\View */

$this->title = Yii::t('app', Yii::$app->name);

use yii\helpers\Url;
use yii\helpers\Html;

?>

<main id="main">
    <i class="bi bi-list mobile-nav-toggle"></i>
    <?= Yii::$app->controller->renderPartial("//layouts/header") ?>
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <!--                <h2>Services</h2>-->
                <p style="color: white">Muommoni eskolatsiya qilish usullaridan birini tanlang !</p>
            </header>

            <div style="background-color: white" class="row gy-4">

                <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <a href="<?= Url::to(['/phone', 'section' => $section]) ?>">
                        <div class="service-box blue">
                            <i class=" ri-phone-fill icon"></i>
                            <h5>Telefon</h5>
                            <!--                        <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.</p>-->
                            <!--                        <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>-->
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <a href="<?= Url::to(['/appeal/create', 'section' => $section]) ?>">
                        <div class="service-box purple">
                            <i class=" ri-chrome-fill icon"></i>
                            <h5>Internet</h5>
                            <!--                        <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.</p>-->
                            <!--                        <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>-->
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="400">
                    <a href="https://mail.uzautomotors.com/" target="_blank">
                        <div class="service-box green">
                            <i class=" ri-mail-send-fill icon"></i>
                            <h5>Elektron pochta</h5>
                            <!--                        <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>-->
                            <!--                        <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>-->
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="500">
                    <a href="<?= Url::to(['/message']) ?>">
                        <div class="service-box pink">
                            <i class=" ri-message-2-fill icon"></i>
                            <h5>Yozma murojaat</h5>
                            <!--                        <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae ducimus enim.</p>-->
                            <!--                        <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>-->
                        </div>
                    </a>
                </div>

            </div>

        </div>

    </section><!-- End Services Section -->
</main>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

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