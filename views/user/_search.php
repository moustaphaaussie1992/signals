<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UserSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    
        <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">

            <h3 style="
                margin-top: 36px;">Pro-Labz Users</h3>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xl-2">
            <?= $form->field($model, 'id') ?>

        </div>
      
        <div class="col-lg-2 col-md-2 col-sm-2 col-xl-2" style="    margin-top: 28px;">


              <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

        </div>
    </div>
  

    <?php // echo $form->field($model, 'auth_key') ?>

    <?php // echo $form->field($model, 'password_hash') ?>

    <?php // echo $form->field($model, 'password_reset_token') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'back_photo') ?>

    <?php // echo $form->field($model, 'bio') ?>

    <?php // echo $form->field($model, 'twitter') ?>

    <?php // echo $form->field($model, 'facebook') ?>

    <?php // echo $form->field($model, 'tiktok') ?>

    <?php // echo $form->field($model, 'insta') ?>

    <?php // echo $form->field($model, 'contact_number') ?>

    <?php // echo $form->field($model, 'telegram_link') ?>

  

    <?php ActiveForm::end(); ?>

</div>
