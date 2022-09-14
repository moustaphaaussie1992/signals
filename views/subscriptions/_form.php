<?php

use app\models\Subscriptions;
use app\models\Type;
use app\models\UtilsMembers;
use kartik\datecontrol\DateControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/** @var View $this */
/** @var Subscriptions $model */
/** @var ActiveForm $form */
?>

<div class="subscriptions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    if ($memberId ?? null) {
        echo $form->field($model, 'member_id')
                ->dropDownList(
                        ArrayHelper::map(UtilsMembers::getMemberById($memberId), 'id', 'fullname'
        ));
    } else {
        echo $form->field($model, 'member_id')
                ->dropDownList(
                        ArrayHelper::map(UtilsMembers::getMembersByUser(), 'id', 'fullname'
        ));
    }
    ?>

    <?=
            $form->field($model, 'r_type')
            ->dropDownList(
                    ArrayHelper::map(Type::find()->asArray()->all(), 'id', 'name'
    ));
    ?>

    <?=
    $form->field($model, 'from')->widget(DateControl::classname(), [
        'type' => DateControl::FORMAT_DATE,
        'ajaxConversion' => false,
        'widgetOptions' => [
            'pluginOptions' => [
                'autoclose' => true,
                'todayHighlight' => true,
                'pickerPosition' => 'top'
            ],
        ],
    ])->hint(false);
    ?>

    <?=
    $form->field($model, 'to')->widget(DateControl::classname(), [
        'type' => DateControl::FORMAT_DATE,
        'ajaxConversion' => false,
        'widgetOptions' => [
            'pluginOptions' => [
                'autoclose' => true,
                'todayHighlight' => true,
                'pickerPosition' => 'top'
            ],
        ],
    ])->hint(false);
    ?>

    <?=
    $form->field($model, 'subscription_date')->widget(DateControl::classname(), [
        'type' => DateControl::FORMAT_DATE,
        'ajaxConversion' => false,
        'widgetOptions' => [
            'pluginOptions' => [
                'autoclose' => true,
                'todayHighlight' => true,
                'pickerPosition' => 'top'
            ],
        ],
    ])->hint(false);
    ?>


    <?= $form->field($model, 'fee')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
