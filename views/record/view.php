<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RecordForm */

$this->title = 'Patient Information';
$this->params['breadcrumbs'][] = ['label' => 'Record Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<div class="record-form-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Medical', ['medical'], ['class' => 'btn btn-success']) ?>
       

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'name',
                'age',
                'Gender',
                'dob',
                'contact',
                'address',
                'nextOfKin',
                'bloodGroup',
                'payment',
                'date',
            ],
        ]) ?>


</div>