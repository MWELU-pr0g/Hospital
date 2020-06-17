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
class Form extends ActiveRecord
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
            [['name', 'age','Gender'], 'required'],
            [['dob', 'address','nextOfKin'], 'required'],
            [['bloodGroup'], 'required'],
            // rememberMe must be a boolean value
            [['contact'], 'safe'],
            [['payment'], 'default','value'=>''],
        ];
    }
    public function patientUpdate($id)
    { 
        // print_r($id);exit;

        $model=new Form();

        // $model = Yii::$app->db->createCommand('UPDATE bio_data  WHERE  id=:id')->bindValue('id',$id)->execute();
        $model=Yii::$app->db->createCommand()->update('bio_data', ['id' => $id])->execute();
        return $model;

        $data =  new ArrayDataProvider(
            [
                'allModels' => $model,
            ]
            );
            return $data;
    }
    
}
