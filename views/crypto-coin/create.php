<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CryptoCoin $model */

$this->title = 'Create Crypto Coin';
$this->params['breadcrumbs'][] = ['label' => 'Crypto Coins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="crypto-coin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
