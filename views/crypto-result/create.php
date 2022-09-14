<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CryptoResult $model */

$this->title = 'Create Crypto Result';
$this->params['breadcrumbs'][] = ['label' => 'Crypto Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="crypto-result-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
