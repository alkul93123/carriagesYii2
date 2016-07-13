<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CarriageModel */

$this->title = 'Update Carriage Model: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Carriage Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="carriage-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
