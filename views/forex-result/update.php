<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ForexResult $model */

$this->title = 'Update Forex Result: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Forex Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="forex-result-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
