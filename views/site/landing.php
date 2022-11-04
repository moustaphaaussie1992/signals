<?php

use app\assets\LandingAsset;
use richardfan\widget\JSRegister;
use yii\helpers\Html;
use yii\helpers\Url;

LandingAsset::register($this);

$sashPath = Yii::getAlias('@web') . '/sash';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
          content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <?php $this->head() ?>
</head>
<?php $this->beginBody() ?> <head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="app ltr landing-page horizontal">
    <?php $this->beginBody() ?>
    <!--<html lang="en" dir="ltr">-->

    <!--    <head>

             META DATA
            <meta charset="UTF-8">
            <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
            <meta name="author" content="Spruko Technologies Private Limited">
            <meta name="keywords"
                  content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

             FAVICON
            <link rel="shortcut icon" type="image/x-icon" href="../assets/images/brand/favicon.ico" />

             TITLE
            <title>Sash – Bootstrap 5 Admin & Dashboard Template</title>



        </head>-->



    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="<?= $sashPath ?>/assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            <div class="hor-header header">
                <div class="container main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
                           href="javascript:void(0)"></a>
                        <!-- sidebar-toggle-->
                        <a class="logo-horizontal " href="index.html">
                            <img src="<?= $sashPath ?>/assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                            <img src="<?= $sashPath ?>/assets/images/brand/logo-3.png" class="header-brand-img light-logo1"
                                 alt="logo">
                        </a>
                        <!-- LOGO -->
                        <div class="d-flex order-lg-2 ms-auto header-right-icons">
                            <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                    aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                            </button>
                            <div class="navbar navbar-collapse responsive-navbar p-0">
                                <div class="collapse navbar-collapse bg-white px-0" id="navbarSupportedContent-4">
                                    <!-- SEARCH -->
                                    <div class="header-nav-right p-5">
                                        <?php if (Yii::$app->user->isGuest) { ?>
                                            <a href="login" class="btn ripple btn-min w-sm btn-outline-primary me-2 my-auto"
                                               target="_blank">New User
                                            </a>
                                            <a href="login" class="btn ripple btn-min w-sm btn-primary me-2 my-auto"
                                               target="_blank">Login
                                            </a>
                                        <?php } else { ?>
                                            <a href="logout" class="btn ripple btn-min w-sm btn-primary me-2 my-auto"
                                               target="_blank">Logout
                                            </a>
                                            <a href="dashboard" class="btn ripple btn-min w-sm btn-primary me-2 my-auto"
                                               target="_blank">ProLabz Console
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /app-Header -->

            <div class="landing-top-header overflow-hidden">
                <div class="top sticky overflow-hidden">
                    <!--APP-SIDEBAR-->
                    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                    <div class="app-sidebar bg-transparent horizontal-main">
                        <div class="container">
                            <div class="row">
                                <div class="main-sidemenu navbar px-0">
                                    <a class="navbar-brand ps-0 d-none d-lg-block" href="index.html">
                                        <img alt="" class="logo-2" src="<?= $sashPath ?>/assets/images/brand/logo-3.png">
                                        <img src="<?= $sashPath ?>/assets/images/brand/logo.png" class="logo-3" alt="logo">
                                    </a>
                                    <ul class="side-menu">
                                        <li class="slide">
                                            <a class="side-menu__item active" data-bs-toggle="slide" href="#home"><span
                                                    class="side-menu__label">Home</span></a>
                                        </li>
                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" href="#Features"><span
                                                    class="side-menu__label">Features</span></a>
                                        </li>

                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" href="#Faqs"><span
                                                    class="side-menu__label">Faq's</span></a>
                                        </li>

                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" href="#Contact"><span
                                                    class="side-menu__label">Contact</span></a>
                                        </li>
                                    </ul>
                                    <div class="header-nav-right d-none d-lg-flex">
                                        <?php if (Yii::$app->user->isGuest) { ?>
                                            <a href="register.html"
                                               class="btn ripple btn-min w-sm btn-outline-primary me-2 my-auto d-lg-none d-xl-block d-block"
                                               target="_blank">New User
                                            </a>
                                            <a href="login" class="btn ripple btn-min w-sm btn-primary me-2 my-auto d-lg-none d-xl-block d-block"
                                               target="_blank">Login
                                            </a>
                                        <?php } else { ?>



                                            <?php
                                            echo Html::beginForm(['/site/logout', 'id' => 'form-logout'])
                                            ?>
                                            <button type = "submit" class = "btn ripple btn-min w-sm btn-outline-primary me-2 my-auto d-lg-none d-xl-block d-block">Logout</button>

                                            <?php
                                            echo Html::endForm()
                                            ?>
                                            <a href="index" class="btn ripple btn-min w-sm btn-primary me-2 my-auto"
                                               target="_blank">ProLabz Console
                                            </a>

                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/APP-SIDEBAR-->
                </div>
                <div class="demo-screen-headline main-demo main-demo-1 spacing-top overflow-hidden reveal" id="home">
                    <div class="container px-sm-0">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 mb-5 pb-5 animation-zidex pos-relative">

                                <h1 class="text-start fw-bold">We help you manage your VIP Channels <span
                                        class="text-primary animate-heading">Pro</span>

                                    <span
                                        class="text-primary animate-heading">Labz</span>
                                </h1>
                                <h6 class="pb-3">
                                    What can you do with Pro-Labz? </h6>
                                <h5>
                                    ● Edit and track your members, VIP Channel and
                                    Signals
                                </h5>
                                <h5>
                                    ●Share and save your profits and data
                                </h5>
                                <h5>
                                    ●Attract new customers
                                </h5>

                                <br>
                                <br>
                                <a href="https://themeforest.net/item/sash-bootstrap-5-admin-dashboard-template/35183671"
                                   target="_blank" class="btn ripple btn-min w-lg mb-3 me-2 btn-primary"><i
                                        class="fe fe-play me-2"></i> View Demo
                                </a>

                            </div>
                            <div class="col-xl-6 col-lg-6 my-auto">
                                <img src="<?= $sashPath ?>/assets/images/dashboard.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--app-content open-->
            <div class="main-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container">
                        <div class="">

                            <!-- ROW-1 OPEN -->
                            <div class="section pb-0">
                                <div class="container">
                                    <div class="row">
                                        <h4 class="text-center fw-semibold">Statistics</h4>
                                        <span class="landing-title"></span>
                                        <h2 class="text-center fw-semibold mb-7">Pro-Labz Statistics.</h2>
                                    </div>
                                    <div class="row text-center services-statistics landing-statistics">

                                        <div class="col-xl-4 col-md-6 col-lg-6">
                                            <div class="card">
                                                <div class="card-body bg-secondary-transparent">
                                                    <div class="counter-status">
                                                        <div
                                                            class="counter-icon bg-secondary-transparent box-shadow-secondary">
                                                            <i class="fe fe-wind text-secondary fs-23"></i>
                                                        </div>
                                                        <div class="text-body text-center">
                                                            <h1 class=" mb-0">
                                                                <span class="counter fw-semibold counter ">60</span>+
                                                            </h1>
                                                            <div class="counter-text">
                                                                <h5 class="font-weight-normal mb-0 ">Subscribers
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-lg-6">
                                            <div class="card">
                                                <div class="card-body bg-success-transparent">
                                                    <div class="counter-status">
                                                        <div
                                                            class="counter-icon bg-success-transparent box-shadow-success">
                                                            <i class="fe fe-file-text text-success fs-23"></i>
                                                        </div>
                                                        <div class="text-body text-center">
                                                            <h1 class=" mb-0">
                                                                <span class="counter fw-semibold counter ">10</span>+
                                                            </h1>
                                                            <div class="counter-text">
                                                                <h5 class="font-weight-normal mb-0 ">Visitors</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-lg-6">
                                            <div class="card">
                                                <div class="card-body bg-danger-transparent">
                                                    <div class="counter-status">
                                                        <div
                                                            class="counter-icon bg-danger-transparent box-shadow-danger">
                                                            <i class="fe fe-grid text-danger fs-23"></i>
                                                        </div>
                                                        <div class="text-body text-center">
                                                            <h1 class=" mb-0">
                                                                <span class="counter fw-semibold counter ">30</span>+
                                                            </h1>
                                                            <div class="counter-text">
                                                                <h5 class="font-weight-normal mb-0 ">Accounts
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ROW-1 CLOSED -->

                            <!-- ROW-2 OPEN -->
                            <div class="sptb section bg-white" id="Features">
                                <div class="container">
                                    <div class="row">
                                        <h4 class="text-center fw-semibold">Features</h4>
                                        <span class="landing-title"></span>
                                        <h2 class="fw-semibold text-center">Pro-Labz Main Features</h2>
                                        <p class="text-default mb-5 text-center"></p>
                                        <div class="row mt-7">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card features main-features main-features-1 wow fadeInUp reveal revealleft"
                                                     data-wow-delay="0.1s">
                                                    <div class="bg-img mb-2 text-left">
                                                        <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg"
                                                             viewBox="0 0 128 128">
                                                        <circle cx="64" cy="64" r="64" fill="#42A3DB" />
                                                        <path fill="#347CBE"
                                                              d="M85.5 26.6L66.1 61 33.3 98.6 62.6 128H64c33.7 0 61.3-26 63.8-59.1L85.5 26.6z" />
                                                        <path fill="#CD2F30"
                                                              d="M73.1 57.7h-16c3.6 18.7 11.1 36.6 22.1 52.5.3-5 1-9.8 1.8-14.5 4.6 1.3 9.2 2.3 13.7 3-9.7-12.2-17-26.1-21.6-41z" />
                                                        <path fill="#F04D45"
                                                              d="M54.9 57.7c-4.6 15-11.9 28.9-21.6 40.9 4.5-.7 9.1-1.7 13.7-3 .9 4.7 1.5 9.5 1.8 14.5 11-15.9 18.4-33.8 22.1-52.5h-16z" />
                                                        <path fill="#FFF"
                                                              d="M93.5 52c1.8-1.8 1.8-4.7 0-6.5-1.3-1.3-1.7-3.3-1-5 1-2.4-.1-5-2.5-6-1.7-.7-2.8-2.4-2.8-4.3 0-2.5-2.1-4.6-4.6-4.6-1.9 0-3.5-1.1-4.3-2.8-1-2.4-3.7-3.5-6-2.5-1.7.7-3.7.3-5-1-1.8-1.8-4.7-1.8-6.5 0-1.3 1.3-3.3 1.7-5 1-2.4-1-5 .1-6 2.5-.7 1.7-2.4 2.8-4.3 2.8-2.5 0-4.6 2.1-4.6 4.6 0 1.9-1.1 3.5-2.8 4.3-2.4 1-3.5 3.7-2.5 6 .7 1.7.3 3.7-1 5-1.8 1.8-1.8 4.7 0 6.5 1.3 1.3 1.7 3.3 1 5-1 2.4.1 5 2.5 6 1.7.7 2.8 2.4 2.8 4.3 0 2.5 2.1 4.6 4.6 4.6 1.9 0 3.5 1.1 4.3 2.8 1 2.4 3.7 3.5 6 2.5 1.7-.7 3.7-.3 5 1 1.8 1.8 4.7 1.8 6.5 0 1.3-1.3 3.3-1.7 5-1 2.4 1 5-.1 6-2.5.7-1.7 2.4-2.8 4.3-2.8 2.5 0 4.6-2.1 4.6-4.6 0-1.9 1.1-3.5 2.8-4.3 2.4-1 3.5-3.7 2.5-6-.7-1.7-.3-3.7 1-5z" />
                                                        <path fill="#FFCD0A"
                                                              d="M64 70.8c-12.2 0-22.1-9.9-22.1-22.1 0-12.2 9.9-22.1 22.1-22.1 12.2 0 22.1 9.9 22.1 22.1 0 12.2-9.9 22.1-22.1 22.1z" />
                                                        <path fill="#FFF"
                                                              d="M59.9 61c-.6 0-1.1-.2-1.5-.7l-8.3-9.2c-.7-.8-.7-2.1.1-2.8.8-.7 2.1-.7 2.8.1l6.7 7.5 15.1-18.8c.7-.9 2-1 2.8-.3.9.7 1 2 .3 2.8L61.4 60.2c-.3.5-.9.8-1.5.8z" />
                                                        </svg>
                                                    </div>
                                                    <div class="text-left">
                                                        <h4 class="fw-bold"> Statistics</h4>
                                                        <p class="mb-0">With ProLabz you can see detailed statistics of your channel, signals, and members through our easy fashionable filters</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card  features main-features main-features-2 wow fadeInUp reveal revealleft"
                                                     data-wow-delay="0.1s">
                                                    <div class="bg-img mb-2 text-left">
                                                        <!-- <img src="../assets/landing/images/features/demo.png" alt=""> -->
                                                        <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg"
                                                             viewBox="0 0 128 128">
                                                        <circle cx="64" cy="64" r="64" fill="#FFCD0A" />
                                                        <path fill="#F6AF1A"
                                                              d="M127.7 57.7l-26.4-26.4-74.7 58.8L64.5 128c35.1-.3 63.5-28.8 63.5-64 0-2.1-.1-4.2-.3-6.3z" />
                                                        <path fill="#CFD5DF" d="M76.2 102.9H51.8l2-13.6h20.4z" />
                                                        <path fill="#545E70"
                                                              d="M97.1 91.7H30.9c-3.5 0-6.4-2.9-6.4-6.4V36.1c0-3.5 2.9-6.4 6.4-6.4h66.2c3.5 0 6.4 2.9 6.4 6.4v49.3c0 3.5-2.9 6.3-6.4 6.3z" />
                                                        <path fill="#E6E8EB"
                                                              d="M24.5 81.4v4c0 3.5 2.9 6.4 6.4 6.4h66.2c3.5 0 6.4-2.9 6.4-6.4v-4h-79z" />
                                                        <path fill="#49C7EF"
                                                              d="M30.9 74.3c-1 0-1.8-.8-1.8-1.8V36.1c0-1 .8-1.8 1.8-1.8h66.2c1 0 1.8.8 1.8 1.8v36.4c0 1-.8 1.8-1.8 1.8H30.9z" />
                                                        <path fill="#17B6EA" d="M37.8 34.3h52.5v40H37.8z" />
                                                        <path fill="#E6E8EB"
                                                              d="M76.7 105.3H51.3c-1.3 0-2.4-1.1-2.4-2.4 0-1.3 1.1-2.4 2.4-2.4h25.4c1.3 0 2.4 1.1 2.4 2.4-.1 1.3-1.1 2.4-2.4 2.4z" />
                                                        <path fill="#ACB2B9" d="M53.2 91.7l22.7 8.8-1.3-8.8z" />
                                                        <path fill="#FFF"
                                                              d="M75.7 47.8H52.3c-.6 0-1.1-.5-1.1-1.1v-2.9c0-.6.5-1.1 1.1-1.1h23.3c.6 0 1.1.5 1.1 1.1v2.9c0 .6-.4 1.1-1 1.1zM75.7 57.1H52.3c-.6 0-1.1-.5-1.1-1.1v-2.9c0-.6.5-1.1 1.1-1.1h23.3c.6 0 1.1.5 1.1 1.1V56c0 .6-.4 1.1-1 1.1z" />
                                                        <path fill="#FFCD0A"
                                                              d="M62.8 65.9H52.3c-.6 0-1.1-.5-1.1-1.1v-2.9c0-.6.5-1.1 1.1-1.1h10.4c.6 0 1.1.5 1.1 1.1v2.9c0 .6-.4 1.1-1 1.1z" />
                                                        <g fill="#CFD5DF">
                                                        <circle cx="54.1" cy="45.3" r="1.2" />
                                                        <circle cx="57.6" cy="45.3" r="1.2" />
                                                        <circle cx="61" cy="45.3" r="1.2" />
                                                        <circle cx="64.5" cy="45.3" r="1.2" />
                                                        <circle cx="67.9" cy="45.3" r="1.2" />
                                                        </g>
                                                        <g fill="#CFD5DF">
                                                        <circle cx="54.1" cy="54.6" r="1.2" />
                                                        <circle cx="57.6" cy="54.6" r="1.2" />
                                                        <circle cx="61" cy="54.6" r="1.2" />
                                                        <circle cx="64.5" cy="54.6" r="1.2" />
                                                        <circle cx="67.9" cy="54.6" r="1.2" />
                                                        </g>
                                                        <g fill="#FFF">
                                                        <path
                                                            d="M56.9 64.4c-.3.3-.6.4-1 .4s-.8-.1-1-.4c-.3-.3-.4-.6-.4-1s.1-.7.4-1c.3-.3.6-.4 1-.4s.8.1 1 .4c.3.3.4.6.4 1s-.1.7-.4 1zm-.2-1c0-.2-.1-.5-.2-.6-.2-.2-.4-.3-.6-.3s-.4.1-.6.3c-.2.2-.2.4-.2.6 0 .2.1.5.2.6.2.2.4.3.6.3s.4-.1.6-.3c.1-.2.2-.4.2-.6zM58.3 62h.6v1.1l1-1.1h.8l-1.1 1.2c.1.1.3.4.5.7s.4.6.6.8H60l-.8-1.1-.3.4v.8h-.6V62z" />
                                                        </g>
                                                        <circle cx="64" cy="86.6" r="2.8" fill="#545E70" />
                                                        <g fill="#E6E8EB">
                                                        <path
                                                            d="M92.6 49.7v9.2c0 1.2 1.6 1.6 2.2.5l2.3-4.6c.2-.3.2-.7 0-1l-2.3-4.6c-.6-1.1-2.2-.7-2.2.5zM36.1 58.9v-9.2c0-1.2-1.6-1.6-2.2-.5l-2.3 4.6c-.2.3-.2.7 0 1l2.3 4.6c.6 1.1 2.2.7 2.2-.5z" />
                                                        </g>
                                                        </svg>
                                                    </div>
                                                    <div class="text-left">
                                                        <h4 class="fw-bold">Members</h4>
                                                        <p class="mb-0">
                                                            ProLabz allows you to add, monitor and track your members
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card features main-features main-features-11 wow fadeInUp reveal revealleft"
                                                     data-wow-delay="0.1s">
                                                    <div class="bg-img mb-2 text-left">
                                                        <svg id="SvgjsSvg1001" width="50" height="50"
                                                             xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                                             xmlns:svgjs="http://svgjs.com/svgjs">
                                                        <defs id="SvgjsDefs1002"></defs>
                                                        <g id="SvgjsG1008"><svg xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 128 128" width="50" height="50">
                                                        <circle cx="64" cy="64" r="64" fill="#bed530"
                                                                class="colorBED530 svgShape"></circle>
                                                        <path fill="#acc437"
                                                              d="M112.8 53.7l-4.6-3.7L85 27l-.9 6.9H77L70 27l-1.3 3.7-6 5.7-9.4-9.4-.9 3.7-8.9 2.3-6-6-5 8.2-3.9 63.7 28.9 28.8c2.2.2 4.4.3 6.6.3 33.7 0 61.4-26.2 63.8-59.3l-15.1-15z"
                                                              class="colorACC437 svgShape"></path>
                                                        <path fill="#ffffff"
                                                              d="M86.5 101.8H34.2c-3.6 0-6.5-2.9-6.5-6.5v-58c0-3.6 2.9-6.5 6.5-6.5h52.3c3.6 0 6.5 2.9 6.5 6.5v58c0 3.6-2.9 6.5-6.5 6.5z"
                                                              class="colorFFF svgShape"></path>
                                                        <path fill="#e6e8eb"
                                                              d="M75.6 78l-9.5 12.3 11.5 11.5h8.8c3.6 0 6.5-2.9 6.5-6.5V67.7L75.6 78z"
                                                              class="colorE6E8EB svgShape"></path>
                                                        <path fill="#e2247e" d="M88.5 58.8h8v31.9h-8z"
                                                              transform="rotate(-135.032 92.483 74.797)"
                                                              class="colorE2247E svgShape"></path>
                                                        <path fill="#ee3e88" d="M82.9 53.2h8v31.9h-8z"
                                                              transform="rotate(-135.032 86.846 69.166)"
                                                              class="colorEE3E88 svgShape"></path>
                                                        <path fill="#f06197" d="M77.2 47.6h8v31.9h-8z"
                                                              transform="rotate(-135.032 81.209 63.535)"
                                                              class="colorF06197 svgShape"></path>
                                                        <path fill="#cfd5df" d="M87 56h23.9v2.2H87z"
                                                              transform="rotate(-135.032 98.922 57.076)"
                                                              class="colorCFD5DF svgShape"></path>
                                                        <path fill="#545e70"
                                                              d="M102.2 43.2l10.5 10.5c1.8 1.8 1.8 4.6 0 6.4l-4.6 4.6-16.8-16.9 4.6-4.6c1.7-1.7 4.6-1.7 6.3 0z"
                                                              class="color545E70 svgShape"></path>
                                                        <path fill="#fcd65e"
                                                              d="M67.1 72l-1.7 16.7c-.1 1.1.8 2 1.9 1.9L84 88.9 67.1 72z"
                                                              class="colorFCD65E svgShape"></path>
                                                        <path fill="#f6af1a"
                                                              d="M65.4 88.7c-.1.6.2 1.1.5 1.5l9.6-9.6-8.4-8.6-1.7 16.7z"
                                                              class="colorF6AF1A svgShape"></path>
                                                        <path fill="#ffcd0a"
                                                              d="M66.1 90.3l12.2-7-5.6-5.6-7 12.2c.2.1.3.3.4.4z"
                                                              class="colorFFCD0A svgShape"></path>
                                                        <path fill="#7d6c7c"
                                                              d="M65.9 83.9l-.5 4.8c-.1 1.1.8 2 1.9 1.9l4.8-.5-6.2-6.2z"
                                                              class="color7D6C7C svgShape"></path>
                                                        <path fill="#5b4b57"
                                                              d="M65.9 83.9l-.5 4.8c-.1.6.2 1.1.5 1.5l3.1-3.1-3.1-3.2z"
                                                              class="color5B4B57 svgShape"></path>
                                                        <path fill="#6b5969"
                                                              d="M68 86l-2.2 3.9c.1.2.2.3.4.4l3.9-2.3-2.1-2z"
                                                              class="color6B5969 svgShape"></path>
                                                        <circle cx="84.1" cy="39.6" r="4.1" fill="#bed530"
                                                                class="colorBED530 svgShape"></circle>
                                                        <circle cx="68.2" cy="39.6" r="4.1" fill="#bed530"
                                                                class="colorBED530 svgShape"></circle>
                                                        <circle cx="52.4" cy="39.6" r="4.1" fill="#bed530"
                                                                class="colorBED530 svgShape"></circle>
                                                        <circle cx="36.5" cy="39.6" r="4.1" fill="#bed530"
                                                                class="colorBED530 svgShape"></circle>
                                                        <path fill="#545e70"
                                                              d="M84.1 40.5c-1.1 0-1.9-.9-1.9-1.9v-10c0-1.1.9-1.9 1.9-1.9 1.1 0 1.9.9 1.9 1.9v10c.1 1.1-.8 1.9-1.9 1.9zM68.3 40.5c-1.1 0-1.9-.9-1.9-1.9v-10c0-1.1.9-1.9 1.9-1.9 1.1 0 1.9.9 1.9 1.9v10c0 1.1-.9 1.9-1.9 1.9zM52.4 40.6c-1.1 0-1.9-.9-1.9-1.9v-10c0-1.1.9-1.9 1.9-1.9 1.1 0 1.9.9 1.9 1.9v10c0 1-.9 1.9-1.9 1.9zM36.5 40.6c-1.1 0-1.9-.9-1.9-1.9v-10c0-1.1.9-1.9 1.9-1.9 1.1 0 1.9.9 1.9 1.9v10c0 1-.8 1.9-1.9 1.9z"
                                                              class="color545E70 svgShape"></path>
                                                        </svg></g>
                                                        </svg>
                                                    </div>
                                                    <div class="text-left">
                                                        <h4 class="fw-bold">Signals</h4>
                                                        <p class="mb-0">
                                                            Our Signals feature allows you to share your success, trades and charts with your members through unlimited platforms
                                                            This feature also gives you the chance to separate between Forex and Crypto users
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card features main-features main-features-10 wow fadeInUp reveal revealleft"
                                                     data-wow-delay="0.1s">
                                                    <div class="bg-img mb-2 text-left">
                                                        <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg"
                                                             version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                             xmlns:svgjs="http://svgjs.com/svgjs">
                                                        <defs id="SvgjsDefs1055"></defs>
                                                        <g id="SvgjsG1056"><svg xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 128 128" width="50" height="50">
                                                        <circle cx="64" cy="64" r="64" fill="#58e1ef"
                                                                class="colorD9B9A9 svgShape"></circle>
                                                        <path fill="#47d4e4"
                                                              d="M71.4 127.6c29.4-3.4 52.7-26.7 56.1-56.1L74.8 18.6 51.9 31.2 31.2 47.4 18.6 74.8l52.8 52.8z"
                                                              class="colorD6AB9A svgShape"></path>
                                                        <path fill="#6b5969"
                                                              d="M64 101.5c-20.7 0-37.5-16.8-37.5-37.5S43.3 26.5 64 26.5s37.5 16.8 37.5 37.5-16.8 37.5-37.5 37.5zm0-70.3c-18.1 0-32.8 14.7-32.8 32.8S45.9 96.8 64 96.8 96.8 82.1 96.8 64 82.1 31.2 64 31.2z"
                                                              class="color6B5969 svgShape"></path>
                                                        <circle cx="64" cy="28.8" r="14.8" fill="#ffffff"
                                                                class="colorFFF svgShape"></circle>
                                                        <path fill="#8663a7"
                                                              d="M64 39.1c-5.6 0-10.2-4.6-10.2-10.2S58.4 18.7 64 18.7s10.2 4.6 10.2 10.2S69.6 39.1 64 39.1z"
                                                              class="color8663A7 svgShape"></path>
                                                        <circle cx="64" cy="99.2" r="14.8" fill="#ffffff"
                                                                class="colorFFF svgShape"></circle>
                                                        <path fill="#3d9c46"
                                                              d="M64 109.4c-5.6 0-10.2-4.6-10.2-10.2S58.4 89 64 89s10.2 4.6 10.2 10.2-4.6 10.2-10.2 10.2z"
                                                              class="color3D9C46 svgShape"></path>
                                                        <circle cx="99.2" cy="64" r="14.8" fill="#ffffff"
                                                                class="colorFFF svgShape"></circle>
                                                        <path fill="#ee3e88"
                                                              d="M99.2 74.2C93.6 74.2 89 69.6 89 64s4.6-10.2 10.2-10.2 10.2 4.6 10.2 10.2-4.6 10.2-10.2 10.2z"
                                                              class="colorEE3E88 svgShape"></path>
                                                        <circle cx="28.8" cy="64" r="14.8" fill="#ffffff"
                                                                class="colorFFF svgShape"></circle>
                                                        <path fill="#ffcd0a"
                                                              d="M28.8 74.2c-5.6 0-10.2-4.6-10.2-10.2s4.6-10.2 10.2-10.2S39.1 58.4 39.1 64s-4.6 10.2-10.3 10.2z"
                                                              class="colorFFCD0A svgShape"></path>
                                                        <path fill="#ffffff"
                                                              d="M98.4 61.8v1.9h2.5v1.5h-2.5v2.7h4.4v1.6h-7.4v-1.6h1.2v-2.7h-1.3v-1.5h1.3v-1.9c0-1.2.3-2.1.9-2.6.6-.5 1.4-.8 2.4-.8 1.3 0 2.3.6 2.9 1.7l-1.2 1c-.4-.7-.9-1-1.6-1-.5 0-.9.1-1.2.4s-.4.7-.4 1.3z"
                                                              class="colorFFF svgShape"></path>
                                                        </svg></g>
                                                        </svg>
                                                    </div>
                                                    <div class="text-left">
                                                        <h4 class="fw-bold">Data</h4>
                                                        <p class="mb-0">
                                                            Your data entry never easier to transfer, update and secure with ProLabz
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card features main-features main-features-9 wow fadeInUp reveal revealleft"
                                                     data-wow-delay="0.1s">
                                                    <div class="bg-img mb-2 text-left">
                                                        <svg id="SvgjsSvg1156" width="50" height="50"
                                                             xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                                             xmlns:svgjs="http://svgjs.com/svgjs">
                                                        <defs id="SvgjsDefs1157"></defs>
                                                        <g id="SvgjsG1158"><svg xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 128 128" width="50" height="50">
                                                        <circle cx="64" cy="64" r="64" fill="#f579a2"
                                                                class="color1F68B0 svgShape"></circle>
                                                        <path fill="#d6607b"
                                                              d="M128 64c0-2.7-.2-5.3-.5-7.9l-21.8-21.8-84 58.7 34.5 34.5c2.6.3 5.2.5 7.8.5 35.3 0 64-28.7 64-64z"
                                                              class="color2A519C svgShape"></path>
                                                        <path fill="#ffffff"
                                                              d="M101.8 95H26.2c-3.3 0-6-2.7-6-6V39c0-3.3 2.7-6 6-6h75.7c3.3 0 6 2.7 6 6v50c-.1 3.3-2.7 6-6.1 6z"
                                                              class="colorFFF svgShape"></path>
                                                        <path fill="#ffffff"
                                                              d="M20.2 44.9V89c0 3.3 2.7 6 6 6h75.7c3.3 0 6-2.7 6-6V44.9H20.2z"
                                                              class="colorFFF svgShape"></path>
                                                        <path fill="#3c29de"
                                                              d="M107.8 45v-6c0-3.3-2.7-6-6-6H26.2c-3.3 0-6 2.7-6 6v6h87.6z"
                                                              class="colorFFCD0A svgShape"></path>
                                                        <circle cx="28.7" cy="39" r="3.3" fill="#ffffff"
                                                                class="colorFFF svgShape"></circle>
                                                        <circle cx="28.7" cy="39" r="1.9" fill="#543bc1"
                                                                class="colorF04D45 svgShape"></circle>
                                                        <circle cx="37.3" cy="39" r="3.3" fill="#ffffff"
                                                                class="colorFFF svgShape"></circle>
                                                        <circle cx="37.3" cy="39" r="1.9" fill="#9c583d"
                                                                class="color3D9C46 svgShape"></circle>
                                                        <circle cx="46" cy="39" r="3.3" fill="#ffffff"
                                                                class="colorFFF svgShape"></circle>
                                                        <circle cx="46" cy="39" r="1.9" fill="#6b595d"
                                                                class="color6B5969 svgShape"></circle>
                                                        <path fill="#ffffff"
                                                              d="M99.3 42.3H57.2c-1.8 0-3.3-1.5-3.3-3.3 0-1.8 1.5-3.3 3.3-3.3h42.1c1.8 0 3.3 1.5 3.3 3.3 0 1.8-1.5 3.3-3.3 3.3z"
                                                              class="colorFFF svgShape"></path>
                                                        <path fill="#dfdecf"
                                                              d="M101.8 50.4H26.2c-.3 0-.5.2-.5.5V89c0 .3.2.5.5.5h75.7c.3 0 .5-.2.5-.5V50.9c-.1-.3-.3-.5-.6-.5zM34.5 66.6H41v6.6h-6.5v-6.6zm-1 6.7h-6.8v-6.6h6.8v6.6zm8.5-6.7h6.5v6.6H42v-6.6zm36.5-1H72V59h6.5v6.6zm1-6.6H86v6.6h-6.5V59zM57 66.6h6.5v6.6H57v-6.6zm-1 6.7h-6.5v-6.6H56v6.6zm8.5-6.7H71v6.6h-6.5v-6.6zm7.5 0h6.5v6.6H72v-6.6zm-1-1h-6.5V59H71v6.6zm-7.5 0H57V59h6.5v6.6zm-7.5 0h-6.5V59H56v6.6zm-7.5 0H42V59h6.5v6.6zm0 8.7v6.6H42v-6.6h6.5zm1 0H56v6.6h-6.5v-6.6zm7.5 0h6.5v6.6H57v-6.6zm7.5 0H71v6.6h-6.5v-6.6zm7.5 0h6.5v6.6H72v-6.6zm7.5 0H86v6.6h-6.5v-6.6zm0-1v-6.6H86v6.6h-6.5zm7.5-6.7h6.5v6.6H87v-6.6zm7.5 0h6.8v6.6h-6.8v-6.6zm0-1V59h6.8v6.6h-6.8zm-1 0H87V59h6.5v6.6zM87 58v-6.6h6.5V58H87zm-1 0h-6.5v-6.6H86V58zm-7.5 0H72v-6.6h6.5V58zM71 58h-6.5v-6.6H71V58zm-7.5 0H57v-6.6h6.5V58zM56 58h-6.5v-6.6H56V58zm-7.5 0H42v-6.6h6.5V58zM41 58h-6.5v-6.6H41V58zm0 1v6.6h-6.5V59H41zm-7.5 6.6h-6.8V59h6.8v6.6zm-6.8 8.7h6.8v6.6h-6.8v-6.6zm7.8 0H41v6.6h-6.5v-6.6zm6.5 7.6v6.6h-6.5v-6.6H41zm1 0h6.5v6.6H42v-6.6zm7.5 0H56v6.6h-6.5v-6.6zm7.5 0h6.5v6.6H57v-6.6zm7.5 0H71v6.6h-6.5v-6.6zm7.5 0h6.5v6.6H72v-6.6zm7.5 0H86v6.6h-6.5v-6.6zm7.5 0h6.5v6.6H87v-6.6zm0-1v-6.6h6.5v6.6H87zm7.5-6.6h6.8v6.6h-6.8v-6.6zm6.8-16.3h-6.8v-6.6h6.8V58zm-67.8-6.6V58h-6.8v-6.6h6.8zm-6.8 30.5h6.8v6.6h-6.8v-6.6zm67.8 6.6v-6.6h6.8v6.6h-6.8z"
                                                              class="colorCFD5DF svgShape"></path>
                                                        <path fill="#fff591" d="M30.6 66.1h5.1V89h-5.1z"
                                                              class="colorD7E14A svgShape"></path>
                                                        <path fill="#9c583d" d="M40.9 61.6H46V89h-5.1z"
                                                              class="color3D9C46 svgShape"></path>
                                                        <path fill="#f5587b" d="M51.2 68.9h5.1V89h-5.1z"
                                                              class="colorEE3E88 svgShape"></path>
                                                        <path fill="#a76372" d="M61.5 61.6h5.1V89h-5.1z"
                                                              class="color8663A7 svgShape"></path>
                                                        <path fill="#c2633e" d="M92.3 69.6h5.1v19.5h-5.1z"
                                                              class="color9AC23E svgShape"></path>
                                                        <path fill="#543bc1" d="M71.7 54h5.1v35h-5.1z"
                                                              class="colorF04D45 svgShape"></path>
                                                        <path fill="#b0052b" d="M82 60.8h5.1V89H82z"
                                                              class="color05B0A6 svgShape"></path>
                                                        </svg></g>
                                                        </svg>
                                                    </div>
                                                    <div class="text-left">
                                                        <h4 class="fw-bold">Market & Share</h4>
                                                        <p class="mb-0">
                                                            Our platfotm allows you to share your success in a modern fashionable dashboards through ProLabz and other social media platforms to unlimited number of users
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card features main-features main-features-12 mb-4 wow fadeInUp reveal revealleft"
                                                     data-wow-delay="0.1s">
                                                    <div class="bg-img mb-2 text-left">
                                                        <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg"
                                                             viewBox="0 0 128 128">
                                                        <circle cx="64" cy="64" r="64" fill="#F49C20" />
                                                        <path fill="#EC7B24"
                                                              d="M127.5 56.2l-30-30-7.4 8.2-21-21h-6.7l-5.5 4.9 5.5 27.2h17.9l-50.1 56 26 26c2.6.3 5.2.5 7.8.5 35.3 0 64-28.7 64-64 0-2.6-.2-5.2-.5-7.8z" />
                                                        <path fill="#545E70"
                                                              d="M91.3 104.8H36.7c-4.4 0-8-3.6-8-8V31.2c0-4.4 3.6-8 8-8h54.6c4.4 0 8 3.6 8 8v65.6c0 4.4-3.6 8-8 8z" />
                                                        <path fill="#FFF" d="M34.7 29.3h58.7V94H34.7z" />
                                                        <path fill="#CFD5DF"
                                                              d="M87.8 32.7H40.1c0-2.9 1.2-5.6 3.1-7.5 1.9-1.9 4.6-3.1 7.5-3.1h6.1v-3.8c0-3.9 3.2-7.1 7.1-7.1 3.9 0 7.1 3.2 7.1 7.1v3.8h6.1c6 0 10.7 4.8 10.7 10.6z" />
                                                        <path fill="#ACB2B9"
                                                              d="M40.7 29.3c-.4 1.1-.6 2.2-.6 3.4h47.7c0-1.2-.2-2.3-.6-3.4H40.7z" />
                                                        <circle cx="64" cy="18.1" r="3.6" fill="#EC7B24" />
                                                        <path fill="#E6E8EB" d="M79.7 80.4h13.6L79.7 94.1z" />
                                                        <path fill="#CFD5DF"
                                                              d="M79.7 94.1l13.6-13.7v13.7M52.3 51.4H41.5c-.4 0-.8-.3-.8-.8V39.9c0-.4.3-.8.8-.8h10.8c.4 0 .8.3.8.8v10.8c-.1.4-.4.7-.8.7zm-10-1.5h9.3v-9.3h-9.3v9.3zM52.3 68.6H41.5c-.4 0-.8-.3-.8-.8V57.1c0-.4.3-.8.8-.8h10.8c.4 0 .8.3.8.8v10.8c-.1.4-.4.7-.8.7zm-10-1.5h9.3v-9.3h-9.3v9.3zM67.9 42.7h-11c-.4 0-.8-.3-.8-.8s.3-.8.8-.8h11c.4 0 .8.3.8.8s-.4.8-.8.8zM80.6 42.7h-8.9c-.4 0-.8-.3-.8-.8s.3-.8.8-.8h8.9c.4 0 .8.3.8.8s-.4.8-.8.8zM87.8 42.7h-3.5c-.4 0-.8-.3-.8-.8s.3-.8.8-.8h3.5c.4 0 .8.3.8.8s-.3.8-.8.8zM61.4 46h-4.5c-.4 0-.8-.3-.8-.8s.3-.8.8-.8h4.5c.4 0 .8.3.8.8s-.4.8-.8.8zM73 46h-7.8c-.4 0-.8-.3-.8-.8s.3-.8.8-.8H73c.4 0 .8.3.8.8s-.4.8-.8.8zM87.8 46h-11c-.4 0-.8-.3-.8-.8s.3-.8.8-.8h11c.4 0 .8.3.8.8s-.3.8-.8.8zM67.9 49.3h-11c-.4 0-.8-.3-.8-.8s.3-.8.8-.8h11c.4 0 .8.3.8.8s-.4.8-.8.8zM77.7 49.3h-6c-.4 0-.8-.3-.8-.8s.3-.8.8-.8h6c.4 0 .8.3.8.8s-.3.8-.8.8zM87.8 49.3h-6.3c-.4 0-.8-.3-.8-.8s.3-.8.8-.8h6.3c.4 0 .8.3.8.8s-.3.8-.8.8zM67.9 59.9h-11c-.4 0-.8-.3-.8-.8s.3-.8.8-.8h11c.4 0 .8.3.8.8s-.4.8-.8.8zM80.6 59.9h-8.9c-.4 0-.8-.3-.8-.8s.3-.8.8-.8h8.9c.4 0 .8.3.8.8s-.4.8-.8.8zM87.8 59.9h-3.5c-.4 0-.8-.3-.8-.8s.3-.8.8-.8h3.5c.4 0 .8.3.8.8s-.3.8-.8.8zM61.4 63.2h-4.5c-.4 0-.8-.3-.8-.8s.3-.8.8-.8h4.5c.4 0 .8.3.8.8s-.4.8-.8.8zM73 63.2h-7.8c-.4 0-.8-.3-.8-.8s.3-.8.8-.8H73c.4 0 .8.3.8.8s-.4.8-.8.8zM87.8 63.2h-11c-.4 0-.8-.3-.8-.8s.3-.8.8-.8h11c.4 0 .8.3.8.8s-.3.8-.8.8z" />
                                                        <g>
                                                        <path fill="#CFD5DF"
                                                              d="M67.9 66.5h-11c-.4 0-.8-.3-.8-.8s.3-.8.8-.8h11c.4 0 .8.3.8.8s-.4.8-.8.8zM77.7 66.5h-6c-.4 0-.8-.3-.8-.8s.3-.8.8-.8h6c.4 0 .8.3.8.8s-.3.8-.8.8zM87.8 66.5h-6.3c-.4 0-.8-.3-.8-.8s.3-.8.8-.8h6.3c.4 0 .8.3.8.8s-.3.8-.8.8z" />
                                                        </g>
                                                        <path fill="#F04D45"
                                                              d="M57.8 36.2c-1.3.2-2.5.7-3.6 1.5-1.1.7-2.1 1.6-2.9 2.5-.9.9-1.7 1.9-2.4 3-.3.4-.5.8-.8 1.2-.1-.1-.2-.2-.2-.3-.3-.4-.7-.7-1.2-1-.2-.1-.5-.3-.7-.4-.3-.1-.5-.2-.9-.2-.8-.1-1.5.5-1.6 1.4-.1.8.5 1.5 1.4 1.6h.2c.1 0 .2.1.3.1.2.1.4.3.6.4.2.2.4.4.5.6.2.2.3.5.4.8 0 .5.3 1 .8 1.1.6.2 1.3-.1 1.6-.7l.1-.4c.1-.2.2-.5.3-.8l.4-.8c.3-.5.5-1.1.8-1.6.6-1 1.2-2.1 1.9-3 .7-1 1.5-1.9 2.4-2.6.9-.8 1.9-1.4 3-1.7.2-.1.3-.2.3-.4-.3-.2-.5-.3-.7-.3zm-8.6 10.2zM57.8 54.9c-1.3.2-2.5.7-3.6 1.5-1.1.7-2.1 1.6-2.9 2.5-.9.9-1.7 1.9-2.4 3-.3.4-.5.8-.8 1.2-.1-.1-.2-.2-.2-.3-.3-.4-.7-.7-1.2-1-.2-.1-.5-.3-.7-.4-.3-.1-.5-.2-.9-.2-.8-.1-1.5.5-1.6 1.4-.1.8.5 1.5 1.4 1.6h.2c.1 0 .2.1.3.1.2.1.4.3.6.4.2.2.4.4.5.6.2.2.3.5.4.8 0 .5.3 1 .8 1.1.6.2 1.3-.1 1.6-.7l.1-.4c.1-.2.2-.5.3-.8l.4-.8c.3-.5.5-1.1.8-1.6.6-1 1.2-2.1 1.9-3 .7-1 1.5-1.9 2.4-2.6.9-.8 1.9-1.4 3-1.7.2-.1.3-.2.3-.4-.3-.2-.5-.4-.7-.3zm-8.6 10.2z" />
                                                        </svg>
                                                    </div>
                                                    <div class="text-left">
                                                        <h4 class="fw-bold">USDT Cash-out*</h4>
                                                        <p class="mb-0">
                                                            ProLabz will allow you to upgrade your data entry game with our easy filtration of Clients info, USDT flow and sales
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ROW-2 CLOSED -->

                            <!-- ROW-3 OPEN -->
                            <!--                            <div class="section bg-landing pb-0 bg-image-style" id="About">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <h4 class="text-center fw-semibold">Our Mission</h4>
                                                                    <span class="landing-title"></span>
                                                                    <div class="text-center">
                                                                        <h2 class="text-center fw-semibold">Our mission is to help you Track, Share and Control your data
                                                                        </h2>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="card bg-transparent">
                                                                            <div class="card-body text-dark">
                                                                                <div class="statistics-info">
                                                                                    <div class="row">
                                                                                        <div class="col-xl-6 col-lg-6 ps-0">
                                                                                            <div class="text-center reveal revealleft mb-3">
                                                                                                <img src="<?= $sashPath ?>/assets/images/landing/business-team-working-on-business-plan.png"
                                                                                                     alt="" class="br-5">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-xl-6 col-lg-6 pe-0 my-auto">

                                                                                            <div class="ps-5 reveal revealright">
                                                                                                <h2 class="text-start fw-semibold fs-25 mb-6">
                                                                                                </h2>
                                                                                                <div class="d-flex">
                                                                                                    <span><svg style="width:20px;height:20px"
                                                                                                               viewBox="0 0 24 24">
                                                                                                        <path fill="#6c5ffc"
                                                                                                              d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z" />
                                                                                                        </svg></span>
                                                                                                    <div class="ms-5 mb-4">
                                                                                                        <h5 class="fw-bold">At ProLabz, our mission is to enhance your business capability through reliable and sharable data entry dashboards
                                                                                                        </h5>

                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>-->
                            <!-- ROW-3 CLOSED -->

                            <!-- ROW-4 OPEN -->
                            <div class="section testimonial-owl-landing">
                                <div class="container">
                                    <div class="row">
                                        <div class="card bg-transparent mb-0">
                                            <h4 class="text-center fw-semibold text-white">Features</h4>
                                            <span class="landing-title"></span>
                                            <div class="demo-screen-skin code-quality" id="dependencies">
                                                <div class="text-center p-0">
                                                    <h2 class="text-center fw-semibold text-white">Features You Can Use in ProLabz</h2>
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-12 px-0">
                                                            <div class="feature-logos mt-5">
                                                                <div class="slide">
                                                                    <img src="<?= $sashPath ?>/assets/images/landing/web/1.png">
                                                                    <h5 class="mt-3 text-white">Data</h5>
                                                                </div>
                                                                <div class="slide">
                                                                    <img src="<?= $sashPath ?>/assets/images/landing/web/2.png">
                                                                    <h5 class="mt-3 text-white">Profile</h5>
                                                                </div>
                                                                <div class="slide">
                                                                    <img src="<?= $sashPath ?>/assets/images/landing/web/3.png">
                                                                    <h5 class="mt-3 text-white">Share</h5>
                                                                </div>
                                                                <div class="slide">
                                                                    <img src="<?= $sashPath ?>/assets/images/landing/web/4.png">
                                                                    <h5 class="mt-3 text-white">Subscriptions</h5>
                                                                </div>
                                                                <div class="slide">
                                                                    <img src="<?= $sashPath ?>/assets/images/landing/web/5.png">
                                                                    <h5 class="mt-3 text-white">Statistics</h5>
                                                                </div>
                                                                <div class="slide">
                                                                    <img src="<?= $sashPath ?>/assets/images/landing/web/6.png">
                                                                    <h5 class="mt-3 text-white">Comparison</h5>
                                                                </div>
                                                                <div class="slide">
                                                                    <img src="<?= $sashPath ?>/assets/images/landing/web/1.png">
                                                                    <h5 class="mt-3 text-white">Tracking Data</h5>
                                                                </div>
                                                                <div class="slide">
                                                                    <img src="<?= $sashPath ?>/assets/images/landing/web/2.png">
                                                                    <h5 class="mt-3 text-white">New Members</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ROW-4 CLOSED -->



                            <!-- ROW-6 OPEN -->
                            <div class="bg-landing section bg-image-style">
                                <div class="container">
                                    <div class="row">
                                        <h4 class="text-center fw-semibold">Choose a plan </h4>
                                        <span class="landing-title"></span>
                                        <h2 class="text-center fw-semibold">Find the <span class="text-primary">Perfect
                                                Plan</span> for your Business.</h2>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="pricing-tabs">

                                            <div class="tab-content">
                                                <div class="tab-pane pb-0 active show" id="annualyear">
                                                    <div class="row d-flex align-items-center justify-content-center">






                                                        <div class="col-lg-4 col-xl-4 col-md-8 col-sm-12">
                                                            <div class="card p-3 pricing-card reveal revealrotate">
                                                                <div class="card-header d-block text-justified pt-2">
                                                                    <p class="fs-18 fw-semibold mb-1">Basic</p>
                                                                    <p class="text-justify fw-semibold mb-1"> <span
                                                                            class="fs-30 me-2">$</span><span
                                                                            class="fs-30 me-1">80</span><span
                                                                            class="fs-25"><span
                                                                                class="op-0-5 text-muted text-20">/</span>
                                                                            year</span></p>
                                                                    <p class="fs-13 mb-1"></p>
                                                                    <p class="fs-13 mb-1 text-secondary">Billed yearly
                                                                        on regular basis!</p>
                                                                </div>
                                                                <div class="card-body pt-2">
                                                                    <ul class="text-justify pricing-body ps-0">
                                                                        <li><i
                                                                                class="mdi mdi-checkbox-marked-circle-outline p-2 fs-16 text-secondary"></i><strong>
                                                                                100</strong> Member</li>
                                                                        <li><i
                                                                                class="mdi mdi-checkbox-marked-circle-outline p-2 fs-16 text-secondary"></i>
                                                                            <strong>200 </strong> Signals
                                                                        </li>
                                                                        <li><i
                                                                                class="mdi mdi-checkbox-marked-circle-outline  p-2 fs-16 text-secondary"></i><strong>
                                                                                Share</strong> Signals and Profile</li>
                                                                        <li class="text-muted"><i
                                                                                class="mdi mdi-close-circle-outline p-2 fs-16 text-gray"></i><strong>
                                                                                Usdt </strong> Management</li>
                                                                        <li class="text-muted"><i
                                                                                class="mdi mdi-close-circle-outline p-2 fs-16 text-gray"></i><strong>
                                                                                Search </strong> Engine</li>

                                                                    </ul>
                                                                </div>
                                                                <div class="card-footer text-center border-top-0 pt-1">

                                                                    <button
                                                                        class="btn btn-lg btn-outline-secondary btn-block <?= (Yii::$app->user->isGuest) ? " notLogged" : "" ?>" id="basic">
                                                                        <span class="ms-4 me-4">Select</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-4 col-md-8 col-sm-12">
                                                            <div
                                                                class="card p-3 border-primary pricing-card advanced reveal revealrotate">
                                                                <div class="card-header d-block text-justified pt-2">
                                                                    <p class="fs-18 fw-semibold mb-1 pe-0">Advanced<span
                                                                            class="tag bg-primary text-white float-end">Recommended</span></p>
                                                                    <p class="text-justify fw-semibold mb-1"> <span
                                                                            class="fs-30 me-2">$</span><span
                                                                            class="fs-30 me-1">150</span><span
                                                                            class="fs-25"><span
                                                                                class="op-0-5 text-muted text-20">/</span>
                                                                            year</span></p>
                                                                    <p class="fs-13 mb-2"></p>
                                                                    <p class="fs-13 mb-1 text-primary">Billed yearly on
                                                                        regular basis!</p>
                                                                </div>
                                                                <div class="card-body pt-2">
                                                                    <ul class="text-justify pricing-body ps-0">
                                                                        <li><i

                                                                                class="mdi mdi-checkbox-marked-circle-outline p-2 fs-16 text-text-primary"></i><strong>
                                                                                300</strong> Member</li>
                                                                        <li><i
                                                                                class="mdi mdi-checkbox-marked-circle-outline p-2 fs-16 text-text-primary"></i>
                                                                            <strong>500 </strong> Signals
                                                                        </li>
                                                                        <li ><i
                                                                                class="mdi mdi-checkbox-marked-circle-outline p-2 fs-16 text-text-primary"></i><strong>
                                                                                Share</strong> Signals and Profile</li>
                                                                        <li ><i
                                                                                class="mdi mdi-checkbox-marked-circle-outline p-2 fs-16 text-text-primary"></i><strong>
                                                                                Usdt </strong> Management</li>
                                                                        <li class="text-muted"><i
                                                                                class="mdi mdi-close-circle-outline p-2 fs-16 text-gray"></i><strong>
                                                                                Search </strong> Engine</li>

                                                                    </ul>
                                                                </div>
                                                                <div class="card-footer text-center border-top-0 pt-1">
                                                                    <button
                                                                        id="advanced"
                                                                        class="btn btn-lg btn-primary-gradient text-white btn-block">
                                                                        <span class="ms-4 me-4">Select</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-4 col-md-8 col-sm-12">
                                                            <div class="card p-3 pricing-card reveal revealrotate">
                                                                <div class="card-header d-block text-justified pt-2">
                                                                    <p class="fs-18 fw-semibold mb-1">Regular</p>
                                                                    <p class="text-justify fw-semibold mb-1"> <span
                                                                            class="fs-30 me-2">$</span><span
                                                                            class="fs-30 me-1">250</span><span
                                                                            class="fs-25"><span
                                                                                class="op-0-5 text-muted text-20">/</span>
                                                                            year</span></p>
                                                                    <p class="fs-13 mb-1"></p>
                                                                    <p class="fs-13 mb-1  text-danger">Billed yearly on
                                                                        regular basis!</p>
                                                                </div>
                                                                <div class="card-body pt-2">
                                                                    <ul class="text-justify pricing-body ps-0">
                                                                        <li><i

                                                                                class="mdi mdi-checkbox-marked-circle-outline text-danger p-2 fs-16"></i><strong>
                                                                                300</strong> Member</li>
                                                                        <li><i
                                                                                class="mdi mdi-checkbox-marked-circle-outline text-danger p-2 fs-16"></i><strong>
                                                                                <strong>500 </strong> Signals
                                                                        </li>
                                                                        <li ><i
                                                                                class="mdi mdi-checkbox-marked-circle-outline text-danger p-2 fs-16"></i><strong>
                                                                                Share</strong> Signals and Profile</li>
                                                                        <li ><i
                                                                                class="mdi mdi-checkbox-marked-circle-outline text-danger p-2 fs-16"></i><strong>
                                                                                Usdt </strong> Management</li>
                                                                        <li ><i
                                                                                class="mdi mdi-checkbox-marked-circle-outline text-danger p-2 fs-16"></i><strong>
                                                                                Search </strong> Engine</li>

                                                                    </ul>
                                                                </div>
                                                                <div class="card-footer text-center border-top-0 pt-1">
                                                                    <button
                                                                        class="btn btn-lg btn-outline-danger btn-block<?= (Yii::$app->user->isGuest) ? " notLogged" : "" ?>" id="regular">
                                                                        <span class="ms-4 me-4">Select</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ROW-6 CLOSED -->

                            <!-- ROW-7 OPEN -->
                            <div class="section" id="Faqs">
                                <div class="container">
                                    <div class="row">
                                        <h4 class="text-center fw-semibold">FAQ'S ?</h4>
                                        <span class="landing-title"></span>
                                        <h2 class="text-center fw-semibold">We are here to help you</h2>
                                        <div class="row justify-content-center">
                                            <p class="col-xl-9 wow fadeInUp text-default sub-text mb-7"
                                               data-wow-delay="0s">

                                            </p>
                                        </div>
                                        <section class="sptb demo-screen-demo" id="faqs">
                                            <div class="row align-items-center">
                                                <div class="col-md-12 col-lg-12">
                                                    <div class="col-md-12 grid-item  px-0">
                                                        <div
                                                            class="card card-collapsed bg-primary-transparent p-0 reveal">
                                                            <div class="card-header grid-link"
                                                                 data-bs-toggle="card-collapse">
                                                                <a href="#"
                                                                   class="card-options-collapse h5 fw-bold card-title mb-0"><span
                                                                        class="me-3 fs-18 fw-bold text-primary">01.</span>Can
                                                                    i get a free trial before purchase ?</a>
                                                            </div>
                                                            <div class="card-body pt-0">
                                                                <p>
                                                                    Lorem ipsum dolor sit amet consectetur adipisicing
                                                                    elit. Iure quos debitis aliquam .
                                                                </p>
                                                                <p class="mt-2 mb-3">
                                                                    <span class="fw-bold">Note: </span>Please Refer
                                                                    support section for more information.
                                                                </p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 grid-item  px-0">
                                                        <div
                                                            class="card card-collapsed bg-success-transparent p-0 reveal">
                                                            <div class="card-header grid-link"
                                                                 data-bs-toggle="card-collapse">
                                                                <a href="#"
                                                                   class="card-options-collapse  h5 fw-bold card-title mb-0"><span
                                                                        class="me-3 fs-18 fw-bold text-success">02.</span>How can i upgrade my package?</a>
                                                            </div>
                                                            <div class="card-body pt-0">
                                                                <p>
                                                                    Lorem ipsum dolor sit amet consectetur adipisicing
                                                                    elit. Iure quos debitis aliquam.
                                                                </p>
                                                                <p class="mt-2 mb-3">
                                                                    <span class="fw-bold">Note: </span>Please Refer
                                                                    support section for more information.
                                                                </p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 grid-item  px-0">
                                                        <div
                                                            class="card card-collapsed bg-secondary-transparent p-0 reveal">
                                                            <div class="card-header grid-link"
                                                                 data-bs-toggle="card-collapse">
                                                                <a href="#"
                                                                   class="card-options-collapse  h5 fw-bold card-title mb-0"><span
                                                                        class="me-3 fs-18 fw-bold text-secondary">03.</span>How can i delete a members ?</a>
                                                            </div>
                                                            <div class="card-body pt-0">
                                                                <p>
                                                                    Lorem ipsum dolor sit amet consectetur adipisicing
                                                                    elit. Iure quos debitis aliquam.
                                                                </p>
                                                                <p class="mt-2 mb-3">
                                                                    <span class="fw-bold">Note: </span>Please Refer
                                                                    support section for more information.
                                                                </p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 grid-item  px-0">
                                                        <div
                                                            class="card card-collapsed bg-warning-transparent p-0 reveal">
                                                            <div class="card-header grid-link"
                                                                 data-bs-toggle="card-collapse">
                                                                <a href="#"
                                                                   class="card-options-collapse  h5 fw-bold card-title mb-0"><span
                                                                        class="me-3 fs-18 fw-bold text-warning">04.</span>How can i freeze a member ?</a>
                                                            </div>
                                                            <div class="card-body pt-0">
                                                                <p>
                                                                    Lorem ipsum dolor sit amet consectetur adipisicing
                                                                    elit. Iure quos debitis aliquam.
                                                                </p>
                                                                <p class="mt-2 mb-3">
                                                                    <span class="fw-bold">Note: </span>Please Refer
                                                                    support section for more information.
                                                                </p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 grid-item  px-0">
                                                        <div
                                                            class="card card-collapsed bg-danger-transparent p-0 reveal">
                                                            <div class="card-header grid-link"
                                                                 data-bs-toggle="card-collapse">
                                                                <a href="#"
                                                                   class="card-options-collapse  h5 fw-bold card-title mb-0"><span
                                                                        class="me-3 fs-18 fw-bold text-danger">05.</span>Do
                                                                    you provide support ?</a>
                                                            </div>
                                                            <div class="card-body pt-0">
                                                                <p>
                                                                    Lorem ipsum dolor sit amet consectetur adipisicing
                                                                    elit. Iure quos debitis aliquam.
                                                                </p>
                                                                <p class="mt-2 mb-3">
                                                                    <span class="fw-bold">Note: </span>Please Refer
                                                                    support section for more information.
                                                                </p>
                                                                <a href="javascript:void(0)"
                                                                   class="btn btn-outline-danger tx-13">Click here</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <!-- ROW-7 CLOSED -->





                            <!-- ROW-10 OPEN -->
                            <div class="bg-image-landing section pb-0" id="Contact">
                                <div class="container">
                                    <div class="">
                                        <div class="card card-shadow reveal">
                                            <h4 class="text-center fw-semibold mt-7">Contact</h4>
                                            <span class="landing-title"></span>
                                            <h2 class="text-center fw-semibold mb-0 px-2">Get in Touch with <span
                                                    class="text-primary">US.</span></h2>
                                            <div class="card-body p-5 pb-6 text-dark">
                                                <div class="statistics-info p-4">
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-9">
                                                            <div class="mt-3">
                                                                <div class="text-dark">
                                                                    <div class="services-statistics reveal my-5">
                                                                        <div class="row text-center">


                                                                            <div class="col-xl-12 col-md-12 col-lg-12">
                                                                                <div class="card">
                                                                                    <div class="card-body p-0">
                                                                                        <div class="counter-statuss">
                                                                                            <div
                                                                                                class="counter-icon bg-success-transparent box-shadow-success">
                                                                                                <i
                                                                                                    class="fe fe-mail text-success fs-23"></i>
                                                                                            </div>
                                                                                            <h4
                                                                                                class="mb-2 fw-semibold">
                                                                                                Contact</h4>
                                                                                            <p class="mb-0">
                                                                                                contact@pro-labz.com</p>
                                                                                            <p>pro-labz.com</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-9">
                                                            <div class="">
                                                                <form class="form-horizontal reveal revealrotate m-t-20"
                                                                      action="index.html">
                                                                    <div class="form-group">
                                                                        <div class="col-xs-12">
                                                                            <input class="form-control" type="text"
                                                                                   required="" placeholder="Username*">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-12">
                                                                            <input class="form-control" type="email"
                                                                                   required="" placeholder="Email*">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-12">
                                                                            <textarea class="form-control"
                                                                                      rows="5">Your Comment*</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <a href="javascript:void(0)"
                                                                           class="btn btn-primary btn-rounded  waves-effect waves-light">Submit</a>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ROW-10 CLOSED -->


                        </div>
                    </div>
                    <!-- CONTAINER CLOSED-->
                </div>
            </div>
            <!--app-content closed-->
        </div>

        <!-- FOOTER OPEN -->
        <div class="demo-footer">
            <div class="container">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="top-footer">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12 col-md-12 reveal revealleft">

                                        <h6 class="pb-3">
                                            What can you do with Pro-Labz? </h6>
                                        <p>
                                        <h5>
                                            ● Edit and track your members, VIP Channel and
                                            Signals
                                        </h5>
                                        <h5>
                                            ●Share and save your profits and data
                                        </h5>
                                        <h5>
                                            ●Attract new customers
                                        </h5>
                                        </p>


                                    </div>

                                    <div class="col-lg-2 col-sm-6 col-md-4 reveal revealleft">
                                        <h6>Pages</h6>
                                        <ul class="list-unstyled mb-5 mb-lg-0">
                                            <li><a href="index.html">Dashboard</a></li>
                                            <li><a href="alerts.html">Elements</a></li>
                                            <li><a href="form-elements.html">Forms</a></li>
                                            <li><a href="charts.html">Charts</a></li>
                                            <li><a href="datatable.html">Tables</a></li>
                                            <li><a href="file-attachments.html">Other Pages</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-2 col-sm-6 col-md-4 reveal revealleft">
                                        <h6>Information</h6>
                                        <ul class="list-unstyled mb-5 mb-lg-0">
                                            <li><a href="about.html">Our Team</a></li>
                                            <li><a href="about.html">Contact US</a></li>
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="services.html">Services</a></li>
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="terms.html">Terms and Services</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4 col-sm-12 col-md-4 reveal revealleft">
                                        <div class="">
                                            <a href="index.html"><img loading="lazy" alt="" class="logo-2 mb-3"
                                                                      src="<?= $sashPath ?>/assets/images/brand/logo-3.png">sss</a>
                                            <a href="index.html"><img src="<?= $sashPath ?>/assets/images/brand/logo.png"
                                                                      class="logo-3" alt="logo">sss</a>
                                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                                dolore eu fugiat nulla pariatur Excepteur sint occaecat.</p>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" class="form-control"
                                                           placeholder="Enter your email"
                                                           aria-label="Example text with button addon"
                                                           aria-describedby="button-addon1">
                                                    <button class="btn btn-primary" type="button"
                                                            id="button-addon2">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-list mt-6">
                                            <button type="button" class="btn btn-icon rounded-pill"><i
                                                    class="fa fa-facebook"></i></button>
                                            <button type="button" class="btn btn-icon rounded-pill"><i
                                                    class="fa fa-youtube"></i></button>
                                            <button type="button" class="btn btn-icon rounded-pill"><i
                                                    class="fa fa-twitter"></i></button>
                                            <button type="button" class="btn btn-icon rounded-pill"><i
                                                    class="fa fa-instagram"></i></button>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <footer class="main-footer px-0 pb-0 text-center">
                                <div class="row ">
                                    <div class="col-md-12 col-sm-12">
                                        Copyright © 2022 <span id="year"></span> <a href="javascript:void(0)">Prolabz</a>.
                                        <span class="fa fa-heart text-danger"></span> <a
                                            href="javascript:void(0)"> </a> All rights reserved.
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FOOTER CLOSED -->
    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>






    <?php JSRegister::begin(); ?>
    <script>

        $(".notLogged").click(function () {
            window.location.href = "<?= Url::toRoute('site/login') ?>";
        });
        $("#basic").click(function () {
            if ($("#basic").hasClass("notLogged")) {
            } else {

                $.ajax({
                    url: "https://api.nowpayments.io/v1/payment/",
//                    url: "https://api-sandbox.nowpayments.io/v1/payment",
                    beforeSend: function (request) {
                        request.setRequestHeader("x-api-key", "H8EGMZ3-5534RCE-GSFTSBK-CVC6GV8");
                    },
                    type: "POST", data: {
                        'price_amount':<?= $basic["price"] ?>,
                        'price_currency': "usd",
                        'pay_amount': <?= $basic["price"] ?>,
                        'pay_currency': "USDTTRC20",
                        'ipn_callback_url': "https://nowpayments.io",
                        'order_id': "1",
                        'order_description': '<?= $basic["description"] ?>',
                        'case': "success",
                    },
                    success: function (response) {
                        console.log(response);
                        $.ajax({
                            url: '<?php echo Url::toRoute("/site/create-payment") ?>',
                            type: "POST",
                            data: {
                                response
                            }
                            ,
                            success: function (data) {
                                console.log(data);
                                window.location.href = "<?= Url::toRoute('site/payment-qr') ?>" + '?pay_address=' +
                                        data["pay_address"] + "&order_id=" + data["order_id"] + "&r_user=" + data["r_user"];
                            },
                            error: function (errormessage) {
                                console.log("not working");
                            }
                        });
                    },
                    error: function (errormessage) {
                        console.log("not working");
                    }
                });
            }

        });
        $("#advanced").click(function () {
            if ($("#advanced").hasClass("notLogged")) {
            } else {
                $.ajax({
                    url: "https://api.nowpayments.io/v1/payment/",
//                    url: "https://api-sandbox.nowpayments.io/v1/payment",
                    beforeSend: function (request) {
                        request.setRequestHeader("x-api-key", "H8EGMZ3-5534RCE-GSFTSBK-CVC6GV8");
                    },
                    type: "POST", data: {
                        'price_amount':<?= $advanced["price"] ?>,
                        'price_currency': "usd",
                        'pay_amount': <?= $advanced["price"] ?>,
                        'pay_currency': "USDTTRC20",
                        'ipn_callback_url': "https://nowpayments.io",
                        'order_id': "2",
                        'order_description': '<?= $advanced["description"] ?>',
                        'case': "success",
                    },
                    success: function (response) {
                        console.log(response);
                        $.ajax({
                            url: '<?php echo Url::toRoute("/site/create-payment") ?>',
                            type: "POST",
                            data: {
                                response
                            }
                            ,
                            success: function (data) {
                                console.log(data);
                                window.location.href = "<?= Url::toRoute('site/payment-qr') ?>" + '?pay_address=' +
                                        data["pay_address"] + "&order_id=" + data["order_id"] + "&r_user=" + data["r_user"];
                            },
                            error: function (errormessage) {
                                console.log("not working");
                            }
                        });
                    },
                    error: function (errormessage) {
                        console.log("not working");
                    }
                });
            }

        });
        $("#regular").click(function () {
            if ($("#regular").hasClass("notLogged")) {
            } else {
                $.ajax({
                    url: "https://api.nowpayments.io/v1/payment/",
//                    url: "https://api-sandbox.nowpayments.io/v1/payment",
                    beforeSend: function (request) {
                        request.setRequestHeader("x-api-key", "H8EGMZ3-5534RCE-GSFTSBK-CVC6GV8");
                    },
                    type: "POST", data: {
                        'price_amount':<?= $regular["price"] ?>,
                        'price_currency': "usd",
                        'pay_amount': <?= $regular["price"] ?>,
                        'pay_currency': "USDTTRC20",
                        'ipn_callback_url': "https://nowpayments.io",
                        'order_id': "3",
                        'order_description': '<?= $regular["description"] ?>',
                        'case': "success",
                    },
                    success: function (response) {
                        console.log(response);
                        $.ajax({
                            url: '<?php echo Url::toRoute("/site/create-payment") ?>',
                            type: "POST",
                            data: {
                                response
                            }
                            ,
                            success: function (data) {
                                console.log(data);
                                window.location.href = "<?= Url::toRoute('site/payment-qr') ?>" + '?pay_address=' +
                                        data["pay_address"] + "&order_id=" + data["order_id"] + "&r_user=" + data["r_user"];
                            },
                            error: function (errormessage) {
                                console.log("not working");
                            }
                        });
                    },
                    error: function (errormessage) {
                        console.log("not working");
                    }
                });
            }


        });





    </script>
    <?php JSRegister::end(); ?>


    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
