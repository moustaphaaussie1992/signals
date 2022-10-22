<?php

namespace app\assets;

use yii\web\AssetBundle;

class RegisterAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'sash/assets/css/style.css',
        'sash/assets/css/dark-style.css',
        'sash/assets/css/transparent-style.css',
        'sash/assets/css/skin-modes.css',
        'sash/assets/css/icons.css',
        'sash/assets/colors/color1.css', // check later
    ];
    public $js = [
//        'sash/assets/js/jquery.min.js',
        'sash/assets/plugins/bootstrap/js/popper.min.js',
        'sash/assets/plugins/bootstrap/js/bootstrap.min.js',
        'sash/assets/js/show-password.min.js',
        'sash/assets//js/generate-otp.js',
        'sash/assets/js/themeColors.js',
        'sash/assets/js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];

}
