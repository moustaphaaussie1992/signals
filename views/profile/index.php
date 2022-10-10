<?php

use app\models\Utils;
use richardfan\widget\JSRegister;
use yii\helpers\Url;

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
                                    <div class="profile-cover__action bg-img" style="background-image: url('<?= Yii::getAlias('@web') . "/profilePhotos/" . $user['back_photo'] ?>')"></div>
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
                    <div class="card-body">
                        <div>
                            <p>
                                <?= $user["bio"] ?> 
                            </p>
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
