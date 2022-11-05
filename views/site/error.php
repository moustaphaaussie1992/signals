<?php
//
/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */

/** @var Exception$exception */
use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">



    <div class="alert alert-danger">
        <?php
        if ($name == "Forbidden (#403)") {
            ?>


            <body class="login-img dark-mode">

                <!-- BACKGROUND-IMAGE -->
                <div class="">

                    <!-- GLOBAL-LOADER -->
                    <div id="global-loader" style="display: none;">
                        <img src="../assets/images/loader.svg" class="loader-img" alt="Loader">
                    </div>
                    <!-- End GLOBAL-LOADER -->



                    <!-- PAGE -->
                    <div class="page" style="--primary01:rgba(108, 95, 252, 0.1); --primary02:rgba(108, 95, 252, 0.2); --primary03:rgba(108, 95, 252, 0.3);--primary06:rgba(108, 95, 252, 0.6); --primary09:rgba(108, 95, 252, 0.9); --primary005:rgba(108, 95, 252, 0.05);">
                        <!-- PAGE-CONTENT OPEN -->
                        <div class="page-content error-page error2 text-white">
                            <div class="container text-center">
                                <div class="error-template">
                                    <h1 class="display-1 mb-2">4<span class="custom-emoji"><svg xmlns="http://www.w3.org/2000/svg" height="140" width="140" data-name="Layer 1" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" fill="#a2a1ff"></circle><path fill="#6563ff" d="M14.99951 17.0918a.99473.99473 0 0 1-.64209-.23438 3.766 3.766 0 0 0-4.71484 0 .99955.99955 0 1 1-1.28516-1.53125 5.81162 5.81162 0 0 1 7.28516 0 .99974.99974 0 0 1-.64307 1.76563zM8.25 12a1 1 0 0 1-.707-1.707l.293-.293-.293-.293A.99989.99989 0 0 1 8.957 8.293l1 1a.99962.99962 0 0 1 0 1.41406l-1 1A.99676.99676 0 0 1 8.25 12z"></path><path fill="#6563ff" d="M10.25 12a.99676.99676 0 0 1-.707-.293l-1-1a.99962.99962 0 0 1 0-1.41406l1-1A.99989.99989 0 0 1 10.957 9.707l-.293.293.293.293A1 1 0 0 1 10.25 12zM14.25 12a1 1 0 0 1-.707-1.707l.293-.293-.293-.293A.99989.99989 0 0 1 14.957 8.293l1 1a.99962.99962 0 0 1 0 1.41406l-1 1A.99676.99676 0 0 1 14.25 12z"></path><path fill="#6563ff" d="M16.25,12a.99676.99676,0,0,1-.707-.293l-1-1a.99962.99962,0,0,1,0-1.41406l1-1A.99989.99989,0,0,1,16.957,9.707l-.293.293.293.293A1,1,0,0,1,16.25,12Z"></path></svg></span>3</h1>
                                    <h5 class="error-details">
                                        Sorry,<?= $message ?>
                                    </h5>
                                    <div class="text-center">
                                        <a class="btn btn-secondary mt-5 mb-5" href="site/index"> <i class="fa fa-long-arrow-left"></i> Back to Home </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- PAGE-CONTENT OPEN CLOSED -->
                    </div>
                    <!-- End PAGE -->

                </div>
                <!-- BACKGROUND-IMAGE -->





            </body>
            <?php
        } else if ($name == "Not Found (#404)") {
            ?>
            <body class="login-img dark-mode">

                <!-- BACKGROUND-IMAGE -->
                <div class="">

                    <!-- GLOBAL-LOADER -->
                    <div id="global-loader" style="display: none;">
                        <img src="../assets/images/loader.svg" class="loader-img" alt="Loader">
                    </div>
                    <!-- End GLOBAL-LOADER -->

                    <!-- PAGE -->
                    <div class="page">
                        <!-- PAGE-CONTENT OPEN -->
                        <div class="page-content error-page error2 text-white">
                            <div class="container text-center">
                                <div class="error-template">
                                    <h1 class="display-1 mb-2">4<span class="custom-emoji"><svg xmlns="http://www.w3.org/2000/svg" height="140" width="140" data-name="Layer 1" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" fill="#a2a1ff"></circle><path fill="#6563ff" d="M15.999,17a.99764.99764,0,0,1-.59912-.2002l-.7334-.5498-.73291.5498a.99755.99755,0,0,1-1.20019,0L12,16.25l-.7334.5498a.9999.9999,0,0,1-1.20019-1.5996l1.33349-1a.99757.99757,0,0,1,1.2002,0l.7334.5498.73291-.5498a.99755.99755,0,0,1,1.20019,0l1.3335,1A1.00013,1.00013,0,0,1,15.999,17Z"></path><path fill="#6563ff" d="M13.33252 17a.9976.9976 0 0 1-.59912-.2002L12 16.25l-.7334.5498a.99755.99755 0 0 1-1.20019 0L9.3335 16.25l-.7334.5498a.9999.9999 0 0 1-1.2002-1.5996l1.3335-1a.99755.99755 0 0 1 1.20019 0l.73291.5498.7334-.5498a.99757.99757 0 0 1 1.2002 0l1.33349 1A1.00013 1.00013 0 0 1 13.33252 17zM8.37109 12.5a1 1 0 0 1-.707-1.707L8.457 10l-.793-.793A.99989.99989 0 0 1 9.07812 7.793l1.5 1.5a.99962.99962 0 0 1 0 1.41406l-1.5 1.5A.99676.99676 0 0 1 8.37109 12.5zM15.87109 12.5a.99678.99678 0 0 1-.707-.293l-1.5-1.5a.99964.99964 0 0 1 0-1.41406l1.5-1.5A.99989.99989 0 0 1 16.57812 9.207l-.793.793.793.793a1 1 0 0 1-.707 1.707z"></path></svg></span>4</h1>
                                    <h5 class="error-details">
                                        Sorry, an error has occured, Requested page not found!
                                    </h5>
                                    <div class="text-center">
                                        <a class="btn btn-secondary mt-5 mb-5" href="site/index"> <i class="fa fa-long-arrow-left"></i> Back to Home </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- PAGE-CONTENT OPEN CLOSED -->
                    </div>
                    <!-- End PAGE -->

                </div>
                <!-- BACKGROUND-IMAGE -->

                <!-- JQUERY JS -->




            </body>

        <?php }
        ?>
    </div>




</div>
