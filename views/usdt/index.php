<?php

use app\models\Usdt;
use app\models\UsdtSearch;
use kartik\select2\Select2;
use richardfan\widget\JSRegister;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/** @var View $this */
/** @var UsdtSearch $searchModel */
/** @var ActiveDataProvider $dataProvider */
$this->title = 'Usdts';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="usdt-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-2">

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-2">


            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-2">

            <?= $form->field($model, 'price')->textInput() ?>
        </div>
        <div class="col-lg-2">


            <?=
            $form->field($model, 'type')->widget(Select2::classname(), [
                'data' => ['1' => 'buy', '2' => 'sell'],
                'options' => ['placeholder' => '...',
                    'style' => "width:100%!important"
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                    'multiple' => false
                ],
            ]);
            ?>
        </div>


        <div class="form-group col-lg-2">
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
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
//                            'id',
                            'name',
                            'phone',
                            'price',
//                            'date',
                            'type',
                            [
                                'attribute' => 'type',
                                'value' => function($model) {
                                    if ($model->type == 1) {
                                        return "buy";
                                    } else {
                                        return "sell";
                                    }
                                }
                            ],
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
                            ],
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