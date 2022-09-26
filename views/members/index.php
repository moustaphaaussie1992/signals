<?php

use app\models\MembersSearch;
use app\models\Type;
use kartik\grid\GridView;
use richardfan\widget\JSRegister;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Pjax;

/** @var View $this */
/** @var MembersSearch $searchModel */
/** @var ActiveDataProvider $dataProvider */
$this->title = 'Members';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
        <div class="row">

            <div class="col-lg-6">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 class="">Total Members</h6>
                                <h2 class="mb-0 number-font"><?= $totalMembers ?></h2>
                            </div>
                            <div class="ms-auto">
                                <div class="chart-wrapper mt-1"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                    <canvas id="leadschartMembers" class="h-8 w-9 chart-dropshadow chartjs-render-monitor" width="120" height="80" style="display: block; height: 64px; width: 96px;"></canvas>
                                </div>
                            </div>
                        </div>
                        <span class="text-muted fs-12">
<!--                            <span class="text-pink">
                                <i class="fe fe-arrow-down-circle text-pink"></i> 0.75%
                            </span>-->
                            Last 7 days</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 class="">Total Profits</h6>
                                <h2 class="mb-0 number-font"><?= $totalProfits ?></h2>
                            </div>
                            <div class="ms-auto">
                                <div class="chart-wrapper mt-1"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                    <canvas id="leadschartProfitsFromMembers" class="h-8 w-9 chart-dropshadow chartjs-render-monitor" width="120" height="80" style="display: block; height: 64px; width: 96px;"></canvas>
                                </div>
                            </div>
                        </div>
                        <span class="text-muted fs-12">
                            <!--<span class="text-yellow"><i class="fe fe-arrow-down-circle text-yellow"></i> 0.75%</span>-->
                            Last 7 days</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Total Members</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart-container"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                            <canvas id="chartLineMembers" class="h-275 chartjs-render-monitor" width="663" height="343" style="display: block; height: 275px; width: 531px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Profits</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart-container"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                            <canvas id="chartLineprofitsFromMembers" class="h-275 chartjs-render-monitor" width="663" height="343" style="display: block; height: 275px; width: 531px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0"><?= Html::encode($this->title) ?></h3>
            </div>

            <p style="margin-left: 20px;margin-top: 10px;">
                <?php
                echo Html::a('Create Members', ['create'], ['class' => 'btn btn-success'])
                ?>
            </p>

            <?php Pjax::begin(); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]);    ?>
            <div class="card-body">
                <div class="grid-margin">
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'rowOptions' => function($model, $key, $index, $column) {
                            if ($index % 2 == 0) {
                                return ['style' => 'background:rgba(0, 0, 0, 0.02);'];
                            }
                        },
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
//                            [
//                                'attribute' => 'id',
//                                'group' => true,
//                            ],
                            'fullname',
                            'registration_date',
                            'subscription_date',
                            [
                                'attribute' => 'r_type',
                                'value' => function($model) {
                                    $type = Type::findOne(["id" => $model["r_type"]]);
                                    if ($type) {
                                        return $type->name;
                                    }
                                    return null;
                                }
                            ],
                            'from',
                            'to',
//                            'days_left',
                            [
                                'contentOptions' => ['style' => 'width:230px;'],
                                'format' => 'raw',
                                'value' => function($model) {

                                    $secondsOfTodayLeft = (1 * 60 * 60) - (time() - strtotime("today"));
                                    $seconds = ($model["days_left"] * 60 * 60 * 24) + $secondsOfTodayLeft;


                                    if ($seconds < 1) {
                                        return '<div class="card-transparent bg-danger-transparent border border-danger  text-danger  p-1 br-5">
                                            <div class="d-flex d-xs-grid">
                                                <span class="fs-30 pe-2" style="padding-left: 32px;font-size: 15px !important;"><i class="bi bi-alarm"></i></span>
                                                <div class="">
                                                    <span days="0" style="font-size: 14px; opacity: 0.5; text-decoration: line-through;" class="h3">00 Day 00 : 00 : 00</span>
                                                </div>
                                            </div>
                                        </div>';
                                    } else {
                                        return '
                                        <div class="card-transparent bg-success-transparent border border-success  text-success  p-1 br-5">
                                            <div class="d-flex d-xs-grid">
                                                <span class="fs-30 pe-2" style="padding-left: 32px;font-size: 15px !important;"><i class="bi bi-alarm"></i></span>
                                                <div class="">
                                                    <span id="timer-countercallback' . $model["id"] . '" days="' . $seconds . '" style="font-size: 14px;" class="h3 timer-countercallback"></span>
                                                </div>
                                            </div>
                                        </div>';
                                    }
                                }
                            ],
