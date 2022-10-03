<?php

use app\models\CryptoCoin;
use app\models\CryptoPair;
use app\models\CryptoResult;
use app\models\CryptoSignalsSearch;
use app\models\CryptoTarget;
use app\models\CryptoType;
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
/** @var CryptoSignalsSearch $searchModel */
/** @var ActiveDataProvider $dataProvider */
$this->title = 'Crypto Signals';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="crypto-signals-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-1">



            <?=
            $form->field($model, 'coin')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(CryptoCoin::find()->all(), 'id', 'name'),
                'options' =>
                ['placeholder' => '...',
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
            $form->field($model, 'pair')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(CryptoPair::find()->all(), 'id', 'name'),
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
                'data' => ArrayHelper::map(CryptoTarget::find()->all(), 'id', 'name'),
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
                'data' => ArrayHelper::map(CryptoResult::find()->all(), 'id', 'name'),
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
            <?= Html::submitButton('Add Signal', ['class' => 'btn btn-success', 'style' => 'margin-top: 27px;']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>


</div>


<div class="row">




    <div class="col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0"><?= Html::encode($this->title) ?></h3>
            </div>



            <?php Pjax::begin(); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]);   ?>
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
                                'attribute' => 'coin',
                                'value' => 'coin0.name'
                            ],
                            [
                                'attribute' => 'pair',
                                'value' => 'pair0.name'
                            ],
                            [
                                'attribute' => 'type',
                                'value' => 'type0.name'
                            ],
                            [
                                'attribute' => 'target',
                                'value' => function($model) {
                                    $targets = CryptoTarget::find()->select('name')->column();
                                    $targetString = implode(',', $targets);
                                    return $targetString;
                                }
                            ],
                            [
                                'attribute' => 'result',
                                'value' => 'result0.name'
                            ],
                          
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
//                            'date',
                            'comment:ntext',
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, CryptoSignals $model, $key, $index, $column) {
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

