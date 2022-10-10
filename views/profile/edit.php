<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;

$sashPath = Yii::getAlias('@web') . '/sash';
?>



<!-- CONTAINER -->
<div class="main-container container-fluid">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Edit Profile</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Password</div>
                </div>
                <div class="card-body">


                            <!--<p class="bold">Please fill out the following fields to change password:</p>-->


                    <?php $formLogout = ActiveForm::begin(['id' => 'form-change']); ?>

                    <?= $formLogout->field($modelChangePassword, 'oldPassword')->passwordInput() ?>

                    <?= $formLogout->field($modelChangePassword, 'newPassword')->passwordInput() ?>

                    <?= $formLogout->field($modelChangePassword, 'retypePassword')->passwordInput() ?>

                    <?= $formLogout->errorSummary($modelChangePassword); ?>







                    <!--                    <div class="form-group">
                                            <label class="form-label">Current Password</label>
                                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 form-control" type="password" placeholder="Current Password" autocomplete="current-password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">New Password</label>
                                            <div class="wrap-input100 validate-input input-group" id="Password-toggle1">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 form-control" type="password" placeholder="New Password" autocomplete="new-password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Confirm Password</label>
                                            <div class="wrap-input100 validate-input input-group" id="Password-toggle2">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 form-control" type="password" placeholder="Confirm Password" autocomplete="new-password">
                                            </div>
                                        </div>-->
                </div>
                <div class="card-footer text-end">
                    <div class="form-group">
                        <?= Html::submitButton('Change', ['class' => 'btn btn-primary', 'name' => 'change-button']) ?>
                    </div>
                    <!--                    <a href="javascript:void(0)" class="btn btn-primary">Update</a>
                                        <a href="javascript:void(0)" class="btn btn-danger">Cancel</a>-->
                </div>
                <?php ActiveForm::end(); ?>

            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Social Media</h3>
                </div>
                <div class="card-body">
                    <?php $userSocialMediaForm = ActiveForm::begin(); ?>

                    <?= $userSocialMediaForm->field($userSocialMediaModel, 'twitter')->textInput(['maxlength' => true]) ?>

                    <?= $userSocialMediaForm->field($userSocialMediaModel, 'facebook')->textInput(['maxlength' => true]) ?>

                    <?= $userSocialMediaForm->field($userSocialMediaModel, 'tiktok')->textInput(['maxlength' => true]) ?>

                    <?= $userSocialMediaForm->field($userSocialMediaModel, 'insta')->textInput(['maxlength' => true]) ?>

                    <?= $userSocialMediaForm->field($userSocialMediaModel, 'telegram_link')->textInput(['maxlength' => true]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-primary pull-right']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Bio</h3>
                </div>
                <div class="card-body">
                    <?php $userBioForm = ActiveForm::begin(); ?>
                    <?= $userBioForm->field($modelBio, 'bio')->textarea(['rows' => 6]) ?>
                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-primary pull-right']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Profile</h3>
                </div>
                <div class="card-body">
                    <?php $userForm = ActiveForm::begin(); ?>

                    <?= $userForm->field($userModel, 'fullname')->textInput(['maxlength' => true]) ?>

                    <?= $userForm->field($userModel, 'contact_number')->textInput(['maxlength' => true]) ?>

                    <?= $userForm->field($userModel, 'channel_link_telegram')->textInput(['maxlength' => true]) ?>

                    <?= $userForm->field($userModel, 'monthly_charge_offer')->textInput(['maxlength' => true]) ?>

                    <?= $userForm->field($userModel, 'three_months_offer')->textInput(['maxlength' => true]) ?>

                    <?= $userForm->field($userModel, 'all_till_offer')->textInput(['maxlength' => true]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-primary pull-right']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Photos</h3>
                </div>
                <div class="card-body">

                    <div class="panel profile-cover" style="margin-bottom: 140px;">
                        <a href="<?= Url::to(['profile/edit-cover-photo']) ?>">
                            <?php
                            if (is_file(\Yii::getAlias('@webroot/coverPhotos/') . $user['back_photo']) && file_exists(\Yii::getAlias('@webroot/coverPhotos/') . $user['back_photo'])) {
                                ?>
                                <div class="profile-cover__action bg-img" style="background-image: url('<?= Yii::getAlias('@web') . "/coverPhotos/" . $user['back_photo'] ?>')"></div>
                                <?php
                            } else {
                                ?>
                                <div class="profile-cover__action bg-img" style="background: gray"></div>

                                <?php
                            }
                            ?>
                        </a>
                        <a href="<?= Url::to(['profile/edit-profile-picture']) ?>">
                            <div class="profile-cover__img">
                                <div class="profile-img-1">
                                    <?php
                                    if (is_file(\Yii::getAlias('@webroot/profilePhotos/') . $user['photo']) && file_exists(\Yii::getAlias('@webroot/profilePhotos/') . $user['photo'])) {
                                        ?>
                                        <img src="<?= Yii::getAlias('@web') . "/profilePhotos/" . $user['photo'] ?>" style="height: 120px;width: 120px;object-fit: cover;" alt="img">
                                        <?php
                                    } else {
                                        ?>
                                        <img src="<?= Yii::getAlias('@web') . "/sash/assets/images/users/21.jpg" ?>" style="height: 120px;width: 120px;object-fit: cover;" alt="img">

                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="profile-img-content text-dark text-start">
                                    <div class="text-dark">
                                        <!--<h3 class="h3 mb-2">Edit Picture</h3>-->
                                        <!--<h5 class="text-muted">Profile Picture</h5>-->
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!--                    <div class="text-center chat-image mb-5">
                                            <div class="">
                                                <a class="" href="">
                                                    <img alt="avatar" src="<?= Yii::getAlias('@web') . "/profilePhotos/" . $user['photo'] ?>"
                                                         style="height: 120px;width: 120px;object-fit: cover;" alt="img" class="brround"></a>
                                            </div>
                                            <div class="main-chat-msg-name" style="margin-left: 0px;">
                                                <a href="profile.html">
                                                    <h5 class="text-dark fw-semibold">Profile Picture</h5>
                                                </a>
                                            </div>
                                        </div>
                    
                    
                                        <div class="text-center chat-image mb-5">
                                            <div class="profile-cover__action bg-img" style="background-image: url('<?= Yii::getAlias('@web') . "/profilePhotos/" . $user['back_photo'] ?>')"></div>
                                            <div class="main-chat-msg-name" style="margin-left: 0px;margin-top: 10px;">
                                                <a href="profile.html">
                                                    <h5 class="text-dark fw-semibold">Cover Picture</h5>
                                                </a>
                                            </div>
                                        </div>-->

                </div>
            </div>
        </div>





    </div>
    <!-- ROW-1 CLOSED -->

</div>
<!--CONTAINER CLOSED -->

