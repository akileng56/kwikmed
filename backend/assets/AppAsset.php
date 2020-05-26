<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = "@web/../html/";
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

        'backend/js/select2.full.min.js',
        'backend/datatables/js/jquery.dataTables.min.js',
        'backend/datatables/js/dataTables.buttons.min.js',
        'backend/datatables/js/buttons.flash.min.js',
        'backend/datatables/js/jszip.min.js',
        'backend/datatables/js/pdfmake.min.js',
        'backend/datatables/js/vfs_fonts.js',
        'backend/datatables/js/buttons.html5.min.js',
        'backend/datatables/js/buttons.print.min.js',
        'backend/js/helptool.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];

}
