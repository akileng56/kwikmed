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
        'vendor/datatables/media/css/jquery.dataTables.min.css',
        'backend/datatables/css/buttons.dataTables.min.css',
        'backend/css/AdminLTE.min.css',
        'backend/css/_all-skins.min.css',
        'backend/css/custom.css',
        'plainwhite/css/bootstrap.min.css',
        'plainwhite/css/style-main.css',
        'plainwhite/css/megna.css',
        'plainwhite/css/qwikmed.css',
    ];
    public $js = [
        'plainwhite/js/tether.min.js',
        'plainwhite/js/popper.min.js',
        'plainwhite/js/bootstrap.min.js',
        'plainwhite/js/jquery.slimscroll.js',
        'plainwhite/js/waves.js',
        'plainwhite/js/sidebarmenu.js',
        'plainwhite/js/sticky-kit.min.js',
        'plainwhite/js/custom.min.js',
        'plainwhite/js/jQuery.style.switcher.js',
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}
