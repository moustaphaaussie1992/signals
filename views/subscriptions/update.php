<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Subscriptions $model */
$this->title = 'Update Subscriptions: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Subscriptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subscriptions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
        'memberId' => $memberId ?? null,
    ])
    ?>

</div>
