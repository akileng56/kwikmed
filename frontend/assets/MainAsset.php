<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 *
 * 'app/css/app.css',
 */
class MainAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = "@web/html";
    public $css = [
        'app/css/bootstrap.min.css',
        'app/css/font-awesome.min.css',
        'app/css/cubeportfolio.min.css',
        'app/css/nivo-lightbox.css',
        'app/css/nivo-lightbox-theme/default/default.css',
        'app/css/owl.carousel.css',
        'app/css/owl.theme.css',
        'app/css/animate.css',
        'app/css/style.css',
        'app/css/bg1.css',
        'app/css/color/default.css',
        'app/css/custom.css'
    ];
    public $js = [
        'app/js/jquery.min.js',
        'app/js/bootstrap.min.js',
        'app/js/jquery.easing.min.js',
        'app/js/wow.min.js',
        'app/js/jquery.scrollTo.js',
        'app/js/jquery.appear.js',
        'app/js/stellar.js',
        'app/js/jquery.cubeportfolio.min.js',
        'app/js/owl.carousel.min.js',
        'app/js/nivo-lightbox.min.js',
        'app/js/custom.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
