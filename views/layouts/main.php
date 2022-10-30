<?php
/** @var View $this */

/** @var string $content */
use app\assets\AppAsset;
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
                                        <!-- SIDE-MENU -->
                                        <div class="dropdown d-flex profile-1">
                                            <a href="javascript:void(0)" data-bs-toggle="dropdown" class="nav-link leading-none d-flex">
                                                <img src="<?= $sashPath ?>/assets/images/users/21.jpg" alt="profile-user"
                                                     class="avatar  profile-user brround cover-image">
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <div class="drop-heading">
                                                    <div class="text-center">
                                                        <h5 class="text-dark mb-0 fs-14 fw-semibold"><?= Yii::$app->user->identity->username ?></h5>
                                                        <!--<small class="text-muted">Senior Admin</small>-->
                                                    </div>
                                                </div>
                                                <div class="dropdown-divider m-0"></div>
                                                <a class="dropdown-item" href="<?= Url::to(['profile/index']) ?>">
                                                    <i class="dropdown-icon fe fe-user"></i>Profile
                                                </a>
                                                <div class="dropdown-divider m-0"></div>
                                                <a class="dropdown-item" href="<?= Url::to(['profile/edit', 'userId' => Yii::$app->user->id]) ?>">
                                                    <i class="dropdown-icon fe fe-user"></i>Edit Profile
                                                </a>
                                                <!--                                                    <a class="dropdown-item" href="email-inbox.html">
                                                                                                        <i class="dropdown-icon fe fe-mail"></i> Inbox
                                                                                                        <span class="badge bg-danger rounded-pill float-end">5</span>
                                                                                                    </a>-->
                                                <!--                                                    <a class="dropdown-item" href="lockscreen.html">
                                                                                                        <i class="dropdown-icon fe fe-lock"></i> Lockscreen
                                                                                                    </a>-->
                                                <!--                                                    <a class="dropdown-item" href="login.html">
                                                                                                        <i class="dropdown-icon fe fe-alert-circle"></i> Sign out
                                                                                                    </a>-->
                                                <!--<a class="dropdown-item" href="">-->
                                                <!--<li class="dropdown-icon fe fe-alert-circle">-->


                                                <?php
                                                echo Html::beginForm(['/site/logout', 'id' => 'form-logout'])
                                                ?>
                                                <button type = "submit" class = "dropdown-item"><li class = "dropdown-icon fe fe-alert-circle"></li>Sign out</button>
                                                <?php
                                                echo Html::endForm()
                                                ?>
                                                <!--</li>-->
                                                <!--</a>-->
                                            </div>

                                        </div>
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
                    <a class="header-brand1" style ="color:white;font-size: 30px;"href="index.html">
                        <img style ="width:60%"src="<?= $sashPath ?>/assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
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
                            <a class="side-menu__item has-link" data-bs-toggle="slide" href="<?= Url::to(['site/dashboard']) ?>"><i
                                    class="side-menu__icon fe fe-home"></i><span
                                    class="side-menu__label">Dashboard</span></a>
                        </li>
                        <li class="sub-category">
                            <h3>Settings</h3>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                    class="side-menu__icon fa fa-users"></i><span
                                    class="side-menu__label">Members</span><i
                                    class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li class="side-menu-label1"><a href="javascript:void(0)">Members</a></li>
                                <li><a href="<?= Url::to(['members/index']) ?>" class="slide-item"> Members</a></li>
                                <li><a href="<?= Url::to(['members/members-crypto']) ?>" class="slide-item"> Cypto Members</a></li>
                                <li><a href="<?= Url::to(['members/members-forex']) ?>" class="slide-item"> Forex Members</a></li>
                                <li><a href="<?= Url::to(['members/members-forex-and-crypto']) ?>" class="slide-item"> Forex And Crypto Members</a></li>

                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                    class="side-menu__icon fe fe-slack"></i><span
                                    class="side-menu__label">Signals</span><i
                                    class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li class="side-menu-label1"><a href="javascript:void(0)">Members</a></li>
                                <li><a href="<?= Url::to(['crypto-signals/index']) ?>" class="slide-item"> Crypto Signals</a></li>
                                <li><a href="<?= Url::to(['forex-signals/index']) ?>" class="slide-item"> Forex Signals</a></li>

                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                    class="side-menu__icon fe fe-slack"></i><span
                                    class="side-menu__label">Usdt</span><i
                                    class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li class="side-menu-label1"><a href="javascript:void(0)">Usdt</a></li>
                                <li><a href="<?= Url::to(['usdt/index']) ?>" class="slide-item">All Usdt Trades</a></li>


                            </ul>
                        </li>
                        <?php
                        if (Yii::$app->user->can("Administrator")) {
                            ?>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                        class="side-menu__icon fe fe-slack"></i><span
                                        class="side-menu__label">Settings</span><i
                                        class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Members</a></li>
                                    <li><a href="<?= Url::to(['crypto-coin/index']) ?>" class="slide-item"> Crypto Coin</a></li>
                                    <li><a href="<?= Url::to(['crypto-pair/index']) ?>" class="slide-item"> Crypto Pair</a></li>
                                    <li><a href="<?= Url::to(['crypto-type/index']) ?>" class="slide-item"> Crypto Type</a></li>
                                    <li><a href="<?= Url::to(['crypto-target/index']) ?>" class="slide-item"> Crypto Target</a></li>
                                    <li><a href="<?= Url::to(['crypto-result/index']) ?>" class="slide-item"> Crypto Result</a></li>

                                    <li><a href="<?= Url::to(['forex-ticker/index']) ?>" class="slide-item"> Forex Ticker</a></li>
                                    <li><a href="<?= Url::to(['forex-type/index']) ?>" class="slide-item"> Forex Type</a></li>
                                    <li><a href="<?= Url::to(['forex-target/index']) ?>" class="slide-item"> Forex Target</a></li>
                                    <li><a href="<?= Url::to(['forex-result/index']) ?>" class="slide-item"> Forex Result</a></li>
                                    <li><a href="<?= Url::to(['forex-pips/index']) ?>" class="slide-item"> Forex Pips</a></li>

                                </ul>
                            </li>
                            <?php
                        }
                        ?>

                        <!--                        <li class="sub-category">
                                                    <h3>Profile</h3>
                                                </li>
                                                <li class="slide">
                                                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="<?= Url::to(['profile/index']) ?>"><i
                                                            class="side-menu__icon fe fe-home"></i><span
                                                            class="side-menu__label">profile test</span></a>
                                                </li>-->

                        <li class="sub-category">
                            <h3>UI Kit</h3>
                        </li>


                        <li>
                            <a class="side-menu__item has-link" href="<?= Url::to(['site/landing']) ?>"><i
                                    class="side-menu__icon fe fe-zap"></i><span
                                    class="side-menu__label">Landing Page</span>
                                    <!--<span class="badge bg-green br-5 side-badge blink-text pb-1">New</span>-->
                            </a>


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

    <!-- Sidebar-right -->
    <div class="sidebar sidebar-right sidebar-animate">
        <div class="panel panel-primary card mb-0 shadow-none border-0">
            <div class="tab-menu-heading border-0 d-flex p-3">
                <div class="card-title mb-0"><i class="fe fe-bell me-2"></i><span
                        class=" pulse"></span>Notifications</div>
                <div class="card-options ms-auto">
                    <a href="javascript:void(0);" class="sidebar-icon text-end float-end me-3 mb-1"
                       data-bs-toggle="sidebar-right" data-target=".sidebar-right"><i
                            class="fe fe-x text-white"></i></a>
                </div>
            </div>
            <div class="panel-body tabs-menu-body latest-tasks p-0 border-0">
                <div class="tabs-menu border-bottom">
                    <!-- Tabs -->
                    <ul class="nav panel-tabs">
                        <li class=""><a href="#side1" class="active" data-bs-toggle="tab"><i
                                    class="fe fe-settings me-1"></i>Feeds</a></li>
                        <li><a href="#side2" data-bs-toggle="tab"><i class="fe fe-message-circle"></i> Chat</a></li>
                        <li><a href="#side3" data-bs-toggle="tab"><i class="fe fe-anchor me-1"></i>Timeline</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="side1">
                        <div class="p-3 fw-semibold ps-5">Feeds</div>
                        <div class="card-body pt-2">
                            <div class="browser-stats">
                                <div class="row mb-4">
                                    <div class="col-sm-2 mb-sm-0 mb-3">
                                        <span class="feeds avatar-circle brround bg-primary-transparent"><i
                                                class="fe fe-user text-primary"></i></span>
                                    </div>
                                    <div class="col-sm-10 ps-sm-0">
                                        <div class="d-flex align-items-end justify-content-between ms-2">
                                            <h6 class="">New user registered</h6>
                                            <div>
                                                <a href="javascript:void(0)"><i class="fe fe-settings me-1"></i></a>
                                                <a href="javascript:void(0)"><i class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-2 mb-sm-0 mb-3">
                                        <span
                                            class="feeds avatar-circle avatar-circle-secondary brround bg-secondary-transparent"><i
                                                class="fe fe-shopping-cart text-secondary"></i></span>
                                    </div>
                                    <div class="col-sm-10 ps-sm-0">
                                        <div class="d-flex align-items-end justify-content-between ms-2">
                                            <h6 class="">New order delivered</h6>
                                            <div>
                                                <a href="javascript:void(0)"><i class="fe fe-settings me-1"></i></a>
                                                <a href="javascript:void(0)"><i class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-2 mb-sm-0 mb-3">
                                        <span
                                            class="feeds avatar-circle avatar-circle-danger brround bg-danger-transparent"><i
                                                class="fe fe-bell text-danger"></i></span>
                                    </div>
                                    <div class="col-sm-10 ps-sm-0">
                                        <div class="d-flex align-items-end justify-content-between ms-2">
                                            <h6 class="">You have pending tasks</h6>
                                            <div>
                                                <a href="javascript:void(0)"><i class="fe fe-settings me-1"></i></a>
                                                <a href="javascript:void(0)"><i class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-2 mb-sm-0 mb-3">
                                        <span
                                            class="feeds avatar-circle avatar-circle-warning brround bg-warning-transparent"><i
                                                class="fe fe-gitlab text-warning"></i></span>
                                    </div>
                                    <div class="col-sm-10 ps-sm-0">
                                        <div class="d-flex align-items-end justify-content-between ms-2">
                                            <h6 class="">New version arrived</h6>
                                            <div>
                                                <a href="javascript:void(0)"><i class="fe fe-settings me-1"></i></a>
                                                <a href="javascript:void(0)"><i class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-2 mb-sm-0 mb-3">
                                        <span
                                            class="feeds avatar-circle avatar-circle-pink brround bg-pink-transparent"><i
                                                class="fe fe-database text-pink"></i></span>
                                    </div>
                                    <div class="col-sm-10 ps-sm-0">
                                        <div class="d-flex align-items-end justify-content-between ms-2">
                                            <h6 class="">Server #1 overloaded</h6>
                                            <div>
                                                <a href="javascript:void(0)"><i class="fe fe-settings me-1"></i></a>
                                                <a href="javascript:void(0)"><i class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2 mb-sm-0 mb-3">
                                        <span
                                            class="feeds avatar-circle avatar-circle-info brround bg-info-transparent"><i
                                                class="fe fe-check-circle text-info"></i></span>
                                    </div>
                                    <div class="col-sm-10 ps-sm-0">
                                        <div class="d-flex align-items-end justify-content-between ms-2">
                                            <h6 class="">New project launched</h6>
                                            <div>
                                                <a href="javascript:void(0)"><i class="fe fe-settings me-1"></i></a>
                                                <a href="javascript:void(0)"><i class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 fw-semibold ps-5">Settings</div>
                        <div class="card-body pt-2">
                            <div class="browser-stats">
                                <div class="row mb-4">
                                    <div class="col-sm-2 mb-sm-0 mb-3">
                                        <span class="feeds avatar-circle brround bg-primary-transparent"><i
                                                class="fe fe-settings text-primary"></i></span>
                                    </div>
                                    <div class="col-sm-10 ps-sm-0">
                                        <div class="d-flex align-items-end justify-content-between ms-2">
                                            <h6 class="">General Settings</h6>
                                            <div>
                                                <a href="javascript:void(0)"><i class="fe fe-settings me-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-2 mb-sm-0 mb-3">
                                        <span
                                            class="feeds avatar-circle avatar-circle-secondary brround bg-secondary-transparent"><i
                                                class="fe fe-map-pin text-secondary"></i></span>
                                    </div>
                                    <div class="col-sm-10 ps-sm-0">
                                        <div class="d-flex align-items-end justify-content-between ms-2">
                                            <h6 class="">Map Settings</h6>
                                            <div>
                                                <a href="javascript:void(0)"><i class="fe fe-settings me-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-2 mb-sm-0 mb-3">
                                        <span
                                            class="feeds avatar-circle avatar-circle-danger brround bg-danger-transparent"><i
                                                class="fe fe-headphones text-danger"></i></span>
                                    </div>
                                    <div class="col-sm-10 ps-sm-0">
                                        <div class="d-flex align-items-end justify-content-between ms-2">
                                            <h6 class="">Support Settings</h6>
                                            <div>
                                                <a href="javascript:void(0)"><i class="fe fe-settings me-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-2 mb-sm-0 mb-3">
                                        <span
                                            class="feeds avatar-circle avatar-circle-warning brround bg-warning-transparent"><i
                                                class="fe fe-credit-card text-warning"></i></span>
                                    </div>
                                    <div class="col-sm-10 ps-sm-0">
                                        <div class="d-flex align-items-end justify-content-between ms-2">
                                            <h6 class="">Payment Settings</h6>
                                            <div>
                                                <a href="javascript:void(0)"><i class="fe fe-settings me-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-2 mb-sm-0 mb-3">
                                        <span
                                            class="feeds avatar-circle avatar-circle-pink brround bg-pink-transparent"><i
                                                class="fe fe-bell text-pink"></i></span>
                                    </div>
                                    <div class="col-sm-10 ps-sm-0">
                                        <div class="d-flex align-items-end justify-content-between ms-2">
                                            <h6 class="">Notification Settings</h6>
                                            <div>
                                                <a href="javascript:void(0)"><i class="fe fe-settings me-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="side2">
                        <div class="list-group list-group-flush">
                            <div class="pt-3 fw-semibold ps-5">Today</div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <span class="avatar avatar-md brround cover-image"
                                          data-bs-image-src="<?= $sashPath ?>/assets/images/users/2.jpg"></span>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <div class="fw-semibold text-dark" data-bs-toggle="modal"
                                             data-target="#chatmodel">Addie Minstra</div>
                                        <p class="mb-0 fs-12 text-muted"> Hey! there I' am available.... </p>
                                    </a>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <span class="avatar avatar-md brround cover-image"
                                          data-bs-image-src="<?= $sashPath ?>/assets/images/users/11.jpg"><span
                                            class="avatar-status bg-success"></span></span>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <div class="fw-semibold text-dark" data-bs-toggle="modal"
                                             data-target="#chatmodel">Rose Bush</div>
                                        <p class="mb-0 fs-12 text-muted"> Okay...I will be waiting for you </p>
                                    </a>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <span class="avatar avatar-md brround cover-image"
                                          data-bs-image-src="<?= $sashPath ?>/assets/images/users/10.jpg"></span>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <div class="fw-semibold text-dark" data-bs-toggle="modal"
                                             data-target="#chatmodel">Claude Strophobia</div>
                                        <p class="mb-0 fs-12 text-muted"> Hi we can explain our new project......
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <span class="avatar avatar-md brround cover-image"
                                          data-bs-image-src="<?= $sashPath ?>/assets/images/users/13.jpg"></span>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <div class="fw-semibold text-dark" data-bs-toggle="modal"
                                             data-target="#chatmodel">Eileen Dover</div>
                                        <p class="mb-0 fs-12 text-muted"> New product Launching... </p>
                                    </a>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <span class="avatar avatar-md brround cover-image"
                                          data-bs-image-src="<?= $sashPath ?>/assets/images/users/12.jpg"><span
                                            class="avatar-status bg-success"></span></span>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <div class="fw-semibold text-dark" data-bs-toggle="modal"
                                             data-target="#chatmodel">Willie Findit</div>
                                        <p class="mb-0 fs-12 text-muted"> Okay...I will be waiting for you </p>
                                    </a>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <span class="avatar avatar-md brround cover-image"
                                          data-bs-image-src="<?= $sashPath ?>/assets/images/users/15.jpg"></span>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <div class="fw-semibold text-dark" data-bs-toggle="modal"
                                             data-target="#chatmodel">Manny Jah</div>
                                        <p class="mb-0 fs-12 text-muted"> Hi we can explain our new project......
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <span class="avatar avatar-md brround cover-image"
                                          data-bs-image-src="<?= $sashPath ?>/assets/images/users/4.jpg"></span>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <div class="fw-semibold text-dark" data-bs-toggle="modal"
                                             data-target="#chatmodel">Cherry Blossom</div>
                                        <p class="mb-0 fs-12 text-muted"> Hey! there I' am available....</p>
                                    </a>
                                </div>
                            </div>
                            <div class="pt-3 fw-semibold ps-5">Yesterday</div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <span class="avatar avatar-md brround cover-image"
                                          data-bs-image-src="<?= $sashPath ?>/assets/images/users/7.jpg"><span
                                            class="avatar-status bg-success"></span></span>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <div class="fw-semibold text-dark" data-bs-toggle="modal"
                                             data-target="#chatmodel">Simon Sais</div>
                                        <p class="mb-0 fs-12 text-muted">Schedule Realease...... </p>
                                    </a>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <span class="avatar avatar-md brround cover-image"
                                          data-bs-image-src="<?= $sashPath ?>/assets/images/users/9.jpg"></span>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <div class="fw-semibold text-dark" data-bs-toggle="modal"
                                             data-target="#chatmodel">Laura Biding</div>
                                        <p class="mb-0 fs-12 text-muted"> Hi we can explain our new project......
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <span class="avatar avatar-md brround cover-image"
                                          data-bs-image-src="<?= $sashPath ?>/assets/images/users/2.jpg"><span
                                            class="avatar-status bg-success"></span></span>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <div class="fw-semibold text-dark" data-bs-toggle="modal"
                                             data-target="#chatmodel">Addie Minstra</div>
                                        <p class="mb-0 fs-12 text-muted">Contact me for details....</p>
                                    </a>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <span class="avatar avatar-md brround cover-image"
                                          data-bs-image-src="<?= $sashPath ?>/assets/images/users/9.jpg"></span>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <div class="fw-semibold text-dark" data-bs-toggle="modal"
                                             data-target="#chatmodel">Ivan Notheridiya</div>
                                        <p class="mb-0 fs-12 text-muted"> Hi we can explain our new project......
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <span class="avatar avatar-md brround cover-image"
                                          data-bs-image-src="<?= $sashPath ?>/assets/images/users/14.jpg"></span>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <div class="fw-semibold text-dark" data-bs-toggle="modal"
                                             data-target="#chatmodel">Dulcie Veeta</div>
                                        <p class="mb-0 fs-12 text-muted"> Okay...I will be waiting for you </p>
                                    </a>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <span class="avatar avatar-md brround cover-image"
                                          data-bs-image-src="<?= $sashPath ?>/assets/images/users/11.jpg"></span>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <div class="fw-semibold text-dark" data-bs-toggle="modal"
                                             data-target="#chatmodel">Florinda Carasco</div>
                                        <p class="mb-0 fs-12 text-muted">New product Launching...</p>
                                    </a>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <span class="avatar avatar-md brround cover-image"
                                          data-bs-image-src="<?= $sashPath ?>/assets/images/users/4.jpg"><span
                                            class="avatar-status bg-success"></span></span>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <div class="fw-semibold text-dark" data-bs-toggle="modal"
                                             data-target="#chatmodel">Cherry Blossom</div>
                                        <p class="mb-0 fs-12 text-muted">cherryblossom@gmail.com</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="side3">
                        <ul class="task-list timeline-task">
                            <li class="d-sm-flex mt-4">
                                <div>
                                    <i class="task-icon1"></i>
                                    <h6 class="fw-semibold">Task Finished<span
                                            class="text-muted fs-11 mx-2 fw-normal">09 July 2021</span></h6>
                                    <p class="text-muted fs-12">Adam Berry finished task on<a href="javascript:void(0)"
                                                                                              class="fw-semibold"> Project Management</a></p>
                                </div>
                                <div class="ms-auto d-md-flex me-3">
                                    <a href="javascript:void(0)" class="text-muted me-2"><span class="fe fe-edit"></span></a>
                                    <a href="javascript:void(0)" class="text-muted"><span class="fe fe-trash-2"></span></a>
                                </div>
                            </li>
                            <li class="d-sm-flex">
                                <div>
                                    <i class="task-icon1"></i>
                                    <h6 class="fw-semibold">New Comment<span
                                            class="text-muted fs-11 mx-2 fw-normal">05 July 2021</span></h6>
                                    <p class="text-muted fs-12">Victoria commented on Project <a href="javascript:void(0)"
                                                                                                 class="fw-semibold"> AngularJS Template</a></p>
                                </div>
                                <div class="ms-auto d-md-flex me-3">
                                    <a href="javascript:void(0)" class="text-muted me-2"><span class="fe fe-edit"></span></a>
                                    <a href="javascript:void(0)" class="text-muted"><span class="fe fe-trash-2"></span></a>
                                </div>
                            </li>
                            <li class="d-sm-flex">
                                <div>
                                    <i class="task-icon1"></i>
                                    <h6 class="fw-semibold">New Comment<span
                                            class="text-muted fs-11 mx-2 fw-normal">25 June 2021</span></h6>
                                    <p class="text-muted fs-12">Victoria commented on Project <a href="javascript:void(0)"
                                                                                                 class="fw-semibold"> AngularJS Template</a></p>
                                </div>
                                <div class="ms-auto d-md-flex me-3">
                                    <a href="javascript:void(0)" class="text-muted me-2"><span class="fe fe-edit"></span></a>
                                    <a href="javascript:void(0)" class="text-muted"><span class="fe fe-trash-2"></span></a>
                                </div>
                            </li>
                            <li class="d-sm-flex">
                                <div>
                                    <i class="task-icon1"></i>
                                    <h6 class="fw-semibold">Task Overdue<span
                                            class="text-muted fs-11 mx-2 fw-normal">14 June 2021</span></h6>
                                    <p class="text-muted mb-0 fs-12">Petey Cruiser finished task <a href="javascript:void(0)"
                                                                                                    class="fw-semibold"> Integrated management</a></p>
                                </div>
                                <div class="ms-auto d-md-flex me-3">
                                    <a href="javascript:void(0)" class="text-muted me-2"><span class="fe fe-edit"></span></a>
                                    <a href="javascript:void(0)" class="text-muted"><span class="fe fe-trash-2"></span></a>
                                </div>
                            </li>
                            <li class="d-sm-flex">
                                <div>
                                    <i class="task-icon1"></i>
                                    <h6 class="fw-semibold">Task Overdue<span
                                            class="text-muted fs-11 mx-2 fw-normal">29 June 2021</span></h6>
                                    <p class="text-muted mb-0 fs-12">Petey Cruiser finished task <a href="javascript:void(0)"
                                                                                                    class="fw-semibold"> Integrated management</a></p>
                                </div>
                                <div class="ms-auto d-md-flex me-3">
                                    <a href="javascript:void(0)" class="text-muted me-2"><span class="fe fe-edit"></span></a>
                                    <a href="javascript:void(0)" class="text-muted"><span class="fe fe-trash-2"></span></a>
                                </div>
                            </li>
                            <li class="d-sm-flex">
                                <div>
                                    <i class="task-icon1"></i>
                                    <h6 class="fw-semibold">Task Finished<span
                                            class="text-muted fs-11 mx-2 fw-normal">09 July 2021</span></h6>
                                    <p class="text-muted fs-12">Adam Berry finished task on<a href="javascript:void(0)"
                                                                                              class="fw-semibold"> Project Management</a></p>
                                </div>
                                <div class="ms-auto d-md-flex me-3">
                                    <a href="javascript:void(0)" class="text-muted me-2"><span class="fe fe-edit"></span></a>
                                    <a href="javascript:void(0)" class="text-muted"><span class="fe fe-trash-2"></span></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/Sidebar-right-->



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
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" crossorigin="anonymous"></script>

</body>

</html>
<?php $this->endPage() ?>
