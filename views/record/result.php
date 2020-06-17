<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RecordForm */

$this->title = 'PATIENT MEDICAL RECORDS ';
$this->params['breadcrumbs'][] = ['label' => 'Results Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<div class="record-form-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Medical Results', ['medical'], ['class' => 'btn btn-success']) ?>
    
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'diagnosis',
                'test',
                'test_result',
                'patientId',

            ],
        ]) ?>
        <?= Html::a('Go Back', ['recordview'], ['class' => 'btn btn-primary']) ?>


</div>