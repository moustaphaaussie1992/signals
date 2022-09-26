<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Usdt $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="usdt-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'profit')->textInput() ?>

    <?php
//    echo $form->field($model, 'date')->textInput();
    ?>

    <?= $form->field($model, 'type')->dropDownList(app\models\Usdt::USDT_TYPES) ?>

    <?php
//    $form->field($model, 'user_id')->textInput();
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
