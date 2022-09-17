<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ForexTarget $model */

$this->title = 'Create Forex Target';
$this->params['breadcrumbs'][] = ['label' => 'Forex Targets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forex-target-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
