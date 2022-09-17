<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ForexTicker $model */

$this->title = 'Create Forex Ticker';
$this->params['breadcrumbs'][] = ['label' => 'Forex Tickers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forex-ticker-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
