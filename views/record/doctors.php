<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\LinkPager;

$this->title = 'DOCTORS PATIENT RECORDS';
$this->params['breadcrumbs'][] = $this->title;
// print_r($user->id);


?>

<div class="record-doctors">
    <h1><?= Html::encode($this->title) ?></h1>

    <h2>Please fill out the following form for Patient Information:</h2>

    <?php $form = ActiveForm::begin([
        'id' => 'record-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'patientId')->hiddenInput(['value' => $user->name])->label(false);

    ?>
    <?= $form->field($model, 'diagnosis')->textarea()
        ->label('Diagnosis'); ?>
    <?= $form->field($model, 'test')->textarea()
        ->label('TEST'); ?>
    <?= $form->field($model, 'test_result')->textarea()
        ->label('TEST RESULT'); ?>





    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'doctors-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

    <div class="col-lg-offset-1" style="color:#999;">
        <strong>Click the SAVE button to Enter Information</strong> .<br></code>.
    </div>
</div>

<h1>Patients</h1>