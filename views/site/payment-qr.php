<?php

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\ValidationException;

$writer = new PngWriter();







// (B) CREATE QR CODE
$qr = QrCode::create($pay_address);
$writer = new PngWriter();
$result = $writer->write($qr);

// (C) OUTPUT QR CODE
// (C1) SAVE TO FILE
// (C3) GENERATE DATA URI
// Generate a data URI to include image data inline (i.e. inside an <img> tag)
//yii\helpers\VarDumper::dump($dataUri, 3, 3);
//die();
?>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row row-sm">
                    <div class="col-xl-5 col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="product-carousel">
                                    <div id="Slider" class="carousel slide border" data-bs-ride="false">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active"><img src='<?= $result->getDataUri() ?>' alt="img" class="img-fluid mx-auto d-block">
                                                <div class="text-center mt-5 mb-5 btn-list">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
                        <div class="mt-2 mb-4">
                            <h4 class="mb-3 fw-semibold">
                                Send the funds to this address
                            </h4>
                            <h3 class="mb-3 fw-semibold">
                                <?= $pay_address ?>
                            </h3>
                            <p class="text-muted float-start me-3">
                                <span class="fa fa-star text-warning"></span>
                                <span class="fa fa-star text-warning"></span>
                                <span class="fa fa-star text-warning"></span>
                                <span class="fa fa-star-half-o text-warning"></span>
                                <span class="fa fa-star-o text-warning"></span>
                            </p>
                            <p class="text-muted mb-4">( 40 Customers Reviews) </p>
                            <h4 class="mt-4"><b> Description</b></h4>
                            <p> <?= $order["description"] ?></p>

                            <h3 class="mb-4"><span class="me-2 fw-bold fs-25">$<?= $order["price"] ?> USD/</span><span><del class="fs-18 text-muted">$599</del></span></h3>
                            <div class=" mt-4 mb-5"><span class="fw-bold me-2">Availability :</span><span class="fw-bold text-success">available</span></div>


                            <hr>
                            <div class="btn-list mt-4">
                                <a href="index" class="btn ripple btn-primary me-2"><i class="fe fe-menu"> </i> Go to Prolabz Console</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

