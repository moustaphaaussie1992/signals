<?php

use app\assets\LoginAsset;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;

LoginAsset::register($this);
$sashPath = Yii::getAlias('@web') . '/sash';
?>
<?php $this->beginPage() ?>
<html lang="en" dir="ltr">

    <head>

        <!-- META DATA -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
        <meta name="author" content="Spruko Technologies Private Limited">
        <meta name="keywords" content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">


        <!-- TITLE -->
        <title>Sash – Bootstrap 5 Admin & Dashboard Template</title>
        <?php $this->head() ?>

    </head>


    <body class="app sidebar-mini ltr login-img">
        <?php $this->beginBody() ?>
        <!-- BACKGROUND-IMAGE -->
        <div class="">

            <!-- GLOABAL LOADER -->
            <div id="global-loader">
                <img src="<?= $sashPath ?>/assets/images/loader.svg" class="loader-img" alt="Loader">
            </div>
            <!-- /GLOABAL LOADER -->

            <!-- PAGE -->
            <div class="page">
                <div class="">

                    <!-- CONTAINER OPEN -->
                    <div class="col col-login mx-auto mt-7">
                        <div class="text-center">
                            <a href="index.html"><img src="<?= $sashPath ?>/assets/images/brand/logo-white.png" class="header-brand-img" alt=""></a>
                        </div>
                    </div>

                    <div class="container-login100">


                        <div class="wrap-login100 p-6">


                            <span class="login100-form-title pb-5">
                                Login
                            </span>
                            <div class="panel panel-primary">
                                <div class="tab-menu-heading">

                                    <?php
                                    $form = ActiveForm::begin([
                                                'id' => 'login-form',
//                                                        'layout' => 'horizontal',
                                                'fieldConfig' => [
                                                    'template' => "{label}\n{input}\n{error}",
                                                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                                                    'inputOptions' => ['class' => 'col-lg-12 form-control'],
                                                    'errorOptions' => ['class' => 'col-lg-12 invalid-feedback'],
                                                ],
                                    ]);
                                    ?>

                                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                                    <?= $form->field($model, 'password')->passwordInput() ?>
                                    <span style="margin-top: 0px;" class="text-dark mb-0"><a style="font-size: 12px; margin-top: 0px;" href="<?= Url::to(['user/forget-password']) ?>" class="text-primary ms-1">Forget Password</a></span>
                                    <br>
                                    <br>
                                    <?=
                                    $form->field($model, 'rememberMe')->checkbox([
                                        'template' => "<div class=\" col-lg-12 custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                                    ])
                                    ?>

                                    <div class="form-group">
                                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary col-lg-12', 'name' => 'login-button']) ?>
                                    </div>

                                    <?php ActiveForm::end(); ?>

                                </div>
                            </div>

                            <div class="text-center pt-3">
                                <p class="text-dark mb-0">Make new account?<a href="<?= Url::to(['user/sign-up']) ?>" class="text-primary ms-1">Register</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- CONTAINER CLOSED -->
                </div>
            </div>
            <!-- End PAGE -->

        </div>
        <?php $this->endBody() ?>
    </body>

</html>
<?php $this->endPage() ?>