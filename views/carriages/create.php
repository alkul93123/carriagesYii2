<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CarriageModel */

$this->title = 'Create Carriage Model';
$this->params['breadcrumbs'][] = ['label' => 'Carriage Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carriage-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
