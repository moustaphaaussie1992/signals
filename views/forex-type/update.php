<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ForexType $model */

$this->title = 'Update Forex Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Forex Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="forex-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
