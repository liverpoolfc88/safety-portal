<?php
/* @var $this yii\web\View */

$this->title = Yii::t('app', Yii::$app->name);

use yii\helpers\Url; ?>


<main id="main">
    <i class="bi bi-list mobile-nav-toggle"></i>
    <section>
        <header class="section-header">
            <h2>GM Uzauto</h2>
            <p style="text-transform: uppercase; ">Safety yangi portali</p>
        </header>
        <div class="row">
            <div class="col-md-3">
                <div id="recent-blog-posts" class=" recent-blog-posts">
                    <div class="container-fluid" data-aos="fade-up">
                        <div style="text-align: center" class="post-box">
                            <div class="post-img"><img style="height: 100px" src="/themes/FlexStart/assets/img/blog/blog-1.jpg" class="img-fluid" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">

                <div id="testimonials" class="testimonials">

                    <div class="container" data-aos="fade-up">

                        <div  class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="200">
                            <div class="swiper-wrapper">



                                <div  class="swiper-slide">
                                            <img style="height: 150px; width: 280px" src="/themes/img/saf-2.jpg" class="testimonial-img" alt="">
                                </div>
                                <div  class="swiper-slide">
                                            <img style="height: 150px; width: 280px" src="/themes/img/saf-1.jpg" class="testimonial-img" alt="">
                                </div>
                                <div  class="swiper-slide">
                                            <img style="height: 150px; width: 280px" src="/themes/img/saf-3.jpg" class="testimonial-img" alt="">
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
                        <div style="text-align: center" class="post-box">
                            <div class="post-img"><img style="height: 100px" src="/themes/FlexStart/assets/img/blog/blog-1.jpg" class="img-fluid" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>


    <section class="pricing">

        <div class="container" data-aos="fade-up">


            <div class="row gy-4" data-aos="fade-left">

                <div class="col-lg-6 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="box">
                        <img style="padding: unset; height: 250px; width: 100%" src="/themes/img/workplace-safety.jpg" class="img-fluid" alt="">
                        <a style="margin-top: 20px" href="#" class="btn-buy">Ish joyidagi xavfsizlik</a>
                    </div>
                </div>

<!--                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">-->
<!--                </div>-->
<!---->
<!--                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">-->
<!--                </div>-->

                <div class="col-lg-6 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="box">
                        <img style="padding: unset; height: 250px; width: 100%" src="/themes/img/auto_safety.jpg" class="img-fluid" alt="">
                        <a style="margin-top: 20px" href="#" class="btn-buy">Mahsulot xavfsizligi</a>
                    </div>
                </div>

            </div>

        </div>

    </section>
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