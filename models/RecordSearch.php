<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RecordForm;


/**
 * RecordSearch represents the model behind the search form of `app\models\RecordForm`.
 */
class RecordSearch extends RecordForm 
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bloodGroup', 'payment'], 'integer'],
            [['name', 'age', 'Gender', 'dob', 'contact', 'address', 'nextOfKin', 'date','id'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = RecordForm::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'bloodGroup' => $this->bloodGroup,
            'payment' => $this->payment,
            'date' => $this->date,
            'id'=>$this->id,


        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'age', $this->age])
            ->andFilterWhere(['like', 'Gender', $this->Gender])
            ->andFilterWhere(['like', 'dob', $this->dob])
            ->andFilterWhere(['like', 'contact', $this->contact])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'nextOfKin', $this->nextOfKin]);



        return $dataProvider;
    }
}
