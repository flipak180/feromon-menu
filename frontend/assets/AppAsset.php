<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/design/css/bootstrap-reboot.min.css',
        '/design/slick/slick.css',
        '/design/slick/slick-theme.css',
        '/design/css/style.css',
    ];
    public $js = [
        '/design/slick/slick.min.js',
        '/design/js/script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap4\BootstrapAsset',
    ];
}
