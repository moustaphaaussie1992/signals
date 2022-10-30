<?php

use app\models\User;
use app\models\UserSearch;
use SebastianBergmann\Type\Type;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/** @var View $this */
/** @var UserSearch $searchModel */
/** @var ActiveDataProvider $dataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">




    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>


 


</div>
    <div class="col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0"><?= Html::encode($this->title) ?></h3>
            </div>

           


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
                                 [
                                'attribute' => 'id',
                                    'format' => 'raw',
                                'value' => function($model) {

                                  return Html::tag('span', "#".$model->id, ['class'=>"",'style'=>'
    color: #6c5ffc;    font-size: 20px;']);
                         
                                }
                            ],
//                            ['class' => 'yii\grid\SerialColumn'],
//                            [
//                                'attribute' => 'id',
//                                'group' => true,
//                            ],
                                [
                                'attribute' => 'photo',
                                    'format' => 'raw',
                                'value' => function($model) {

                                  return  Html::img('@web/profilePhotos/'.$model['photo'].'',['class' => 'class="avatar avatar-md br-7"'])  ;
                         
                                }
                            ],
                            'fullname',
                      
                                    'monthly_charge_offer',
                                    'three_months_offer',
                                    'all_till_offer',

                 
                    
                           
                                
                            ['class' => 'yii\grid\ActionColumn',
                                'contentOptions' => ['style' => 'width: 240px;'],
                                'visible' => Yii::$app->user->isGuest ? false : true,
                                'template' => '{phone} {telegram}{discord}{twitter}{facebook}{instagram}{tiktok}',
                                'buttons' => [
                                    'telegram' => function ($url, $model) {
                                      
                                          return Html::a('<span class="fa fa-telegram "></span>', Url::to( $model["telegram_link"], true), [
                                                    'class' => 'btn  btn-sm',
                                                    'style' => 'color:#2AABEE'
                                        ]);
                                    },
                                    'phone' => function ($url, $model) {
                                 
                                           return Html::a('<span class="fa fa-whatsapp "></span>', Url::to('https://wa.me/' . $model["contact_number"], true), [
                                                    'class' => 'btn  btn-sm',
                                                    'style' => 'color:#4caf50'
                                        ]);
                                    },
                                             'instagram' => function ($url, $model) {
                                      
                                          return Html::a('<span class="fa fa-instagram "></span>', Url::to( $model["insta"], true), [
                                                    'class' => 'btn  btn-sm',
                                                    'style' => 'color:#cf3a95'
                                        ]);
                                    },
                                    'facebook' => function ($url, $model) {
                                 
                                           return Html::a('<span class="fa fa-facebook "></span>', Url::to($model["facebook"], true), [
                                                    'class' => 'btn  btn-sm',
                                                    'style' => 'color:#1773ea'
                                        ]);
                                    },
                                                    'discord' => function ($url, $model) {
                                      
                                        return Html::a("<svg style='width:15!important''xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d='M524.531,69.836a1.5,1.5,0,0,0-.764-.7A485.065,485.065,0,0,0,404.081,32.03a1.816,1.816,0,0,0-1.923.91,337.461,337.461,0,0,0-14.9,30.6,447.848,447.848,0,0,0-134.426,0,309.541,309.541,0,0,0-15.135-30.6,1.89,1.89,0,0,0-1.924-.91A483.689,483.689,0,0,0,116.085,69.137a1.712,1.712,0,0,0-.788.676C39.068,183.651,18.186,294.69,28.43,404.354a2.016,2.016,0,0,0,.765,1.375A487.666,487.666,0,0,0,176.02,479.918a1.9,1.9,0,0,0,2.063-.676A348.2,348.2,0,0,0,208.12,430.4a1.86,1.86,0,0,0-1.019-2.588,321.173,321.173,0,0,1-45.868-21.853,1.885,1.885,0,0,1-.185-3.126c3.082-2.309,6.166-4.711,9.109-7.137a1.819,1.819,0,0,1,1.9-.256c96.229,43.917,200.41,43.917,295.5,0a1.812,1.812,0,0,1,1.924.233c2.944,2.426,6.027,4.851,9.132,7.16a1.884,1.884,0,0,1-.162,3.126,301.407,301.407,0,0,1-45.89,21.83,1.875,1.875,0,0,0-1,2.611,391.055,391.055,0,0,0,30.014,48.815,1.864,1.864,0,0,0,2.063.7A486.048,486.048,0,0,0,610.7,405.729a1.882,1.882,0,0,0,.765-1.352C623.729,277.594,590.933,167.465,524.531,69.836ZM222.491,337.58c-28.972,0-52.844-26.587-52.844-59.239S193.056,219.1,222.491,219.1c29.665,0,53.306,26.82,52.843,59.239C275.334,310.993,251.924,337.58,222.491,337.58Zm195.38,0c-28.971,0-52.843-26.587-52.843-59.239S388.437,219.1,417.871,219.1c29.667,0,53.307,26.82,52.844,59.239C470.715,310.993,447.538,337.58,417.871,337.58Z'fill='#FFFFFF';'/></svg>
                                           ", Url::to( $model["tiktok"], true), [
                                                    'class' => 'btn  btn-sm',
                                                    'style' => 'color:#FFFFFF;'
                                        ]);
                                    },
                                                           'twitter' => function ($url, $model) {
                                      
                                          return Html::a('<span class="fa fa-twitter "></span>', Url::to( $model["twitter"], true), [
                                                    'class' => 'btn  btn-sm',
                                                    'style' => 'color:#1c9ceb'
                                        ]);
                                    },
                                                                'tiktok' => function ($url, $model) {
                                      
                                             return Html::a("<svg class='fontawesomesvg' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'><!--! Font Awesome Free 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. --><path d='M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z' fill='#FFFFFF'/></svg>
                                           ", Url::to( $model["tiktok"], true), [
                                                    'class' => 'btn  btn-sm',
                                                    'style' => 'color:#FFFFFF'
                                        ]);
                                    
                                    },
                                
                                ],
                            ],
                   
                        ],
                    ]);
                    ?>
                </div>

            </div>

        </div>
    </div>
