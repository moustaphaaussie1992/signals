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
                        <div class="main-header-center ms-3 d-none d-lg-block">
                            <input type="text" class="form-control" id="typehead" placeholder="Search for results...">
                            <button class="btn px-0 pt-2"><i class="fe fe-search" aria-hidden="true"></i></button>
                        </div>
                        <div class="d-flex order-lg-2 ms-auto header-right-icons">
                            <!-- SEARCH -->
                            <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                    aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                            </button>
                            <div class="navbar navbar-collapse responsive-navbar p-0">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                    <div class="d-flex order-lg-2">
                                        <div class="dropdown d-lg-none d-flex">
                                            <a href="javascript:void(0)" class="nav-link icon" data-bs-toggle="dropdown">
                                                <i class="fe fe-search"></i>
                                            </a>
                                            <div class="dropdown-menu header-search dropdown-menu-start">
                                                <div class="input-group w-100 p-2">
                                                    <input type="text" class="form-control" placeholder="Search....">
                                                    <div class="input-group-text btn btn-primary">
                                                        <i class="fa fa-search" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- COUNTRY -->
                                        <div class="d-flex country">
                                            <a class="nav-link icon theme-layout nav-link-bg layout-setting">
                                                <span class="dark-layout"><i class="fe fe-moon"></i></span>
                                                <span class="light-layout"><i class="fe fe-sun"></i></span>
                                            </a>
                                        </div>
                                        <!-- Theme-Layout -->
                                        <div class="dropdown  d-flex shopping-cart">
                                            <a class="nav-link icon text-center" data-bs-toggle="dropdown">
                                                <i class="fe fe-shopping-cart"></i><span class="badge bg-secondary header-badge">4</span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <div class="drop-heading border-bottom">
                                                    <div class="d-flex">
                                                        <h6 class="mt-1 mb-0 fs-16 fw-semibold text-dark"> My Shopping Cart</h6>
                                                        <div class="ms-auto">
                                                            <span class="badge bg-danger-transparent header-badge text-danger fs-14">Hurry Up!</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="header-dropdown-list message-menu">
                                                    <div class="dropdown-item d-flex p-4">
                                                        <a href="cart.html" class="open-file"></a>
                                                        <span
                                                            class="avatar avatar-xl br-5 me-3 align-self-center cover-image"
                                                            data-bs-image-src="<?= $sashPath ?>/assets/images/pngs/4.jpg"></span>
                                                        <div class="wd-50p">
                                                            <h5 class="mb-1">Flower Pot for Home Decor</h5>
                                                            <span>Status: <span class="text-success">In Stock</span></span>
                                                            <p class="fs-13 text-muted mb-0">Quantity: 01</p>
                                                        </div>
                                                        <div class="ms-auto text-end d-flex fs-16">
                                                            <span class="fs-16 text-dark d-none d-sm-block px-4">
                                                                $438
                                                            </span>
                                                            <a href="javascript:void(0)" class="fs-16 btn p-0 cart-trash">
                                                                <i class="fe fe-trash-2 border text-danger brround d-block p-2"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="notifications-menu">
                                                        <a class="dropdown-item d-flex" href="notify-list.html">
                                                            <div class="me-3 notifyimg  bg-primary brround box-shadow-primary">
                                                                <i class="fe fe-mail"></i>
                                                            </div>
                                                            <div class="mt-1 wd-80p">
                                                                <h5 class="notification-label mb-1">New Application received
                                                                </h5>
                                                                <span class="notification-subtext">3 days ago</span>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item d-flex" href="notify-list.html">
                                                            <div class="me-3 notifyimg  bg-secondary brround box-shadow-secondary">
                                                                <i class="fe fe-check-circle"></i>
                                                            </div>
                                                            <div class="mt-1 wd-80p">
                                                                <h5 class="notification-label mb-1">Project has been
                                                                    approved</h5>
                                                                <span class="notification-subtext">2 hours ago</span>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item d-flex" href="notify-list.html">
                                                            <div class="me-3 notifyimg  bg-success brround box-shadow-success">
                                                                <i class="fe fe-shopping-cart"></i>
                                                            </div>
                                                            <div class="mt-1 wd-80p">
                                                                <h5 class="notification-label mb-1">Your Product Delivered
                                                                </h5>
                                                                <span class="notification-subtext">30 min ago</span>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item d-flex" href="notify-list.html">
                                                            <div class="me-3 notifyimg bg-pink brround box-shadow-pink">
                                                                <i class="fe fe-user-plus"></i>
                                                            </div>
                                                            <div class="mt-1 wd-80p">
                                                                <h5 class="notification-label mb-1">Friend Requests</h5>
                                                                <span class="notification-subtext">1 day ago</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="dropdown-divider m-0"></div>
                                                    <a href="notify-list.html"
                                                       class="dropdown-item text-center p-3 text-muted">View all
                                                        Notification</a>
                                                </div>
                                            </div>
                                            <!-- NOTIFICATIONS -->
                                            <div class="dropdown d-flex header-settings">
                                                <a href="javascript:void(0);" class="nav-link icon"
                                                   data-bs-toggle="sidebar-right" data-target=".sidebar-right">
                                                    <i class="fe fe-align-right"></i>
                                                </a>
                                            </div>
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
                                                    <a class="dropdown-item" href="<?= Url::to(['profile/index', 'userId' => Yii::$app->user->id]) ?>">
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
                                                    Html::beginForm(['/site/logout', 'id' => 'form-logout'])
                                                    ?>
                                                    <button type = "submit" class = "dropdown-item"><li class = "dropdown-icon fe fe-alert-circle"></li>Sign out</button>
                                                    <?php
                                                    Html::endForm()
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
                        <a class="header-brand1" href="index.html">
                            <img src="<?= $sashPath ?>/assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                            <img src="<?= $sashPath ?>/assets/images/brand/logo-1.png" class="header-brand-img toggle-logo"
                                 alt="logo">
                            <img src="<?= $sashPath ?>/assets/images/brand/logo-2.png" class="header-brand-img light-logo" alt="logo">
                            <img src="<?= $sashPath ?>/assets/images/brand/logo-3.png" class="header-brand-img light-logo1"
                                 alt="logo">
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
                                <a class="side-menu__item has-link" data-bs-toggle="slide" href<?= Url::to(['site/index']) ?>"><i
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

                            <li class="sub-category">
                                <h3>Profile</h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item has-link" data-bs-toggle="slide" href="<?= Url::to(['profile/index']) ?>"><i
                                        class="side-menu__icon fe fe-home"></i><span
                                        class="side-menu__label">profile test</span></a>
                            </li>

                            <li class="sub-category">
                                <h3>UI Kit</h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                        class="side-menu__icon fe fe-slack"></i><span
                                        class="side-menu__label">Apps</span><i
                                        class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Apps</a></li>
                                    <li><a href="cards.html" class="slide-item"> Cards design</a></li>
                                    <li><a href="calendar.html" class="slide-item"> Default calendar</a></li>
                                    <li><a href="calendar2.html" class="slide-item"> Full calendar</a></li>
                                    <li><a href="chat.html" class="slide-item"> Chat</a></li>
                                    <li><a href="notify.html" class="slide-item"> Notifications</a></li>
                                    <li><a href="sweetalert.html" class="slide-item"> Sweet alerts</a></li>
                                    <li><a href="rangeslider.html" class="slide-item"> Range slider</a></li>
                                    <li><a href="scroll.html" class="slide-item"> Content Scroll bar</a></li>
                                    <li><a href="loaders.html" class="slide-item"> Loaders</a></li>
                                    <li><a href="counters.html" class="slide-item"> Counters</a></li>
                                    <li><a href="rating.html" class="slide-item"> Rating</a></li>
                                    <li><a href="timeline.html" class="slide-item"> Timeline</a></li>
                                    <li><a href="treeview.html" class="slide-item"> Treeview</a></li>
                                    <li><a href="chart.html" class="slide-item"> Charts</a></li>
                                    <li><a href="footers.html" class="slide-item"> Footers</a></li>
                                    <li><a href="users-list.html" class="slide-item"> User List</a></li>
                                    <li><a href="search.html" class="slide-item">Search</a></li>
                                    <li><a href="crypto-currencies.html" class="slide-item"> Crypto-currencies</a></li>
                                    <li><a href="widgets.html" class="slide-item"> Widgets</a></li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                        class="side-menu__icon fe fe-package"></i><span
                                        class="side-menu__label">Bootstrap</span><i
                                        class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu mega-slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Bootstrap</a></li>
                                    <div class="mega-menu">
                                        <div class="">
                                            <ul>
                                                <li><a href="alerts.html" class="slide-item"> Alerts</a></li>
                                                <li><a href="buttons.html" class="slide-item"> Buttons</a></li>
                                                <li><a href="colors.html" class="slide-item"> Colors</a></li>
                                                <li><a href="avatarsquare.html" class="slide-item"> Avatar Square</a></li>
                                                <li><a href="avatar-radius.html" class="slide-item"> Avatar Radius</a></li>
                                                <li><a href="avatar-round.html" class="slide-item"> Avatar Rounded</a></li>
                                                <li><a href="dropdown.html" class="slide-item"> Dropdowns</a></li>
                                            </ul>
                                        </div>
                                        <div class="">
                                            <ul>
                                                <li><a href="listgroup.html" class="slide-item"> List Group</a></li>
                                                <li><a href="tags.html" class="slide-item"> Tags</a></li>
                                                <li><a href="pagination.html" class="slide-item"> Pagination</a></li>
                                                <li><a href="navigation.html" class="slide-item"> Navigation</a></li>
                                                <li><a href="typography.html" class="slide-item"> Typography</a></li>
                                                <li><a href="breadcrumbs.html" class="slide-item"> Breadcrumbs</a></li>
                                                <li><a href="badge.html" class="slide-item"> Badges / Pills</a></li>
                                            </ul>
                                        </div>
                                        <div class="">
                                            <ul>
                                                <li><a href="panels.html" class="slide-item"> Panels</a></li>
                                                <li><a href="thumbnails.html" class="slide-item"> Thumbnails</a></li>
                                                <li><a href="offcanvas.html" class="slide-item"> Offcanvas</a></li>
                                                <li><a href="toast.html" class="slide-item"> toast</a></li>
                                                <li><a href="scrollspy.html" class="slide-item"> Scrollspy</a></li>
                                                <li><a href="mediaobject.html" class="slide-item"> Media Object</a></li>
                                                <li><a href="accordion.html" class="slide-item"> Accordions </a></li>
                                            </ul>
                                        </div>
                                        <div class="">
                                            <ul>
                                                <li><a href="tabs.html" class="slide-item"> Tabs</a></li>
                                                <li><a href="modal.html" class="slide-item"> Modal</a></li>
                                                <li><a href="tooltipandpopover.html" class="slide-item"> Tooltip and popover</a></li>
                                                <li><a href="progress.html" class="slide-item"> Progress</a></li>
                                                <li><a href="carousel.html" class="slide-item"> Carousels</a></li>
                                                <li><a href="ribbons.html" class="slide-item"> Ribbons</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </ul>
                            </li>
                            <li>
                                <a class="side-menu__item has-link" href="<?= Url::to(['site/landing']) ?>"><i
                                        class="side-menu__icon fe fe-zap"></i><span
                                        class="side-menu__label">Landing Page</span><span class="badge bg-green br-5 side-badge blink-text pb-1">New</span></a>


                            </li>
                            <li class="sub-category">
                                <h3>Pre-build Pages</h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                        class="side-menu__icon fe fe-layers"></i><span
                                        class="side-menu__label">Pages</span><i
                                        class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Pages</a></li>
                                    <li><a href="profile.html" class="slide-item"> Profile</a></li>
                                    <li><a href="editprofile.html" class="slide-item"> Edit Profile</a></li>
                                    <li><a href="notify-list.html" class="slide-item"> Notifications List</a></li>
                                    <li><a href="email-compose.html" class="slide-item"> Mail-Compose</a></li>
                                    <li><a href="email-inbox.html" class="slide-item"> Mail-Inbox</a></li>
                                    <li><a href="email-read.html" class="slide-item"> Mail-Read</a></li>
                                    <li><a href="gallery.html" class="slide-item"> Gallery</a></li>
                                    <li class="sub-slide">
                                        <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                                                class="sub-side-menu__label">Forms</span><i
                                                class="sub-angle fe fe-chevron-right"></i></a>
                                        <ul class="sub-slide-menu">
                                            <li><a href="form-elements.html" class="sub-slide-item"> Form Elements</a>
                                            </li>
                                            <li><a href="form-layouts.html" class="sub-slide-item"> Form Layouts</a>
                                            </li>
                                            <li><a href="form-advanced.html" class="sub-slide-item"> Form Advanced</a>
                                            </li>
                                            <li><a href="form-editor.html" class="sub-slide-item"> Form Editor</a></li>
                                            <li><a href="form-wizard.html" class="sub-slide-item"> Form Wizard</a></li>
                                            <li><a href="form-validation.html" class="sub-slide-item"> Form Validation</a></li>
                                            <li><a href="form-input-spinners.html" class="sub-slide-item"> Form Input Spinners</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-slide">
                                        <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                                                class="sub-side-menu__label">Tables</span><i
                                                class="sub-angle fe fe-chevron-right"></i></a>
                                        <ul class="sub-slide-menu">
                                            <li><a href="tables.html" class="sub-slide-item">Default table</a></li>
                                            <li><a href="datatable.html" class="sub-slide-item"> Data Tables</a></li>
                                            <li><a href="edit-table.html" class="sub-slide-item"> Edit Tables</a></li>
                                            <li><a href="extension-tables.html" class="sub-slide-item"> Extension Tables</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-slide">
                                        <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                                                class="sub-side-menu__label">Extension</span><i
                                                class="sub-angle fe fe-chevron-right"></i></a>
                                        <ul class="sub-slide-menu">
                                            <li><a href="about.html" class="sub-slide-item"> About Company</a></li>
                                            <li><a href="services.html" class="sub-slide-item"> Services</a></li>
                                            <li><a href="faq.html" class="sub-slide-item"> FAQS</a></li>
                                            <li><a href="terms.html" class="sub-slide-item"> Terms</a></li>
                                            <li><a href="invoice.html" class="sub-slide-item"> Invoice</a></li>
                                            <li><a href="pricing.html" class="sub-slide-item"> Pricing Tables</a></li>
                                            <li><a href="settings.html" class="sub-slide-item"> Settings</a></li>
                                            <li><a href="blog.html" class="sub-slide-item"> Blog</a></li>
                                            <li><a href="blog-details.html" class="sub-slide-item"> Blog Details</a>
                                            </li>
                                            <li><a href="blog-post.html" class="sub-slide-item"> Blog Post</a></li>
                                            <li><a href="empty.html" class="sub-slide-item"> Empty Page</a></li>
                                            <li><a href="construction.html" class="sub-slide-item"> Under
                                                    Construction</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="switcher-1.html" class="slide-item"> Switcher</a></li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                        class="side-menu__icon fe fe-shopping-bag"></i><span
                                        class="side-menu__label">E-Commerce</span><i
                                        class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">E-Commerce</a></li>
                                    <li><a href="shop.html" class="slide-item"> Shop</a></li>
                                    <li><a href="shop-description.html" class="slide-item"> Product Details</a></li>
                                    <li><a href="cart.html" class="slide-item"> Shopping Cart</a></li>
                                    <li><a href="add-product.html" class="slide-item"> Add Product</a></li>
                                    <li><a href="wishlist.html" class="slide-item"> Wishlist</a></li>
                                    <li><a href="checkout.html" class="slide-item"> Checkout</a></li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                        class="side-menu__icon fe fe-folder"></i><span class="side-menu__label">File
                                        Manager</span><span class="badge bg-pink side-badge">4</span><i
                                        class="angle fe fe-chevron-right hor-angle"></i></a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">File Manager</a></li>
                                    <li><a href="file-manager.html" class="slide-item"> File Manager</a></li>
                                    <li><a href="filemanager-list.html" class="slide-item"> File Manager List</a></li>
                                    <li><a href="filemanager-details.html" class="slide-item"> File Details</a></li>
                                    <li><a href="file-attachments.html" class="slide-item"> File Attachments</a></li>
                                </ul>
                            </li>
                            <li class="sub-category">
                                <h3>Misc Pages</h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                        class="side-menu__icon fe fe-users"></i><span
                                        class="side-menu__label">Authentication</span><i
                                        class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Authentication</a></li>
                                    <li><a href="login.html" class="slide-item"> Login</a></li>
                                    <li><a href="register.html" class="slide-item"> Register</a></li>
                                    <li><a href="forgot-password.html" class="slide-item"> Forgot Password</a></li>
                                    <li><a href="lockscreen.html" class="slide-item"> Lock screen</a></li>
                                    <li class="sub-slide">
                                        <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                                                class="sub-side-menu__label">Error Pages</span><i
                                                class="sub-angle fe fe-chevron-right"></i></a>
                                        <ul class="sub-slide-menu">
                                            <li><a href="400.html" class="sub-slide-item"> 400</a></li>
                                            <li><a href="401.html" class="sub-slide-item"> 401</a></li>
                                            <li><a href="403.html" class="sub-slide-item"> 403</a></li>
                                            <li><a href="404.html" class="sub-slide-item"> 404</a></li>
                                            <li><a href="500.html" class="sub-slide-item"> 500</a></li>
                                            <li><a href="503.html" class="sub-slide-item"> 503</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                                    <i class="side-menu__icon fe fe-cpu"></i>
                                    <span class="side-menu__label">Submenu items</span><i
                                        class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Submenu items</a></li>
                                    <li><a href="javascript:void(0)" class="slide-item">Submenu-1</a></li>
                                    <li class="sub-slide">
                                        <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                                                class="sub-side-menu__label">Submenu-2</span><i
                                                class="sub-angle fe fe-chevron-right"></i></a>
                                        <ul class="sub-slide-menu">
                                            <li><a class="sub-slide-item" href="javascript:void(0)">Submenu-2.1</a></li>
                                            <li><a class="sub-slide-item" href="javascript:void(0)">Submenu-2.2</a></li>
                                            <li class="sub-slide2">
                                                <a class="sub-side-menu__item2" href="javascript:void(0)"
                                                   data-bs-toggle="sub-slide2"><span
                                                        class="sub-side-menu__label2">Submenu-2.3</span><i
                                                        class="sub-angle2 fe fe-chevron-right"></i></a>
                                                <ul class="sub-slide-menu2">
                                                    <li><a href="javascript:void(0)" class="sub-slide-item2">Submenu-2.3.1</a></li>
                                                    <li><a href="javascript:void(0)" class="sub-slide-item2">Submenu-2.3.2</a></li>
                                                    <li><a href="javascript:void(0)" class="sub-slide-item2">Submenu-2.3.3</a></li>
                                                </ul>
                                            </li>
                                            <li><a class="sub-slide-item" href="javascript:void(0)">Submenu-2.4</a></li>
                                            <li><a class="sub-slide-item" href="javascript:void(0)">Submenu-2.5</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="sub-category">
                                <h3>General</h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                        class="side-menu__icon fe fe-map-pin"></i><span
                                        class="side-menu__label">Maps</span><i
                                        class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Maps</a></li>
                                    <li><a href="maps1.html" class="slide-item">Leaflet Maps</a></li>
                                    <li><a href="maps2.html" class="slide-item">Mapel Maps</a></li>
                                    <li><a href="maps.html" class="slide-item">Vector Maps</a></li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                        class="side-menu__icon fe fe-bar-chart-2"></i><span
                                        class="side-menu__label">Charts</span><span
                                        class="badge bg-secondary side-badge">6</span><i
                                        class="angle fe fe-chevron-right hor-angle"></i></a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Charts</a></li>
                                    <li><a href="chart-chartist.html" class="slide-item">Chart Js</a></li>
                                    <li><a href="chart-flot.html" class="slide-item"> Flot Charts</a></li>
                                    <li><a href="chart-echart.html" class="slide-item"> ECharts</a></li>
                                    <li><a href="chart-morris.html" class="slide-item"> Morris Charts</a></li>
                                    <li><a href="chart-nvd3.html" class="slide-item"> Nvd3 Charts</a></li>
                                    <li><a href="charts.html" class="slide-item"> C3 Bar Charts</a></li>
                                    <li><a href="chart-line.html" class="slide-item"> C3 Line Charts</a></li>
                                    <li><a href="chart-donut.html" class="slide-item"> C3 Donut Charts</a></li>
                                    <li><a href="chart-pie.html" class="slide-item"> C3 Pie charts</a></li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                        class="side-menu__icon fe fe-wind"></i><span
                                        class="side-menu__label">Icons</span><i
                                        class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Icons</a></li>
                                    <li><a href="icons.html" class="slide-item"> Font Awesome</a></li>
                                    <li><a href="icons2.html" class="slide-item"> Material Design Icons</a></li>
                                    <li><a href="icons3.html" class="slide-item"> Simple Line Icons</a></li>
                                    <li><a href="icons4.html" class="slide-item"> Feather Icons</a></li>
                                    <li><a href="icons5.html" class="slide-item"> Ionic Icons</a></li>
                                    <li><a href="icons6.html" class="slide-item"> Flag Icons</a></li>
                                    <li><a href="icons7.html" class="slide-item"> pe7 Icons</a></li>
                                    <li><a href="icons8.html" class="slide-item"> Themify Icons</a></li>
                                    <li><a href="icons9.html" class="slide-item">Typicons Icons</a></li>
                                    <li><a href="icons10.html" class="slide-item">Weather Icons</a></li>
                                    <li><a href="icons11.html" class="slide-item">Bootstrap Icons</a></li>
                                </ul>
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

        <!-- Country-selector modal-->
        <div class="modal fade" id="country-selector">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content country-select-modal">
                    <div class="modal-header">
                        <h6 class="modal-title">Choose Country</h6><button aria-label="Close" class="btn-close"
                                                                           data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <ul class="row p-3">
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block active">
                                    <span class="country-selector"><img alt="" src="<?= $sashPath ?>/assets/images/flags/us_flag.jpg"
                                                                        class="me-3 language"></span>USA
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                                                        src="<?= $sashPath ?>/assets/images/flags/italy_flag.jpg"
                                                                        class="me-3 language"></span>Italy
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                                                        src="<?= $sashPath ?>/assets/images/flags/spain_flag.jpg"
                                                                        class="me-3 language"></span>Spain
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                                                        src="<?= $sashPath ?>/assets/images/flags/india_flag.jpg"
                                                                        class="me-3 language"></span>India
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                                                        src="<?= $sashPath ?>/assets/images/flags/french_flag.jpg"
                                                                        class="me-3 language"></span>French
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                                                        src="<?= $sashPath ?>/assets/images/flags/russia_flag.jpg"
                                                                        class="me-3 language"></span>Russia
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                                                        src="<?= $sashPath ?>/assets/images/flags/germany_flag.jpg"
                                                                        class="me-3 language"></span>Germany
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                                                        src="<?= $sashPath ?>/assets/images/flags/argentina.jpg"
                                                                        class="me-3 language"></span>Argentina
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt="" src="<?= $sashPath ?>/assets/images/flags/malaysia.jpg"
                                                                        class="me-3 language"></span>Malaysia
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt="" src="<?= $sashPath ?>/assets/images/flags/turkey.jpg"
                                                                        class="me-3 language"></span>Turkey
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Country-selector modal-->

        <!-- FOOTER -->
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-12 col-sm-12 text-center">
                        Copyright © <span id="year"></span> <a href="javascript:void(0)">Sash</a>. Designed with <span
                            class="fa fa-heart text-danger"></span> by <a href="javascript:void(0)"> Spruko </a> All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER END -->

    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
