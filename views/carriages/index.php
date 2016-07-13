<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carriage Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carriage-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Carriage Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'carriage_number',
            'carriage_kind',
            'carriage_owner',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
