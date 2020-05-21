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
    public $baseUrl = '@web/html';
    public $css = [
        'plainwhite/css/bootstrap.min.css',
        'plainwhite/css/style.css',
        'plainwhite/css/megna.css',
        'plainwhite/css/qwikmed.css',
    ];
    public $js = [
        'plainwhite/js/jquery.min.js',
        'plainwhite/js/tether.min.js',
        'plainwhite/js/bootstrap.min.js',
        'plainwhite/js/jquery.slimscroll.js',
        'plainwhite/js/waves.js',
        'plainwhite/js/sidebarmenu.js',
        'plainwhite/js/sticky-kit.min.js',
        'plainwhite/js/custom.min.js',
        'plainwhite/js/jquery.flot.js',
        'plainwhite/js/jquery.flot.tooltip.min.js',
        'plainwhite/js/flot-data.js',
        'plainwhite/js/jQuery.style.switcher.js',
    ];
    public $depends = [

    ];
}
