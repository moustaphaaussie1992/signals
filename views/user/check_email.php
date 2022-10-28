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
                                Verification
                            </span>
                            <div class="panel panel-primary">

                                    Please check you email to verify your account


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