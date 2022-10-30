<?php

use app\models\Utils;
use richardfan\widget\JSRegister;
use yii\helpers\Url;
$sashPath = Yii::getAlias('@web') . '/sash';
//\yii\helpers\VarDumper::dump($user, 3, true);
//die();
$link = "https://twitter.com/";
$user["facebook"] = addhttp($user["facebook"]);
$user["twitter"] = addhttp($user["twitter"]);
$user["tiktok"] = addhttp($user["tiktok"]);
$user["insta"] = addhttp($user["insta"]);
$user["telegram_link"] = addhttp($user["telegram_link"]);

function addhttp($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}
?>

<style>
    .fontawesomesvg {width: 1em;
                     height: 1em;
                     vertical-align: -.125em;
                     color: #6c5ffc
    }
    
    a:hover {
  background-color: #6c5ffcbf;
}
    
</style>

<div class="row" id="user-profile">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="wideget-user mb-2">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="row">
                                <div class="panel profile-cover" >
                                    <div class="profile-cover__action bg-img" style="background-image: url('<?= Yii::getAlias('@web') . "/coverPhotos/" . $user['back_photo'] ?>')"></div>
                                    <div class="profile-cover__img">
                                        <div class="profile-img-1">
                                            <img src="<?= Yii::getAlias('@web') . "/profilePhotos/" . $user['photo'] ?>" style="height: 120px;width: 120px;object-fit: cover;" alt="img">
                                        </div>
                                        <div class="profile-img-content text-dark text-start">
                                            <div class="text-dark">
                                                <h3 class="h3 mb-2"><?= $user["username"] ?></h3>
                                                <h5 class="text-muted"><?= $user["email"] ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <!--                                    <div class="btn-profile">
                                                                            <button class="btn btn-primary mt-1 mb-1"> <i class="fa fa-rss"></i> <span>Follow</span></button>
                                                                            <button class="btn btn-secondary mt-1 mb-1"> <i class="fa fa-envelope"></i> <span>Message</span></button>
                                                                        </div>-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="px-0 px-sm-4">
                                    <div class="social social-profile-buttons mt-5 float-end">
                                        <div class="mt-3">
                                            <a class="social-icon text-primary" href="<?= $user['facebook'] ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                            <a class="social-icon text-primary" href="<?= $user['twitter'] ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                                            <a class="social-icon text-primary" href="<?= $user["insta"] ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                                            <a class="social-icon text-primary" href="<?= $user["telegram_link"] ?>" target="_blank"><i class="fa fa-telegram"></i></a>
                                            <a class="social-icon text-primary" href="<?= $user["tiktok"] ?>" target="_blank"><svg class='fontawesomesvg' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Free 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. --><path d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z" fill="#6c5ffc"/></svg></a>
                                            <a class="social-icon text-primary" href="<?= $user["discord"] ?>" target="_blank"><svg style ="width:20px"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M524.531,69.836a1.5,1.5,0,0,0-.764-.7A485.065,485.065,0,0,0,404.081,32.03a1.816,1.816,0,0,0-1.923.91,337.461,337.461,0,0,0-14.9,30.6,447.848,447.848,0,0,0-134.426,0,309.541,309.541,0,0,0-15.135-30.6,1.89,1.89,0,0,0-1.924-.91A483.689,483.689,0,0,0,116.085,69.137a1.712,1.712,0,0,0-.788.676C39.068,183.651,18.186,294.69,28.43,404.354a2.016,2.016,0,0,0,.765,1.375A487.666,487.666,0,0,0,176.02,479.918a1.9,1.9,0,0,0,2.063-.676A348.2,348.2,0,0,0,208.12,430.4a1.86,1.86,0,0,0-1.019-2.588,321.173,321.173,0,0,1-45.868-21.853,1.885,1.885,0,0,1-.185-3.126c3.082-2.309,6.166-4.711,9.109-7.137a1.819,1.819,0,0,1,1.9-.256c96.229,43.917,200.41,43.917,295.5,0a1.812,1.812,0,0,1,1.924.233c2.944,2.426,6.027,4.851,9.132,7.16a1.884,1.884,0,0,1-.162,3.126,301.407,301.407,0,0,1-45.89,21.83,1.875,1.875,0,0,0-1,2.611,391.055,391.055,0,0,0,30.014,48.815,1.864,1.864,0,0,0,2.063.7A486.048,486.048,0,0,0,610.7,405.729a1.882,1.882,0,0,0,.765-1.352C623.729,277.594,590.933,167.465,524.531,69.836ZM222.491,337.58c-28.972,0-52.844-26.587-52.844-59.239S193.056,219.1,222.491,219.1c29.665,0,53.306,26.82,52.843,59.239C275.334,310.993,251.924,337.58,222.491,337.58Zm195.38,0c-28.971,0-52.843-26.587-52.843-59.239S388.437,219.1,417.871,219.1c29.667,0,53.307,26.82,52.844,59.239C470.715,310.993,447.538,337.58,417.871,337.58Z" fill="#6c5ffc"/></svg></a>
                                            <!--<a class="social-icon text-primary" href="javascript:void(0)"><i class="fa fa-rss"></i></a>-->
                                            <!--<a class="social-icon text-primary" href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i></a>-->
                                            <!--<a class="social-icon text-primary" href="https://myaccount.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Biography</div>
                    </div>
                    <div class="card-body ">
                        <div>
                            <p>
                                <?= $user["bio"] ?> 
                            </p>
                        </div>
                        <hr><!-- comment -->
                       
                                                <div class="d-flex align-items-center mb-3 mt-3">
                                                    <div class="me-4 text-center text-primary">
                                                        <span><i class="fe fe-link fs-20"></i></span>
                                                    </div>
                                                    <div>
                                                      
                                                         <a style='color: white!important;' class="social-icon text-primary" href="<?= $user['telegram_link'] ?>" target="_blank"><?= $user['telegram_link'] ?></a>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center mb-3 mt-3">
                                                    <div class="me-4 text-center text-primary">
                                                        <span><i class="fe fe-phone fs-20"></i></span>
                                                    </div>
                                                    <div>
                                                          <a style='color: white!important;'class="social-icon text-primary" href="<?=  Url::to('https://wa.me/' .$user['contact_number']) ?>" target="_blank"><?= $user['contact_number'] ?></a>
                                                
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center mb-3 mt-3">
                                                    <div class="me-4 text-center text-primary">
                                                        <span><i class="fe fe-mail fs-20"></i></span>
                                                    </div>
                                                    <div>
                                                        
                                                    </div><a style='color: white!important;' class="social-icon text-primary" href="<?=  Url::to('mailto:' .$user['email']) ?>" target="_blank"><?= $user['email'] ?></a>
                                                      
                                                    </div>
                                                </div>
                    </div>
                   
                </div>

            </div>


            <div class="col-xl-12 row " style="margin: 0px;
                 padding: 0px;">
                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Crypto</div>
                        </div>
                        <div class="card-body">
                            <div class="main-profile-contact-list">
                                <div class="me-5">
                                    <div class="media mb-4 d-flex">
                                        <div class="media-icon bg-secondary bradius me-3 mt-1">
                                            <i class="fa fa-line-chart fs-20 text-white"></i>
                                        </div>
                                        <div class="media-body">
                                            <span class="text-muted">Signals</span>
                                            <div class="fw-semibold fs-25">
                                                <?= Utils::getSignalCryptoCountByUserId($user["id"]) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="me-5 mt-5 mt-md-0">
                                    <div class="media mb-4 d-flex">
                                        <div class="media-icon bg-success bradius text-white me-3 mt-1">
                                            <span class="mt-3">
                                                <i class="fa fa-line-chart fs-20"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <span class="text-muted">Won Signals</span>
                                            <div class="fw-semibold fs-25">
                                                <?php
                                                $wonCryptoSignals = Utils::getSignalCryptoCountWinByUserId($user["id"]);
                                                echo $wonCryptoSignals;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                <div class="me-5 mt-5 mt-md-0">
                                    <div class="media mb-4 d-flex">
                                        <div class="media-icon bg-danger bradius text-white me-3 mt-1">
                                            <span class="mt-3">
                                                <i class="fa fa-line-chart fs-20"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <span class="text-muted">Loss Signals</span>
                                            <div class="fw-semibold fs-25">
                                                <?= Utils::getSignalCryptoCountLossByUserId($user["id"]) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                <div class="me-0 mt-5 mt-md-0">
                                    <div class="media">
                                        <div class="media-icon bg-primary text-white bradius me-3 mt-1">
                                            <span class="mt-3">
                                                <i class="fe fe-dollar-sign fs-20"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <span class="text-muted">Profit From Signals</span>
                                            <div class="fw-semibold fs-25">
                                                <?= Utils::getSignalCryptoProfitByUserId($user["id"]) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 row" style="padding: 0px; margin: 0px;">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Crypto Signals</h3>
                            </div>
                            <div class="card-body">
                                <div class="chart-container"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                    <canvas id="winSignalCryptoChart" class="h-275 chartjs-render-monitor" width="663" height="343" style="display: block; height: 275px; width: 531px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Crypto Profit</h3>
                            </div>
                            <div class="card-body">
                                <div class="chart-container"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                    <canvas id="ProfitCryptoChart" class="h-275 chartjs-render-monitor" width="663" height="343" style="display: block; height: 275px; width: 531px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 row" style="margin: 0px;
                 padding: 0px;" >
                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Forex</div>
                        </div>
                        <div class="card-body">
                            <div class="main-profile-contact-list">
                                <div class="me-5">
                                    <div class="media mb-4 d-flex">
                                        <div class="media-icon bg-secondary bradius me-3 mt-1">
                                            <i class="fa fa-line-chart fs-20 text-white"></i>
                                        </div>
                                        <div class="media-body">
                                            <span class="text-muted">Signal</span>
                                            <div class="fw-semibold fs-25">
                                                <?= Utils::getSignalForexCountByUserId($user["id"]) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="me-5 mt-5 mt-md-0">
                                    <div class="media mb-4 d-flex">
                                        <div class="media-icon bg-success bradius text-white me-3 mt-1">
                                            <span class="mt-3">
                                                <i class="fa fa-line-chart fs-20"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <span class="text-muted">Won Signals</span>
                                            <div class="fw-semibold fs-25">
                                                <?= Utils::getSignalForexCountWinByUserId($user["id"]) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="me-5 mt-5 mt-md-0">
                                    <div class="media mb-4 d-flex">
                                        <div class="media-icon bg-danger bradius text-white me-3 mt-1">
                                            <span class="mt-3">
                                                <i class="fa fa-line-chart fs-20"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <span class="text-muted">Loss Signals</span>
                                            <div class="fw-semibold fs-25">
                                                <?= Utils::getSignalForexCountLossByUserId($user["id"]) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="me-0 mt-5 mt-md-0">
                                    <div class="media">
                                        <div class="media-icon bg-primary text-white bradius me-3 mt-1">
                                            <span class="mt-3">
                                                <i class="fe fe-dollar-sign fs-20"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <span class="text-muted">Profit From Signals</span>
                                            <div class="fw-semibold fs-25">
                                                <?= Utils::getSignalForexProfitByUserId($user["id"]) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 row" style="padding: 0px; margin: 0px;" >
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Forex Signals</h3>
                            </div>
                            <div class="card-body">
                                <div class="chart-container"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                    <canvas id="winSignalForexChart" class="h-275 chartjs-render-monitor" width="663" height="343" style="display: block; height: 275px; width: 531px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Forex Profit</h3>
                            </div>
                            <div class="card-body">
                                <div class="chart-container"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                    <canvas id="ProfitForexChart" class="h-275 chartjs-render-monitor" width="663" height="343" style="display: block; height: 275px; width: 531px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
       <div class="col-xl-12 row" style="margin: 0px;
                 padding: 0px;" >
                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Active Members</div>
                        </div>
                        <div class="card-body">
                            <div class="main-profile-contact-list">
                                <div class="me-5">
                                    <div class="media mb-4 d-flex">
                                        <div class="media-icon bg-secondary bradius me-3 mt-1">
                                            <i style ="    display: inline;"class="lnr lnr-user fs-30  fs-20"></i>
                                        </div>
                                        <div class="media-body">
                                            <span class="text-muted">Total Members</span>
                                            <div class="fw-semibold fs-25">
                                                <?= $totalMembers ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="me-5 mt-5 mt-md-0">
                                    <div class="media mb-4 d-flex">
                                        <div class="media-icon bg-success bradius text-white me-3 mt-1">
                                            <span class="mt-3">
                                              <i style ="    display: inline;"class="lnr lnr-user fs-30  fs-20"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <span class="text-muted">Crypto Members</span>
                                            <div class="fw-semibold fs-25">
                                                <?= $totalMembersCrypto ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="me-5 mt-5 mt-md-0">
                                    <div class="media mb-4 d-flex">
                                        <div class="media-icon bg-danger bradius text-white me-3 mt-1">
                                            <span class="mt-3">
                                               <i style ="    display: inline;"class="lnr lnr-user fs-30  fs-20"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <span class="text-muted">Forex Members</span>
                                            <div class="fw-semibold fs-25">
                                                <?= $totalMembersForex ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="me-0 mt-5 mt-md-0">
                                    <div class="media">
                                        <div class="media-icon bg-primary text-white bradius me-3 mt-1">
                                            <span class="mt-3">
                                              <i style ="    display: inline;"class="lnr lnr-user fs-30  fs-20"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <span class="text-muted">Crypto and Forex Signals</span>
                                            <div class="fw-semibold fs-25">
                                                <?= $totalMembersCryptoForex ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
             <div class="col-xl-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Subscriptions Pachages</div>
                        </div>
                        <div class="card-body">
                            <div class="main-profile-contact-list">
                                <div class="me-5">
                                    <div class="media mb-4 d-flex">
                                        <div class="media-icon bg-secondary bradius me-3 mt-1">
                                             <i style ="    display: inline!important;" class=" lnr lnr-cart fs-30 text-white mt-4"></i>
                                        </div>
                                        <div class="media-body">
                                            <span class="text-muted">1 Month Subscription</span>
                                            <div class="fw-semibold fs-25">
                                                <?= $user["monthly_charge_offer"] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="me-5 mt-5 mt-md-0">
                                    <div class="media mb-4 d-flex">
                                        <div class="media-icon bg-success bradius text-white me-3 mt-1">
                                            <span class="mt-3">
                                               <i style ="    display: inline;"class=" lnr lnr-cart fs-30 text-white mt-4"></i>
                                            </span>
                                            
                                        </div>
                                        <div class="media-body">
                                            <span class="text-muted">3 Months Subscription</span>
                                            <div class="fw-semibold fs-25">
                                                <?= $user["three_months_offer"] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="me-5 mt-5 mt-md-0">
                                    <div class="media mb-4 d-flex">
                                        <div class="media-icon bg-danger bradius text-white me-3 mt-1">
                                            <span class="mt-3">
                                               <i style ="    display: inline;" class=" lnr lnr-cart fs-30 text-white mt-4"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <span class="text-muted">1 Year Subscription</span>
                                            <div class="fw-semibold fs-25">
                                                <?= $user["year_offer"] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="me-0 mt-5 mt-md-0">
                                    <div class="media">
                                        <div class="media-icon bg-primary text-white bradius me-3 mt-1">
                                            <span class="mt-3">
                                              <i style ="    display: inline;" class=" lnr lnr-cart fs-30 text-white mt-4"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <span class="text-muted">Life Time Subscription</span>
                                            <div class="fw-semibold fs-25">
                                                <?= $user["all_till_offer"] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             <div class="col-xl-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Package Consumption</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="example">
                                            
                                           
                                            <div class="progress progress-md mb-6">
                                                <div class="progress-bar bg-danger-gradient" style="width: 20%;">20% Members</div>
                                            </div>
                                        
                                            <div class="progress progress-md">
                                                <div class="progress-bar bg-info-gradient" style="width: 80%;">80% Signals</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
         
       </div>
