<?php

namespace app\models;

use Yii;
use yii\data\ArrayDataProvider;

/**
 * This is the model class for table "doctors".
 *
 * @property int $id
 * @property string $diagnosis
 * @property string $test
 * @property string $test_result
 */
class Doctors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */


    //public $patientId;

    public static function tableName()
    {
        return 'doctors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['diagnosis', 'test', 'test_result'], 'required'],
            [['diagnosis', 'test', 'test_result'], 'string', 'max' => 255],
            [['patientId'],'safe'],
            

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'IDS',
            'diagnosis' => 'Diagnosis',
            'test' => 'Test',
            'test_result' => 'Test Result',
            'patientId'=>'Patient Name'
        ];
    }
    public function result()
    {

        $model = Yii::$app->db->createCommand('SELECT * FROM doctors')
            ->queryAll();

        $data =  new ArrayDataProvider(
            [
                'allModels' => $model,
            ]
        );
        return $data;
    }

    public function getresult($id)
    {
        $model = Yii::$app->db->createCommand('SELECT * FROM doctors WHERE id=:id')->bindValue('id', $id)->queryOne();

        return $model;


        $data =  new ArrayDataProvider(
            [
                'allModels' => $model,
            ]
        );

        return $data;
    }
    public function getname($id)
    {
        $model = Yii::$app->db->createCommand('SELECT name FROM doctors WHERE id=:id')->bindValue('id', $id)->queryOne();

        return $model;


        $data =  new ArrayDataProvider(
            [
                'allModels' => $model,
            ]
        );

        return $data;
    }
    public function medicalReport($id)
    {
        $model = new Doctors();
        $model->diagnosis = $this->diagnosis;
        $model->test = $this->test;
        $model->test_result = $this->test_result;
        $model->patientId = $this->id;
        // $id=$model->patientId=$this->id;

      // return  array($id,$model->save()) ;

    return $model->save();
    }
}
