<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RecordForm */

$this->title = 'Create Record Form';
$this->params['breadcrumbs'][] = ['label' => 'Record Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="record-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('record', [
        'model' => $model,
    ]) ?>

</div>