//                            'phone',
//                            'telegram',
//                            [
//                                'attribute' => 'r_user',
//                                'value' => 'rUser.username'
//                            ],
//                            [
//                                'class' => ActionColumn::className(),
//                                'urlCreator' => function ($action, Members $model, $key, $index, $column) {
//                                    return Url::toRoute([$action, 'id' => $model->id]);
//                                }
//                            ],
                            ['class' => 'yii\grid\ActionColumn',
                                'contentOptions' => ['style' => 'width: 70px;'],
                                'visible' => Yii::$app->user->isGuest ? false : true,
                                'template' => '{phone} {telegram}',
                                'buttons' => [
                                    'telegram' => function ($url, $model) {
                                        return Html::a('<i class="fa fa-telegram" data-bs-toggle="tooltip" title="" data-bs-original-title="" aria-label=""></i>', Url::to('https://t.me/' . $model["telegram"], true), [
                                                    'style' => 'color:#2AABEE;'
                                        ]);
                                    },
                                    'phone' => function ($url, $model) {
                                        return Html::a('<i class="fa fa-whatsapp" data-bs-toggle="tooltip" title="" data-bs-original-title="" aria-label=""></i>', Url::to('https://wa.me/' . $model["phone"], true), [
                                                    'style' => 'color:#4caf50;'
                                        ]);
                                    },
                                ],
                            ],
                            ['class' => 'yii\grid\ActionColumn',
                                'contentOptions' => ['style' => 'width: 140px;'],
                                'visible' => Yii::$app->user->isGuest ? false : true,
                                'template' => '{update}{delete}{view}',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                        return Html::a('<span class="fe fe-eye fs-14"></span>', ['view?id=' . $model["memberId"]], [
                                                    'class' => 'btn text-warning btn-sm',
                                                    'style' => ''
                                        ]);
                                    },
                                    'update' => function ($url, $model) {
                                        return Html::a('<span class="fe fe-edit fs-14"></span>', ['update?id=' . $model["memberId"]], [
                                                    'class' => 'btn text-primary btn-sm',
                                                    'title' => 'Edit'
                                        ]);
                                    },
                                    'delete' => function ($url, $model) {
                                        return Html::a('<span class="fe fe-trash-2 fs-14"></span>', ['delete?id=' . $model["memberId"]], [
                                                    'class' => 'btn text-danger btn-sm',
                                                    'data' => [
                                                        'method' => 'post',
                                                        'params' => [
                                                            'id' => $model["memberId"]
                                                        ],
                                                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                                        'title' => Yii::t('app', 'Confirmation'),
                                                        'ok' => Yii::t('app', 'OK'),
                                                        'cancel' => Yii::t('app', 'Cancel'),
                                                    ]
                                        ]);
                                    }
                                ],
                            ]
                        ],
                    ]);
                    ?>
                </div>

            </div>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>

