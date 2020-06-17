<?php

use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Record Forms';
$this->params['breadcrumbs'][] = $this->title;
;
?>
<div class="record-recordview">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ADD', ['//record/_form'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('MEDICAL RESULTS', ['//record/medical'], ['class' => 'btn btn-success']) ?>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?=
        GridView::widget([


            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
               
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
                [
                    'label'=>'medical',
                    'attribute'=>'id',
                    'format'=>'raw',
                    'value'=>function($dataProvider){
                        return Html::a('Add Record',Url::to(['record/data']),['data-params'=>['id'=>$dataProvider['id']],'data-method'=>'POST', 'target'=> '_blank']);
                    },

                ],

                [ 'class' => ActionColumn::className(),
                
            ],]
        ]);
    ?>


</div>