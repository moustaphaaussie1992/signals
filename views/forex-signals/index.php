<?php

use app\models\CryptoType;
use app\models\ForexPips;
use app\models\ForexResult;
use app\models\ForexSignalsSearch;
use app\models\ForexTarget;
use app\models\ForexTicker;
use kartik\select2\Select2;
use richardfan\widget\JSRegister;
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
                                   if($model->result == 1){
                                    
                                         
                                                                                return '<div class=" bg-success-transparent border border-success  text-success   p-1 br-5"style="display: flex;
justify-content: center;">
                                        
                                        <span class="fs-30 pe-2" style="font-size: 15px !important;">'.$model['percentage'].' %</span>
                                           
                                        </div>';
                                   }else if($model->result==2){
                                       return '<div class=" bg-danger-transparent border border-danger  text-danger   p-1 br-5"style="display: flex;
justify-content: center;">
                                        
                                        <span class="fs-30 pe-2" style="font-size: 15px !important;">'.$model['percentage'].' %</span>
                                           
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





</script>
<?php JSRegister::end(); ?>
