<?php

use app\models\CryptoSignalsSearch;
use app\models\CryptoTarget;
use app\models\Utils;
use richardfan\widget\JSRegister;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Pjax;

/** @var View $this */
/** @var CryptoSignalsSearch $searchModel */
/** @var ActiveDataProvider $dataProvider */
$this->title = 'Crypto Signals';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="">
    <div class="row">

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="wideget-user mb-2">
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="row">
                                    <div class="profile-cover__img "style="position: inherit!important">
                                        <div class="profile-img-1" >
                                            <img src="<?= Yii::getAlias('@web') . "/profilePhotos/" . $user['photo'] ?>" style="height: 120px;width: 120px;object-fit: cover;" alt="img">
                                        </div>
                                        <div class="profile-img-content text-dark text-start">
                                            <div class="text-dark">



                                                <h3 class="h3 mb-2"style="float:left;"><?= $user["username"] ?></h3>


                                                <h3 class="h3 mb-2"style="font-size:26px ; color:#6c5ffc "> #<?= $user["id"] ?></h3>




                                                <h5 class="text-muted"style="margin-top: 15px;"><?= $user["email"] ?></h5>



                                            </div>

                                        </div>

                                    </div>
                                    <!--                                    <div class="btn-profile">
                                                                            <button class="btn btn-primary mt-1 mb-1"> <i class="fa fa-rss"></i> <span>Follow</span></button>
                                                                            <button class="btn btn-secondary mt-1 mb-1"> <i class="fa fa-envelope"></i> <span>Message</span></button>
                                                                        </div>-->

                                </div>
                                <div class="row">
                                    <div class="px-0 px-sm-4">
                                        <div class="social social-profile-buttons mt-5 float-start">
                                            <div class="mt-3">
                                                <a class="social-icon text-primary" href="<?= $user['facebook'] ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                                <a class="social-icon text-primary" href="<?= $user['twitter'] ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                                                <a class="social-icon text-primary" href="<?= $user["insta"] ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                                                <a class="social-icon text-primary" href="<?= $user["telegram_link"] ?>" target="_blank"><i class="fa fa-telegram"></i></a>
                                                <a class="social-icon text-primary" href="<?= $user["tiktok"] ?>" target="_blank"><svg style="    width: 16px;"class='fontawesomesvg' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Free 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. --><path d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z" fill="#6c5ffc"/></svg></a>
                                                <a class="social-icon text-primary" href="<?= $user["discord"] ?>" target="_blank"><svg style ="width:20px"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M524.531,69.836a1.5,1.5,0,0,0-.764-.7A485.065,485.065,0,0,0,404.081,32.03a1.816,1.816,0,0,0-1.923.91,337.461,337.461,0,0,0-14.9,30.6,447.848,447.848,0,0,0-134.426,0,309.541,309.541,0,0,0-15.135-30.6,1.89,1.89,0,0,0-1.924-.91A483.689,483.689,0,0,0,116.085,69.137a1.712,1.712,0,0,0-.788.676C39.068,183.651,18.186,294.69,28.43,404.354a2.016,2.016,0,0,0,.765,1.375A487.666,487.666,0,0,0,176.02,479.918a1.9,1.9,0,0,0,2.063-.676A348.2,348.2,0,0,0,208.12,430.4a1.86,1.86,0,0,0-1.019-2.588,321.173,321.173,0,0,1-45.868-21.853,1.885,1.885,0,0,1-.185-3.126c3.082-2.309,6.166-4.711,9.109-7.137a1.819,1.819,0,0,1,1.9-.256c96.229,43.917,200.41,43.917,295.5,0a1.812,1.812,0,0,1,1.924.233c2.944,2.426,6.027,4.851,9.132,7.16a1.884,1.884,0,0,1-.162,3.126,301.407,301.407,0,0,1-45.89,21.83,1.875,1.875,0,0,0-1,2.611,391.055,391.055,0,0,0,30.014,48.815,1.864,1.864,0,0,0,2.063.7A486.048,486.048,0,0,0,610.7,405.729a1.882,1.882,0,0,0,.765-1.352C623.729,277.594,590.933,167.465,524.531,69.836ZM222.491,337.58c-28.972,0-52.844-26.587-52.844-59.239S193.056,219.1,222.491,219.1c29.665,0,53.306,26.82,52.843,59.239C275.334,310.993,251.924,337.58,222.491,337.58Zm195.38,0c-28.971,0-52.843-26.587-52.843-59.239S388.437,219.1,417.871,219.1c29.667,0,53.307,26.82,52.844,59.239C470.715,310.993,447.538,337.58,417.871,337.58Z" fill="#6c5ffc"/></svg></a>
                                                <!--<a class="social-icon text-primary" href="javascript:void(0)"><i class="fa fa-rss"></i></a>-->
                                                <!--<a class="social-icon text-primary" href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i></a>-->
                                                <!--<a class="social-icon text-primary" href="https://myaccount.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Crypto Subscriptions Pachages</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="main-profile-contact-list">
                                            <div class="me-5">
                                                <div class="media mb-4 d-flex">
                                                    <div class="media-icon bg-secondary bradius me-3 mt-1">
                                                        <i style ="    display: inline!important;" class=" lnr lnr-cart fs-30 text-white mt-4"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <span class="text-muted">Crypto 1 Month Subscription</span>
                                                        <div class="fw-semibold fs-25">
                                                            <?= $user["monthly_charge_offer"] ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="me-5 mt-5 mt-md-0">
                                                <div class="media mb-4 d-flex">
                                                    <div class="media-icon bg-success bradius text-white me-3 mt-1">
                                                        <span class="mt-3">
                                                            <i style ="    display: inline;"class=" lnr lnr-cart fs-30 text-white mt-4"></i>
                                                        </span>

                                                    </div>
                                                    <div class="media-body">
                                                        <span class="text-muted">Crypto 3 Months Subscription</span>
                                                        <div class="fw-semibold fs-25">
                                                            <?= $user["three_months_offer"] ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="me-5 mt-5 mt-md-0">
                                                <div class="media mb-4 d-flex">
                                                    <div class="media-icon bg-danger bradius text-white me-3 mt-1">
                                                        <span class="mt-3">
                                                            <i style ="    display: inline;" class=" lnr lnr-cart fs-30 text-white mt-4"></i>
                                                        </span>
                                                    </div>
                                                    <div class="media-body">
                                                        <span class="text-muted">Crypto 1 Year Subscription</span>
                                                        <div class="fw-semibold fs-25">
                                                            <?= $user["year_offer"] ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="me-0 mt-5 mt-md-0">
                                                <div class="media">
                                                    <div class="media-icon bg-primary text-white bradius me-3 mt-1">
                                                        <span class="mt-3">
                                                            <i style ="    display: inline;" class=" lnr lnr-cart fs-30 text-white mt-4"></i>
                                                        </span>
                                                    </div>
                                                    <div class="media-body">
                                                        <span class="text-muted">Crypto Life Time Subscription</span>
                                                        <div class="fw-semibold fs-25">
                                                            <?= $user["all_till_offer"] ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Crypto</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="main-profile-contact-list">
                                            <div class="me-5">
                                                <div class="media mb-4 d-flex">
                                                    <div class="media-icon bg-secondary bradius me-3 mt-1">
                                                        <i class="fa fa-line-chart fs-20 text-white"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <span class="text-muted">Signals</span>
                                                        <div class="fw-semibold fs-25">
                                                            <?= Utils::getSignalCryptoCountByUserId($user["id"]) ?>
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
                                                            <?php
                                                            $wonCryptoSignals = Utils::getSignalCryptoCountWinByUserId($user["id"]);
                                                            echo $wonCryptoSignals;
                                                            ?>
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
                                                            <?= Utils::getSignalCryptoCountLossByUserId($user["id"]) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="me-0 mt-5 mt-md-0">
                                                <div class="media">
                                                    <div class="media-icon bg-primary text-white bradius me-3 mt-1">
                                                        <span class="mt-3">
                                                            <i class="fa fa-percent fs-20"></i>
                                                        </span>
                                                    </div>
                                                    <div class="media-body">
                                                        <span class="text-muted">Profit From Signals</span>
                                                        <div class="fw-semibold fs-25">
                                                            <?= Utils::getSignalCryptoProfitByUserId($user["id"]) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Crypto Percentage</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="main-profile-contact-list">
                                            <div class="me-5">
                                                <div class="media mb-4 d-flex">
                                                    <div class="media-icon bg-secondary bradius me-3 mt-1">
                                                        <i class="fa fa-line-chart fs-20 text-white"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <span class="text-muted">Net Crypto Signals Profit</span>
                                                        <div class="fw-semibold fs-25">
                                                            <?= $netProfit ?>
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
                                                        <span class="text-muted">Won Crypto Signals Profit</span>
                                                        <div class="fw-semibold fs-25">
                                                            <?= $wonProfit
                                                            ?>
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
                                                        <span class="text-muted">Loss Crypto Signals Profit</span>
                                                        <div class="fw-semibold fs-25">
                                                            <?= $lossProfit ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


            </div>


            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Biography</div>
                        </div>
                        <div class="card-body ">
                            <div>
                                <p>
                                    <?= $user["bio"] ?>
                                </p>
                            </div>
                            <hr><!-- comment -->

                                <div class="d-flex align-items-center mb-3 mt-3">
                                    <div class="me-4 text-center text-primary">
                                        <span><i class="fe fe-link fs-20"></i></span>
                                    </div>
                                    <div>

                                        <a style='color: white!important;' class="social-icon text-primary" href="<?= $user['telegram_link'] ?>" target="_blank"><?= $user['telegram_link'] ?></a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3 mt-3">
                                    <div class="me-4 text-center text-primary">
                                        <span><i class="fe fe-phone fs-20"></i></span>
                                    </div>
                                    <div>
                                        <a style='color: white!important;'class="social-icon text-primary" href="<?= Url::to('https://wa.me/' . $user['contact_number']) ?>" target="_blank"><?= $user['contact_number'] ?></a>

                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3 mt-3">
                                    <div class="me-4 text-center text-primary">
                                        <span><i class="fe fe-mail fs-20"></i></span>
                                    </div>
                                    <div>

                                    </div><a style='color: white!important;' class="social-icon text-primary" href="<?= Url::to('mailto:' . $user['email']) ?>" target="_blank"><?= $user['email'] ?></a>

                                </div>
                        </div>
                    </div>

                </div>

            </div>


        </div>
    </div>



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
//                        'filterModel' => $searchModel,
                        'rowOptions' => function($model, $key, $index, $column) {
                            if ($index % 2 == 0) {
                                return ['style' => 'background:rgba(0, 0, 0, 0.02);'];
                            }
                        },
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'date',
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
                                    $s = explode(',', $model->target);
                                    $targets = CryptoTarget::find()->select('name')->where(["id" => $s])->column();
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
                                    return $model->result;
                                }
                            ],
//                            'date',
                        ],
                    ]);
                    ?>

                    <?php Pjax::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
