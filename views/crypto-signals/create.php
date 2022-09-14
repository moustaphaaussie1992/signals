<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CryptoSignals $model */

$this->title = 'Create Crypto Signals';
$this->params['breadcrumbs'][] = ['label' => 'Crypto Signals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="crypto-signals-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
