<?php

use app\assets\CounterAsset;
use app\models\MembersSearch;
use richardfan\widget\JSRegister;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Pjax;

//CounterAsset::register($this);


/** @var View $this */
/** @var MembersSearch $searchModel */
/** @var ActiveDataProvider $dataProvider */
$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0"><?= Html::encode($this->title) ?></h3>
            </div>

            <?php Pjax::begin(); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]);     ?>
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
                            'subscription_date',
                            'from',
                            'to',
//                            'days_left',
                            [
                                'contentOptions' => ['style' => 'width:230px;'],
                                'format' => 'raw',
                                'value' => function($model) {
//                                    $now = new DateTime();
//                                    $toDateTime = DateTime::createFromFormat('Y-m-d h:m:s', $model["to"] . " 00:00:00");
//
//                                    yii\helpers\VarDumper::dump($now, 3, true);
//                                    yii\helpers\VarDumper::dump($now->getTimestamp(), 3, true);
//                                    yii\helpers\VarDumper::dump($toDateTime, 3, true);
//                                    yii\helpers\VarDumper::dump($toDateTime->getTimestamp(), 3, true);
//                                    yii\helpers\VarDumper::dump($toDateTime->getTimestamp() - $now->getTimestamp(), 3, true);
//                                    yii\helpers\VarDumper::dump($model["to"], 3, true);
                                    $secondsOfTodayLeft = (1 * 60 * 60) - (time() - strtotime("today"));
                                    $seconds = ($model["days_left"] * 60 * 60 * 24) + $secondsOfTodayLeft;

//                                    $seconds = $toDateTime->getTimestamp() - $now->getTimestamp();
                                    if ($seconds < 0) {
                                        $seconds = 1;
                                    }
//                                    yii\helpers\VarDumper::dump($seconds, 3, true);
//                                    die();
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
//                                'value' => function($model) {
//                                    return '<div class="border border-secondary">
//                                            <div>
//                                                <span class="text-secondary fs-30 pe-5"><i class="bi bi-calendar-day"></i></span>
//                                                <span  style="font-size: 15px;" id="timer-outputpattern" class="h3 text-secondary">02 Days 23 Hours 59 Minutes 02 Seconds</span>
//                                            </div>
//                                        </div>';
//                                }
                            ],
                            ['class' => 'yii\grid\ActionColumn',
                                'contentOptions' => ['style' => 'width: 70px;'],
                                'visible' => Yii::$app->user->isGuest ? false : true,
                                'template' => '{phone} {telegram}',
                                'buttons' => [
                                    'telegram' => function ($url, $model) {
                                        return Html::a('<i class="fa fa-telegram" data-bs-toggle="tooltip" title="" data-bs-original-title="" aria-label=""></i>', Url::to('https://t.me/' . $model->telegram, true), [
                                                    'style' => 'color:#2AABEE;'
                                        ]);
                                    },
                                    'phone' => function ($url, $model) {
                                        return Html::a('<i class="fa fa-whatsapp" data-bs-toggle="tooltip" title="" data-bs-original-title="" aria-label=""></i>', Url::to('https://wa.me/' . $model->phone, true), [
                                                    'style' => 'color:#4caf50;'
                                        ]);
                                    },
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


    var elementsByClass = document.getElementsByClassName("timer-countercallback");
    var a = $('.timer-countercallback');
    //console.log(a);
    for (var i = 0; i < a.length; i++) {
//        console.log(a[i]);
        var days = $(a[i]).attr('days');
//        console.log(days)
        $(a[i]).countdown({
            from: parseInt(days),
//            from: 1440,
            to: 0,
            timerEnd: function () {
                this.animate({'opacity': .5}, 500).css({'text-decoration': 'line-through'});
            }
        });
    }
    //console.log($('#timer-countercallback'));
    // changed output patterns
//    $('#timer-outputpattern').countdown({
//        outputPattern: '$day Days $hour Hours $minute Minutes $second Seconds',
//        from: 60 * 60 * 24 * 3
//    });

//    $('#timer-countercallback').countdown({
//        from: 1440,
//        to: 0,
//        timerEnd: function () {
//            this.animate({'opacity': .5}, 500).css({'text-decoration': 'line-through'});
//        }
//    });

</script>
<?php JSRegister::end(); ?>
