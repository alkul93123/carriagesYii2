<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OwnerModel */

$this->title = 'Create Owner Model';
$this->params['breadcrumbs'][] = ['label' => 'Owner Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="owner-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
