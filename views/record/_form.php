<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RecordForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="record-form-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'age')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Gender')->radioList(array('M' => 'Male', 'F' => 'Female')); ?>

    <?= $form->field($model, 'dob')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nextOfKin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bloodGroup')->textInput() ?>

    <?= $form->field($model, 'payment')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
