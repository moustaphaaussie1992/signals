<?php

use app\models\ForexPips;
use app\models\ForexResult;
use app\models\ForexSignalsSearch;
use app\models\ForexTarget;
use app\models\ForexTicker;
use app\models\ForexType;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
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
        <div class="col-lg-2">
            <?=
                    $form->field($model, 'ticker')
                    ->dropDownList(
                            ArrayHelper::map(ForexTicker::find()->asArray()->all(), 'id', 'name'
            ));
            ?>
        </div>
        <div class="col-lg-2">
            <?=
                    $form->field($model, 'type')
                    ->dropDownList(
                            ArrayHelper::map(ForexType::find()->asArray()->all(), 'id', 'name'
            ));
            ?>
        </div>
        <div class="col-lg-2">
            <?=
                    $form->field($model, 'target')
                    ->dropDownList(
                            ArrayHelper::map(ForexTarget::find()->asArray()->all(), 'id', 'name'
            ));
            ?>
        </div>
        <div class="col-lg-2">
            <?=
                    $form->field($model, 'result')
                    ->dropDownList(
                            ArrayHelper::map(ForexResult::find()->asArray()->all(), 'id', 'name'
            ));
            ?>
        </div>
        <div class="col-lg-2">
            <?=
                    $form->field($model, 'pips')
                    ->dropDownList(
                            ArrayHelper::map(ForexPips::find()->asArray()->all(), 'id', 'name'
            ));
            ?>
        </div>
        <div class="col-lg-2">



            <?= $form->field($model, 'comment')->textInput(['rows' => 6]) ?>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
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
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
                                'value' => 'target0.name'
                            ],
                            [
                                'attribute' => 'result',
                                'value' => 'result0.name'
                            ],
                            [
                                'attribute' => 'pips',
                                'value' => 'pips0.name'
                            ],
//            'ticker',
//            'type',
//            'target',
//            'result',
                            //'pips',
                            //'comment:ntext',
                            //'date',
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

