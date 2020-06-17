<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RecordSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="record-form-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'age') ?>

    <?= $form->field($model, 'Gender') ?>

    <?= $form->field($model, 'dob') ?>

    <?php // echo $form->field($model, 'contact') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'nextOfKin') ?>

    <?php // echo $form->field($model, 'bloodGroup') ?>

    <?php // echo $form->field($model, 'payment') ?>

    <?php // echo $form->field($model, 'date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
