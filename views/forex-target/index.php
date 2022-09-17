<?php

use app\models\ForexTarget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ForexTargetSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
$this->title = 'Forex Targets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forex-target-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Forex Target', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'name',
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, ForexTarget $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'id' => $model->id]);
//                 }
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


</div>
