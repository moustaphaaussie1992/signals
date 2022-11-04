<?php
/** @var View $this */

/** @var string $content */
use app\assets\AppAsset;
use richardfan\widget\JSRegister;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\web\View;

AppAsset::register($this);

$sashPath = Yii::getAlias('@web') . '/sash';

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => '@web/favicon.ico']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
    <?php $this->head() ?>
</head>
<body class="app sidebar-mini ltr light-mode">
<?php $this->beginBody() ?> <head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="app sidebar-mini ltr light-mode">
    <?php $this->beginBody() ?>

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="<?= $sashPath ?>/assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            <div class="app-header header sticky">
                <div class="container-fluid main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"></a>
                        <!-- sidebar-toggle-->
                        <a class="logo-horizontal " href="index.html">
                            <img src="<?= $sashPath ?>/assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                            <img src="<?= $sashPath ?>/assets/images/brand/logo-3.png" class="header-brand-img light-logo1"
                                 alt="logo">

                        </a>
                        <!-- LOGO -->
                        <!--                        <div class="main-header-center ms-3 d-none d-lg-block">
                                                    <input type="text" class="form-control" id="typehead" placeholder="Search for results...">
                                                    <button class="btn px-0 pt-2"><i class="fe fe-search" aria-hidden="true"></i></button>
                                                </div>-->
                        <div class="d-flex order-lg-2 ms-auto header-right-icons">
                            <!-- SEARCH -->
                            <!--                            <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                                                aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                                                aria-label="Toggle navigation">
                                                            <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                                                        </button>-->
                            <div class="navbar navbar-collapse responsive-navbar p-0">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                    <div class="d-flex order-lg-2">

                                        <!-- COUNTRY -->
                                        <div class="d-flex country">
                                            <a class="nav-link icon theme-layout nav-link-bg layout-setting">
                                                <span class="dark-layout"><i class="fe fe-moon"></i></span>
                                                <span class="light-layout"><i class="fe fe-sun"></i></span>
                                            </a>
                                        </div>
                                        <!-- Theme-Layout -->



                                        <!--                                             NOTIFICATIONS
                                                                                    <div class="dropdown d-flex header-settings">
                                                                                        <a href="javascript:void(0);" class="nav-link icon"
                                                                                           data-bs-toggle="sidebar-right" data-target=".sidebar-right">
                                                                                            <i class="fe fe-align-right"></i>
                                                                                        </a>
                                                                                    </div>-->

                                    </div>
                                    <!-- NOTIFICATIONS -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /app-Header -->

        <!--APP-SIDEBAR-->
        <div class="sticky">
            <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
            <div class="app-sidebar">
                <div class="side-header">
                    <a class="header-brand1" style ="color:white;font-size: 30px;"href="<?= Url::to(['site/dashboard']) ?>">
                        <img style ="width:60%"src="<?= $sashPath ?>/assets/images/brand/logo-3.png" class="header-brand-img desktop-logo" alt="logo">
                        <img src="<?= $sashPath ?>/assets/images/brand/logo-1.png" class="header-brand-img toggle-logo"
                             alt="logo">
                        <img src="<?= $sashPath ?>/assets/images/brand/logo-2.png" class="header-brand-img light-logo" alt="logo">
                        <img style ="width:60%"  src="<?= $sashPath ?>/assets/images/brand/logo-3.png" class="header-brand-img light-logo1"
                             alt="logo">

                        <!--PROLABZ-->
                    </a>
                    <!-- LOGO -->
                </div>
                <div class="main-sidemenu">
                    <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                                                                          fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                        </svg></div>

                    <ul class="side-menu">
                        <li class="sub-category">
                            <h3>Main</h3>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item has-link" data-bs-toggle="slide"><i
                                    class="side-menu__icon fe fe-home"></i><span
                                    class="side-menu__label">
                                        <?php
                                        if (Yii::$app->controller->id == "crypto-signals") {
                                            echo 'Crypto Signals';
                                        } else if (Yii::$app->controller->id == "forex-signals") {
                                            echo 'Forex Signals';
                                        }
                                        ?>


                                </span></a>
                        </li>


                    </ul>
                    <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                                                                   width="24" height="24" viewBox="0 0 24 24">
                        <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                        </svg></div>
                </div>
            </div>

            <!--/APP-SIDEBAR-->
        </div>

        <!--app-content open-->
        <div class="main-content app-content mt-0">
            <div class="side-app">

                <!-- CONTAINER -->
                <div class="main-container container-fluid" style="margin-top: 20px;">

                    <!-- PAGE-HEADER -->
                    <!--                            <div class="page-header">
                                                    <h1 class="page-title">Dashboard 01</h1>-->
                    <!--                                <div>
                                                        <ol class="breadcrumb">
                                                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                                            <li class="breadcrumb-item active" aria-current="page">Dashboard 01</li>
                                                        </ol>
                                                    </div>-->
                    <!--</div>-->
                    <!-- PAGE-HEADER END -->

                    <div class="row">
                        <?= $content ?>
                    </div>

                    <!-- ROW-1 -->
                </div>
                <!-- CONTAINER END -->
            </div>
        </div>
        <!--app-content close-->

    </div>



    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-md-12 col-sm-12 text-center">
                    Copyright © <span id="year"></span> <a href="javascript:void(0)"> Prolabz</a>.  <span
                        class="fa fa-heart text-danger"></span>  </a> All rights reserved.
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER END -->


    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <?php $this->endBody() ?>

</body>

</html>

<?php $this->endPage() ?>