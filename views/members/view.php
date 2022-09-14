<?php

use app\models\Members;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/** @var View $this */
/** @var Members $model */
$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="members-view">

    <h1><?= Html::encode($model->fullname) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'fe fe-edit fs-14 btn text-primary my-ajax']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'fe fe-trash-2 fs-14 btn text-danger btn-sm',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>


    <br>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fullname',
            'registration_date',
            'phone',
            'telegram',
        ],
    ])
    ?>

    <h1><?= Html::encode("Subscriptions") ?></h1>
    <span>
        <?=
        Html::a('Add Subscription', ['subscriptions/create-from-member?memberId=' . $model["id"]], [
            'class' => 'fe fe-plus fs-14 btn text-green',
        ])
        ?>
    </span>


    <?php // echo $this->render('_search', ['model' => $searchModel]);   ?>

    <div class="card-body">
        <div class="grid-margin">
            <?=
            GridView::widget([
                'dataProvider' => $provider,
                'rowOptions' => function($model, $key, $index, $column) {
                    if ($index % 2 == 0) {
                        return ['style' => 'background:rgba(0, 0, 0, 0.02);'];
                    }
                },
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'fullname',
                    'typeName',
                    'from',
                    'to',
                    'subscription_date',
                    'fee',
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, Subscriptions $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'id' => $model->id]);
//                }
//            ],
                    ['class' => 'yii\grid\ActionColumn',
                        'contentOptions' => ['style' => 'width: 100px;'],
                        'visible' => Yii::$app->user->isGuest ? false : true,
                        'template' => '{update}{delete}',
                        'buttons' => [
                            'update' => function ($url, $model) {
                                return Html::a('<span class="fe fe-edit fs-14"></span>', ['subscriptions/update-from-member?id=' . $model["id"] . '&memberId=' . $model["member_id"]], [
                                            'class' => 'btn text-primary btn-sm',
                                            'title' => 'Edit'
                                ]);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a('<span class="fe fe-trash-2 fs-14"></span>', ['subscriptions/delete-from-member?id=' . $model["id"] . '&memberId=' . $model["member_id"]], [
                                            'class' => 'btn text-danger btn-sm',
                                            'data' => [
                                                'method' => 'post',
                                                'params' => [
                                                    'id' => $model["id"]
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

</div>
