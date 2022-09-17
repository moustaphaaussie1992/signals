<?php

use app\models\MembersSearch;
use richardfan\widget\JSRegister;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
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

            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 class="">Total Members</h6>
                                <h2 class="mb-0 number-font"><?= $totalMembers ?></h2>
                            </div>
                            <div class="ms-auto">
                                <div class="chart-wrapper mt-1"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                    <canvas id="leadschart" class="h-8 w-9 chart-dropshadow chartjs-render-monitor" width="120" height="80" style="display: block; height: 64px; width: 96px;"></canvas>
                                </div>
                            </div>
                        </div>
                        <span class="text-muted fs-12"><span class="text-pink"><i class="fe fe-arrow-down-circle text-pink"></i> 0.75%</span>
                            Last 7 days</span>
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
                            'fullname',
                            'registration_date',
                            'phone',
                            'telegram',
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
                                'contentOptions' => ['style' => 'width: 140px;'],
                                'visible' => Yii::$app->user->isGuest ? false : true,
                                'template' => '{update}{delete}{view}',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                        return Html::a('<span class="fe fe-eye fs-14"></span>', ['view?id=' . $model->id], [
                                                    'class' => 'btn text-warning btn-sm',
                                                    'style' => ''
                                        ]);
                                    },
                                    'update' => function ($url, $model) {
                                        return Html::a('<span class="fe fe-edit fs-14"></span>', $url, [
                                                    'class' => 'btn text-primary btn-sm',
                                                    'title' => 'Edit'
                                        ]);
                                    },
                                    'delete' => function ($url, $model) {
                                        return Html::a('<span class="fe fe-trash-2 fs-14"></span>', $url, [
                                                    'class' => 'btn text-danger btn-sm',
                                                    'data' => [
                                                        'method' => 'post',
                                                        'params' => [
                                                            'id' => $model->id
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
                var result = data["data"]
                var labels = data["labels"]

                // LEADS CHART
                var ctx = document.getElementById('leadschart').getContext('2d');
                ctx.height = 10;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
//                        labels: ['Date 1', 'Date 2', 'Date 3', 'Date 4', 'Date 5', 'Date 6', 'Date 7', 'Date 8', 'Date 9', 'Date 10', 'Date 11', 'Date 12', 'Date 13', 'Date 14', 'Date 15'],
                        datasets: [{
                                label: 'Total Members',
                                data: result,
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
            }
            console.log(result);

        },
        error: function (errormessage) {
            console.log("not working");
        }
    });



</script>
<?php JSRegister::end(); ?>