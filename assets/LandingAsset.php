<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class LandingAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'sash/assets/plugins/bootstrap/css/bootstrap.min.css', // check later
        'sash/assets/css/style.css',
        'sash/assets/css/dark-style.css',
        'sash/assets/css/icons.css',
        'sash/assets/colors/color1.css',
    ];
    public $js = [
//        'sash/assets/js/jquery.min.js',
        'sash/assets/plugins/bootstrap/js/popper.min.js',
        'sash/assets/plugins/bootstrap/js/bootstrap.min.js',
        'sash/assets/plugins/counters/counterup.min.js',
        'sash/assets/plugins/counters/waypoints.min.js',
        'sash/assets/plugins/counters/counters-1.js',
        'sash/assets/plugins/owl-carousel/owl.carousel.js',
        'sash/assets/plugins/company-slider/slider.js',
        'sash/assets/plugins/rating/jquery-rate-picker.js',
        'sash/assets/plugins/rating/rating-picker.js',
        'sash/assets/plugins/ratings-2/jquery.star-rating.js',
        'sash/assets/plugins/ratings-2/star-rating.js',
        'sash/assets/js/sticky.js',
        'sash/assets/js/landing.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];

}
