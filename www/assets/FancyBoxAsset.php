<?php

namespace app\assets;

use yii\web\AssetBundle;

class FancyBoxAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'fancybox-3.0/dist/jquery.fancybox.css',
    ];
    public $js = [
        'fancybox-3.0/dist/jquery.fancybox.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}