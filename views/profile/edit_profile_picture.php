<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="offset-4 col-xl-4">
    <?php $form = ActiveForm::begin(); ?>
    <?php
    echo $form->field($model, 'file')->widget(FileInput::classname(), [
        'options' => [
            'accept' => 'image/*',
            'multiple' => false
        ],
        'pluginOptions' => [
//            'previewFileType' => 'image',
            'overwriteInitial' => false,
            'maxFileSize' => 1000000,
            'removeClass' => 'btn btn-danger',
            'removeIcon' => '<i class="glyphicon glyphicon-trash"></i> '
        ]
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
