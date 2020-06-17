<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RecordForm */

$this->title = 'All Patient Medical Records ';
$this->params['breadcrumbs'][] = ['label' => 'medical', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="record-form-view">

    <h1><?= Html::encode($this->title) ?></h1>


 
<?=
        GridView::widget([


            'dataProvider' => $dataProvider,
            //  'record' => $data,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

              'diagnosis',
              'test',
              'test_result',
              'patientId'


            ],
        ]);
    ?>

</div>
