<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ForexPips $model */

$this->title = 'Update Forex Pips: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Forex Pips', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="forex-pips-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
