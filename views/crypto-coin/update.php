<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CryptoCoin $model */

$this->title = 'Update Crypto Coin: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Crypto Coins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="crypto-coin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
