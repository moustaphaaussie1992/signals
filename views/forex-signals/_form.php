<?php

use app\models\ForexPips;
use app\models\ForexResult;
use app\models\ForexSignals;
use app\models\ForexTarget;
use app\models\ForexType;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/** @var View $this */
/** @var ForexSignals $model */
/** @var ActiveForm $form */
?>

<div class="forex-signals-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
            $form->field($model, 'ticker')
            ->dropDownList(
                    ArrayHelper::map(app\models\ForexTicker::find()->asArray()->all(), 'id', 'name'
    ));
    ?>
    <?=
            $form->field($model, 'type')
            ->dropDownList(
                    ArrayHelper::map(ForexType::find()->asArray()->all(), 'id', 'name'
    ));
    ?>
    <?=
            $form->field($model, 'target')
            ->dropDownList(
                    ArrayHelper::map(ForexTarget::find()->asArray()->all(), 'id', 'name'
    ));
    ?>
    <?=
            $form->field($model, 'result')
            ->dropDownList(
                    ArrayHelper::map(ForexResult::find()->asArray()->all(), 'id', 'name'
    ));
    ?>
    <?=
            $form->field($model, 'pips')
            ->dropDownList(
                    ArrayHelper::map(ForexPips::find()->asArray()->all(), 'id', 'name'
    ));
    ?>



    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
