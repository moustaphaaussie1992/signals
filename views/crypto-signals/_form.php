<?php

use app\models\CryptoCoin;
use app\models\CryptoPair;
use app\models\CryptoResult;
use app\models\CryptoSignals;
use app\models\CryptoTarget;
use app\models\CryptoType;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/** @var View $this */
/** @var CryptoSignals $model */
/** @var ActiveForm $form */
?>

<div class="crypto-signals-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
            $form->field($model, 'coin')
            ->dropDownList(
                    ArrayHelper::map(CryptoCoin::find()->asArray()->all(), 'id', 'name'
    ));
    ?>

    <?=
            $form->field($model, 'pair')
            ->dropDownList(
                    ArrayHelper::map(CryptoPair::find()->asArray()->all(), 'id', 'name'
    ));
    ?>

    <?=
            $form->field($model, 'type')
            ->dropDownList(
                    ArrayHelper::map(CryptoType::find()->asArray()->all(), 'id', 'name'
    ));
    ?>

    <?=
            $form->field($model, 'target')
            ->dropDownList(
                    ArrayHelper::map(CryptoTarget::find()->asArray()->all(), 'id', 'name'
    ));
    ?>

    <?=
            $form->field($model, 'result')
            ->dropDownList(
                    ArrayHelper::map(CryptoResult::find()->asArray()->all(), 'id', 'name'
    ));
    ?>

    <?= $form->field($model, 'percentage')->textInput() ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
