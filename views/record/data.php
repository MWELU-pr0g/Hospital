<?php

use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'PATIENT INFORMATIONS';
$this->params['breadcrumbs'][] = $this->title;
;
?>
<div class="record-data">

    <h1><?= Html::encode($this->title) ?></h1>

  
    <?= $this->render('doctors', [
        'model' => $model,
    ]) ?>
   
 


</div>