<?php JSRegister::begin(); ?>
<script>


    $.ajax({
        url: '<?php echo Url::toRoute("/my-api/get-users-stat") ?>',
        type: "POST",
        data: {
            'userId': '<?= Yii::$app->user->id ?>',
        },
        success: function (data) {
            if (data["status"] == true) {
                var resultMembers = data["dataMembers"];
                var labelsMembers = data["labelsMembers"];
                var resultMembers0 = data["dataMembers0"];
                var labelsMembers0 = data["labelsMembers0"];
                var dataSubscriptions = data["dataSubscriptions"];
                var labelsubscriptions = data["labelsubscriptions"];
                var dataSubscriptions10 = data["dataSubscriptions10"];
                var labelsubscriptions10 = data["labelsubscriptions10"];

                // LEADS CHART
                var ctx = document.getElementById('leadschartMembers').getContext('2d');
                ctx.height = 10;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labelsMembers,
//                        labels: ['Date 1', 'Date 2', 'Date 3', 'Date 4', 'Date 5', 'Date 6', 'Date 7', 'Date 8', 'Date 9', 'Date 10', 'Date 11', 'Date 12', 'Date 13', 'Date 14', 'Date 15'],
                        datasets: [{
                                label: 'Total Members',
                                data: resultMembers,
//                    data: [45, 23, 32, 67, 49, 72, 52, 55, 46, 54, 32, 74, 88, 36, 36, 32, 48, 54],
                                backgroundColor: 'transparent',
                                borderColor: '#f46ef4',
                                borderWidth: '2.5',
                                pointBorderColor: 'transparent',
                                pointBackgroundColor: 'transparent',
                            }, ]
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        },
                        responsive: true,
                        tooltips: {
                            enabled: false,
                        },
                        scales: {
                            xAxes: [{
                                    categoryPercentage: 1.0,
                                    barPercentage: 1.0,
                                    barDatasetSpacing: 0,
                                    display: false,
                                    barThickness: 5,
                                    gridLines: {
                                        color: 'transparent',
                                        zeroLineColor: 'transparent'
                                    },
                                    ticks: {
                                        fontSize: 2,
                                        fontColor: 'transparent'
                                    }
                                }],
                            yAxes: [{
                                    display: false,
                                    ticks: {
                                        display: false,
                                    }
                                }]
                        },
                        title: {
                            display: false,
                        },
                    }
                });



                var ctx = document.getElementById("chartLineMembers").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labelsMembers0,
                        datasets: [{
                                label: 'Members',
                                data: resultMembers0,
                                borderWidth: 2,
                                backgroundColor: 'transparent',
                                borderColor: '#6c5ffc',
                                borderWidth: 3,
                                pointBackgroundColor: '#ffffff',
                                pointRadius: 2
                            }]
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



                // LEADS CHART
                var ctx = document.getElementById('leadschartProfitsFromMembers').getContext('2d');
                ctx.height = 10;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labelsubscriptions,
//                        labels: ['Date 1', 'Date 2', 'Date 3', 'Date 4', 'Date 5', 'Date 6', 'Date 7', 'Date 8', 'Date 9', 'Date 10', 'Date 11', 'Date 12', 'Date 13', 'Date 14', 'Date 15'],
                        datasets: [{
                                label: 'Total Members',
                                data: dataSubscriptions,
//                    data: [45, 23, 32, 67, 49, 72, 52, 55, 46, 54, 32, 74, 88, 36, 36, 32, 48, 54],
                                backgroundColor: 'transparent',
                                borderColor: '#f7ba48',
                                borderWidth: '2.5',
                                pointBorderColor: 'transparent',
                                pointBackgroundColor: 'transparent',
                            }, ]
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        },
                        responsive: true,
                        tooltips: {
                            enabled: false,
                        },
                        scales: {
                            xAxes: [{
                                    categoryPercentage: 1.0,
                                    barPercentage: 1.0,
                                    barDatasetSpacing: 0,
                                    display: false,
                                    barThickness: 5,
                                    gridLines: {
                                        color: 'transparent',
                                        zeroLineColor: 'transparent'
                                    },
                                    ticks: {
                                        fontSize: 2,
                                        fontColor: 'transparent'
                                    }
                                }],
                            yAxes: [{
                                    display: false,
                                    ticks: {
                                        display: false,
                                    }
                                }]
                        },
                        title: {
                            display: false,
                        },
                    }
                });



                var ctx = document.getElementById("chartLineprofitsFromMembers").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labelsubscriptions10,
                        datasets: [{
                                label: 'Profits',
                                data: dataSubscriptions10,
                                borderWidth: 2,
                                backgroundColor: 'transparent',
                                borderColor: '#05c3fb',
                                borderWidth: 3,
                                pointBackgroundColor: '#ffffff',
                                pointRadius: 2
                            }]
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

            }

        },
        error: function (errormessage) {
            console.log("not working");
        }
    });

    var elementsByClass = document.getElementsByClassName("timer-countercallback");
    var a = $('.timer-countercallback');
    for (var i = 0; i < a.length; i++) {
        var days = $(a[i]).attr('days');
        $(a[i]).countdown({
            from: parseInt(days),
            to: 0,
            timerEnd: function () {
                this.animate({'opacity': .5}, 500).css({'text-decoration': 'line-through'});
            }
        });
    }






</script>
<?php JSRegister::end(); ?>
