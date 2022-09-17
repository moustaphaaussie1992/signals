<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ForexPips $model */

$this->title = 'Create Forex Pips';
$this->params['breadcrumbs'][] = ['label' => 'Forex Pips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forex-pips-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
