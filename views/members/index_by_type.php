<?php

use app\models\MembersSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Pjax;

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
                            'subscription_date',
                            'from',
                            'to',
                            'days_left',
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