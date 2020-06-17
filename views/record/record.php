<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\LinkPager;

$this->title = 'Patient Registration';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="record-record">
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

    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'age')->textInput() ?>
    <?= $form->field($model, 'Gender')->radioList(array('M' => 'Male', 'F' => 'Female')); ?>
    <?= $form->field($model, 'dob')->textInput() ?>
    <?= $form->field($model, 'contact')->textInput([]) ?>
    <?= $form->field($model, 'address')->textInput() ?>
    <?= $form->field($model, 'nextOfKin')->textInput() ?>
    <?= $form->field($model, 'bloodGroup')->textInput() ?>
    <?= $form->field($model, 'payment')->textInput() ?>




    <div class="col-lg-offset-1" style="color:#999;">
        <strong>Click the SAVE button to Enter Information</strong> .<br></code>.
    </div>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'record-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

   
</div>

<h1>Patients</h1>
