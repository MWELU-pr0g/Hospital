<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ArrayDataProvider;
use yii\db\ActiveRecord;
use yii\debug\models\timeline\DataProvider;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class RecordForm extends ActiveRecord
{



    public static function tableName()
    {
        return 'bio_data';
    }


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['name', 'age', 'Gender'], 'required'],
            [['dob', 'address', 'nextOfKin'], 'required'],
            [['bloodGroup'], 'required'],
            // rememberMe must be a boolean value
            [['contact'], 'safe'],
            [['payment'], 'default', 'value' => ''],
        ];
    }



    public function patient()
    {
        $model = Yii::$app->db->createCommand('SELECT * FROM bio_data')
            ->queryAll();

        $data =  new ArrayDataProvider(
            [
                'allModels' => $model,
            ]
        );
        return $data;
    }

    public function getpatient($id)
    {
        $model = Yii::$app->db->createCommand('SELECT * FROM bio_data WHERE id=:id')->bindValue('id',$id)->queryOne();
        
        return $model;

        // print_r($model);exit;

        $data =  new ArrayDataProvider(
            [
                'models' => $model,
            ]
        );
        return $data;
    }
    public function getname($id)
    {
        $model = Yii::$app->db->createCommand('SELECT name FROM bio_data WHERE id=:id')->bindValue('name',$id)->queryOne();
        
        return $model;

        // print_r($model);exit;

        $data =  new ArrayDataProvider(
            [
                'models' => $model,
            ]
        );
        return $data;
    }
}
