<?php

use app\models\CryptoType;
use app\models\ForexPips;
use app\models\ForexResult;
use app\models\ForexSignalsSearch;
use app\models\ForexTarget;
use app\models\ForexTicker;
use app\models\Utils;
use kartik\select2\Select2;
use richardfan\widget\JSRegister;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/** @var View $this */
/** @var ForexSignalsSearch $searchModel */
/** @var ActiveDataProvider $dataProvider */
$this->title = 'Forex Signals';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="forex-signals-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">

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

        <div class="col-lg-1">

            <?=
            $form->field($model, 'ticker')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(ForexTicker::find()->all(), 'id', 'name'),
                'options' => ['placeholder' => '...',
                    'style' => "width:100%!important"
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-lg-1">
            <?=
            $form->field($model, 'type')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(CryptoType::find()->all(), 'id', 'name'),
                'options' => ['placeholder' => '...',
                    'style' => "width:100%!important"
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-lg-3">


            <?=
            $form->field($model, 'target')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(ForexTarget::find()->all(), 'id', 'name'),
                'options' => ['placeholder' => '...',
                    'style' => "width:100%!important"
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                    'multiple' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-lg-1">



            <?=
            $form->field($model, 'result')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(ForexResult::find()->all(), 'id', 'name'),
                'options' => ['placeholder' => '...',
                    'style' => "width:100%!important"
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-lg-1">


            <?=
            $form->field($model, 'pips')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(ForexPips::find()->all(), 'id', 'name'),
                'options' => ['placeholder' => '...',
                    'style' => "width:100%!important"
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-lg-1">
            <?= $form->field($model, 'percentage')->textInput() ?>
        </div>
        <div class="col-lg-1">
            <?= $form->field($model, 'comment')->textInput() ?>
        </div>
        <div class="form-group col-lg-1">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'style' => 'margin-top: 27px;']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>

<div class="row">

    <div class="col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0"><?= Html::encode($this->title) ?></h3>
            </div>


            <?php Pjax::begin(); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

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
//            'id',
                            [
                                'attribute' => 'ticker',
                                'value' => 'ticker0.name'
                            ],
                            [
                                'attribute' => 'type',
                                'value' => 'type0.name'
                            ],
                            [
                                'attribute' => 'target',
                                'value' => function($model) {
                                    $targets = ForexTarget::find()->select('name')->column();
                                    $targetString = implode(',', $targets);
                                    return $targetString;
                                }
                            ],
                            [
                                'attribute' => 'result',
                                'value' => 'result0.name'
                            ],
                            [
                                'attribute' => 'pips',
                                'value' => 'pips0.name'
                            ],
//                                     'pips',
//            'ticker',
//            'type',
//            'target',
//            'result',
                            [
                                'attribute' => 'percentage',
                                'format' => 'raw',
                                'value' => function($model) {
                                    if ($model->result == 1) {


                                        return '<div class=" bg-success-transparent border border-success  text-success   p-1 br-5"style="display: flex;
justify-content: center;">
                                        
                                        <span class="fs-30 pe-2" style="font-size: 15px !important;">' . $model['percentage'] . ' %</span>
                                           
                                        </div>';
                                    } else if ($model->result == 2) {
                                        return '<div class=" bg-danger-transparent border border-danger  text-danger   p-1 br-5"style="display: flex;
justify-content: center;">
                                        
                                        <span class="fs-30 pe-2" style="font-size: 15px !important;">' . $model['percentage'] . ' %</span>
                                           
                                        </div>';
                                    }
                                    return $targetString;
                                }
                            ],
                            'comment:ntext',
//                            'date',
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, ForexSignals $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'id' => $model->id]);
//                }
//            ],
                            ['class' => 'yii\grid\ActionColumn',
                                'contentOptions' => ['style' => 'width: 140px;'],
                                'visible' => Yii::$app->user->isGuest ? false : true,
                                'template' => '{update}{delete}',
                                'buttons' => [
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

                    <?php Pjax::end(); ?>


                </div>
            </div>
        </div>
    </div>
</div>

<?php JSRegister::begin(); ?>
<script>


// on first focus (bubbles up to document), open the menu
    $(document).on('focus', '.select2-selection.select2-selection--single', function (e) {
        $(this).closest(".select2-container").siblings('select:enabled').select2('open');
    });

// steal focus during close - only capture once and stop propogation
    $('select.select2').on('select2:closing', function (e) {
        $(e.target).data("select2").$selection.one('focus focusin', function (e) {
            e.stopPropagation();
        });
    });


    $.ajax({
        url: '<?php echo Url::toRoute("/my-api/get-signals-stat") ?>',
        type: "POST",
        data: {
            'userId': '<?= Yii::$app->user->id ?>',
        },
        success: function (data) {


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
