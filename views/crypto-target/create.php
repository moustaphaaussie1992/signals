<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CryptoTarget $model */

$this->title = 'Create Crypto Target';
$this->params['breadcrumbs'][] = ['label' => 'Crypto Targets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="crypto-target-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