</div>
<!-- COL-END -->

<?php JSRegister::begin(); ?>
<script>

    $.ajax({
        url: '<?php echo Url::toRoute("/my-api/get-signals-stat") ?>',
        type: "POST",
        data: {
            'userId': '<?= Yii::$app->user->id ?>',
        },
        success: function (data) {


            var profitCrpto = data["profitCrpto"];
            var resultSignals = data["resultSignals"];
            var resultWonCryptoSignals = data["resultWonCryptoSignals"];
            var resultLossCryptoSignals = data["resultLossCryptoSignals"];
            var labelsCryptoSignals = data["labelsCryptoSignals"];
            var ctx = document.getElementById("winSignalCryptoChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labelsCryptoSignals,
                    datasets: [
                        {
                            label: 'Signals',
                            data: resultSignals,
                            borderWidth: 2,
                            backgroundColor: 'transparent',
                            borderColor: '#6c5ffc',
                            borderWidth: 3,
                            pointBackgroundColor: '#ffffff',
                            pointRadius: 2
                        },
                        {
                            label: 'Win',
                            data: resultWonCryptoSignals,
                            borderWidth: 2,
                            backgroundColor: 'transparent',
                            borderColor: 'green',
                            borderWidth: 3,
                            pointBackgroundColor: '#ffffff',
                            pointRadius: 2
                        },
                        {
                            label: 'Loss',
                            data: resultLossCryptoSignals,
                            borderWidth: 2,
                            backgroundColor: 'transparent',
                            borderColor: 'red',
                            borderWidth: 3,
                            pointBackgroundColor: '#ffffff',
                            pointRadius: 2
                        },
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        xAxes: [{
                                ticks: {
                                    fontColor: "#9ba6b5",
                                },
                                display: true,
                                gridLines: {
                                    color: 'rgba(119, 119, 142, 0.2)'
                                }
                            }],
                        yAxes: [{
                                ticks: {
                                    fontColor: "#9ba6b5",
                                },
                                display: true,
                                gridLines: {
                                    color: 'rgba(119, 119, 142, 0.2)'
                                },
                                scaleLabel: {
                                    display: false,
                                    labelString: 'Thousands',
                                    fontColor: 'rgba(119, 119, 142, 0.2)'
                                }
                            }]
                    },
                    legend: {
                        labels: {
                            fontColor: "#9ba6b5"
                        },
                    },
                }

            });
            var ctx = document.getElementById("ProfitCryptoChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labelsCryptoSignals,
                    datasets: [
                        {
                            label: 'Profit',
                            data: profitCrpto,
                            borderWidth: 2,
                            backgroundColor: 'transparent',
                            borderColor: '#6c5ffc',
                            borderWidth: 3,
                            pointBackgroundColor: '#ffffff',
                            pointRadius: 2
                        },
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        xAxes: [{
                                ticks: {
                                    fontColor: "#9ba6b5",
                                },
                                display: true,
                                gridLines: {
                                    color: 'rgba(119, 119, 142, 0.2)'
                                }
                            }],
                        yAxes: [{
                                ticks: {
                                    fontColor: "#9ba6b5",
                                },
                                display: true,
                                gridLines: {
                                    color: 'rgba(119, 119, 142, 0.2)'
                                },
                                scaleLabel: {
                                    display: false,
                                    labelString: 'Thousands',
                                    fontColor: 'rgba(119, 119, 142, 0.2)'
                                }
                            }]
                    },
                    legend: {
                        labels: {
                            fontColor: "#9ba6b5"
                        },
                    },
                }

            });
            var profitForex = data["profitForex"];
            var resultSignalsForex = data["resultSignalsForex"];
            var resultWonForexSignals = data["resultWonForexSignals"];
            var resultLossForexSignals = data["resultLossForexSignals"];
            var labelsForexSignals = data["labelsForexSignals"];
            var ctx = document.getElementById("winSignalForexChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labelsForexSignals,
                    datasets: [
                        {
                            label: 'Signals',
                            data: resultSignalsForex,
                            borderWidth: 2,
                            backgroundColor: 'transparent',
                            borderColor: '#6c5ffc',
                            borderWidth: 3,
                            pointBackgroundColor: '#ffffff',
                            pointRadius: 2
                        },
                        {
                            label: 'Win',
                            data: resultWonForexSignals,
                            borderWidth: 2,
                            backgroundColor: 'transparent',
                            borderColor: 'green',
                            borderWidth: 3,
                            pointBackgroundColor: '#ffffff',
                            pointRadius: 2
                        },
                        {
                            label: 'Loss',
                            data: resultLossForexSignals,
                            borderWidth: 2,
                            backgroundColor: 'transparent',
                            borderColor: 'red',
                            borderWidth: 3,
                            pointBackgroundColor: '#ffffff',
                            pointRadius: 2
                        },
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        xAxes: [{
                                ticks: {
                                    fontColor: "#9ba6b5",
                                },
                                display: true,
                                gridLines: {
                                    color: 'rgba(119, 119, 142, 0.2)'
                                }
                            }],
                        yAxes: [{
                                ticks: {
                                    fontColor: "#9ba6b5",
                                },
                                display: true,
                                gridLines: {
                                    color: 'rgba(119, 119, 142, 0.2)'
                                },
                                scaleLabel: {
                                    display: false,
                                    labelString: 'Thousands',
                                    fontColor: 'rgba(119, 119, 142, 0.2)'
                                }
                            }]
                    },
                    legend: {
                        labels: {
                            fontColor: "#9ba6b5"
                        },
                    },
                }

            });

            var ctx = document.getElementById("ProfitForexChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labelsForexSignals,
                    datasets: [
                        {
                            label: 'Profit',
                            data: profitForex,
                            borderWidth: 2,
                            backgroundColor: 'transparent',
                            borderColor: '#6c5ffc',
                            borderWidth: 3,
                            pointBackgroundColor: '#ffffff',
                            pointRadius: 2
                        },
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        xAxes: [{
                                ticks: {
                                    fontColor: "#9ba6b5",
                                },
                                display: true,
                                gridLines: {
                                    color: 'rgba(119, 119, 142, 0.2)'
                                }
                            }],
                        yAxes: [{
                                ticks: {
                                    fontColor: "#9ba6b5",
                                },
                                display: true,
                                gridLines: {
                                    color: 'rgba(119, 119, 142, 0.2)'
                                },
                                scaleLabel: {
                                    display: false,
                                    labelString: 'Thousands',
                                    fontColor: 'rgba(119, 119, 142, 0.2)'
                                }
                            }]
                    },
                    legend: {
                        labels: {
                            fontColor: "#9ba6b5"
                        },
                    },
                }

            });
        },
        error: function (errormessage) {
            console.log("not working");
        }
    });

</script>
<?php JSRegister::end(); ?>
