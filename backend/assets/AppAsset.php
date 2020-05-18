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
        'vendor/font-awesome/css/font-awesome.min.css',
        'vendor/animo.js/animate-animo.css',
        'vendor/whirl/dist/whirl.css',
        'vendor/datatables/media/css/jquery.dataTables.min.css',
        'backend/css/bootstrap.min.css',
        'backend/css/jquery-jvectormap.css',
        'backend/css/customstool.css',
        'backend/css/AdminLTE.min.css',
        'backend/css/_all-skins.min.css',
        'backend/css/ionicons.min.css',
        'backend/css/google_fonts.css',
        'backend/datatables/css/jquery.dataTables.min.css',
        'backend/datatables/css/buttons.dataTables.min.css',
        'backend/css/fontawesome.min.css'
    ];
    public $js = [
        //'vendor/jquery/dist/jquery.min.js',
        'vendor/datatables/media/js/jquery.dataTables.min.js',
        'backend/js/fastclick.js',
        'backend/js/adminlte.min.js',
        'backend/js/jquery.sparkline.min.js',
        'backend/js/jquery-jvectormap-1.2.2.min.js',
        'backend/js/jquery-jvectormap-world-mill-en.js',
        'backend/js/jquery.slimscroll.min.js',
        'backend/js/Chart.js',
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
        'yii\bootstrap\BootstrapPluginAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
