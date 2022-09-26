<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Usdt $model */

$this->title = 'Create Usdt';
$this->params['breadcrumbs'][] = ['label' => 'Usdts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usdt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
