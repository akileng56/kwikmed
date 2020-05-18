<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web/html/frontendtheme';
    public $css = [
        'css/pe-icon-7-stroke.css',
        'css/style.css',
        'css/colors/default.css'
    ];
    public $js = [
        'js/jquery.sticky.js',
        'js/jquery.app.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}
