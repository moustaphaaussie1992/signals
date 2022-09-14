<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CryptoType $model */

$this->title = 'Create Crypto Type';
$this->params['breadcrumbs'][] = ['label' => 'Crypto Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="crypto-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
