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



    

class DashboardAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'sash/assets/plugins/bootstrap/css/bootstrap.min.css', // check later
        'sash/assets/css/style.css',
        'sash/assets/css/dark-style.css',
        'sash/assets/css/transparent-style.css',
        'sash/assets/css/skin-modes.css',
        'sash/assets/css/icons.css',
        'sash/assets/colors/color1.css',
    ];
    public $js = [
        'sash/assets/js/jquery.min.js',
        'sash/assets/plugins/bootstrap/js/popper.min.js',
        'sash/assets/plugins/bootstrap/js/bootstrap.min.js',
        'sash/assets/js/jquery.sparkline.min.js',
        
        'sash/assets/js/sticky.js',
        'sash/assets/js/circle-progress.min.js',
        
        'sash/assets/plugins/peitychart/jquery.peity.min.js',
        
        'sash/assets/plugins/peitychart/peitychart.init.js',
        
        
        
        'sash/assets/plugins/sidebar/sidebar.js',
        
        
        'sash/assets/plugins/p-scroll/perfect-scrollbar.js',
        
        'sash/assets/plugins/p-scroll/pscroll.js',
        
        'sash/assets/plugins/p-scroll/pscroll-1.js',
        
   'sash/assets/plugins/chart/Chart.bundle.js',
    'sash/assets/plugins/chart/utils.js',

   'sash/assets/plugins/select2/select2.full.min.js',


  'sash/assets/plugins/datatable/js/jquery.dataTables.min.js',
    'sash/assets/plugins/datatable/js/dataTables.bootstrap5.js',
   'sash/assets/plugins/datatable/dataTables.responsive.min.js',
        'sash/assets/js/apexcharts.js',
        'sash/assets/plugins/apexchart/irregular-data-series.js',
        'sash/assets/plugins/flot/jquery.flot.js',
        'sash/assets/plugins/flot/jquery.flot.fillbetween.js',
        'sash/assets/plugins/flot/chart.flot.sampledata.js',
        'sash/assets/plugins/flot/dashboard.sampledata.js',
        'sash/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js',
        'sash/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'sash/assets/plugins/sidemenu/sidemenu.js',
        'sash/assets/plugins/bootstrap5-typehead/autocomplete.js',
        'sash/assets/js/typehead.js',
        'sash/assets/js/index1.js',
        'sash/assets/js/themeColors.js',
        'sash/assets/js/custom.js'
        
        
        
        
        
        
        
        
        
        
        
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];

}






  






    
