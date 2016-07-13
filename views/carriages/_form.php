<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CarriageModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carriage-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'carriage_number')->textInput() ?>

    <?= $form->field($model, 'carriage_kind')->textInput() ?>

    <?= $form->field($model, 'carriage_owner')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
