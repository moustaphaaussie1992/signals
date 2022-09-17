<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ForexType $model */

$this->title = 'Create Forex Type';
$this->params['breadcrumbs'][] = ['label' => 'Forex Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forex-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
