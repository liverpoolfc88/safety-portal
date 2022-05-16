<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
use Yii;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @author Nenad Zivkovic <nenad@freetuts.org>
 * 
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@themes';

    public $css = [

        "/themes/FlexStart/assets/vendor/bootstrap/css/bootstrap.min.css",
        "/themes/FlexStart/assets/vendor/bootstrap-icons/bootstrap-icons.css",
        "/themes/FlexStart/assets/vendor/aos/aos.css",
        "/themes/FlexStart/assets/vendor/remixicon/remixicon.css",
        "/themes/FlexStart/assets/vendor/swiper/swiper-bundle.min.css",
        "/themes/FlexStart/assets/vendor/glightbox/css/glightbox.min.css",
        "/themes/FlexStart/assets/css/style.css",
        '/themes/tg_call.css',
//        'css/bootstrap.min.css',
//        'css/style.css',
    ];

    public $js = [

        "/themes/FlexStart/assets/vendor/bootstrap/js/bootstrap.bundle.js",
        "/themes/FlexStart/assets/vendor/aos/aos.js",
        "/themes/FlexStart/assets/vendor/php-email-form/validate.js",
        "/themes/FlexStart/assets/vendor/swiper/swiper-bundle.min.js",
        "/themes/FlexStart/assets/vendor/purecounter/purecounter.js",
        "/themes/FlexStart/assets/vendor/isotope-layout/isotope.pkgd.min.js",
//        "/themes/FlexStart/assets/vendor/glightbox/js/glightbox.min.js",
        "/themes/FlexStart/assets/js/main.js"


    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}
