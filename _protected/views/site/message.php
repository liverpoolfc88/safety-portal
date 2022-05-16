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
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
<!--                <h2>Portfolio</h2>-->
                <p style="color: white">Yozma murojaat uchun manzillar</p>
            </header>



            <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-12 col-md-12 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img style="text-align: center; width: 100%" src="/themes/message_location.png" class="img-fluid" alt="">
                        <div class="portfolio-info">
<!--                            <h4>App 1</h4>-->
<!--                            <p>App</p>-->
                            <div class="portfolio-links">
                                <a href="/themes/message_location.png" data-gallery="portfolioGallery" class="portfokio-lightbox" title="App 1"><i class="bi bi-plus"></i></a>
<!--                                <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>-->
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section><!-- End Portfolio Section -->
</main>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
<script src="/themes/FlexStart/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/themes/FlexStart/assets/vendor/glightbox/js/glightbox.min.js"></script>

<script src="/themes/FlexStart/assets/js/main.js"></script>
