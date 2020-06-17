<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RecordForm */

$this->title = 'Update Record Form: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Record Forms', 'url' => ['_form']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="record-form-update">

    <h1><?= Html::encode($this->title)?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
