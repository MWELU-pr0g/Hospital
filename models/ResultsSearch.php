<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RecordForm;


/**
 * RecordSearch represents the model behind the search form of `app\models\RecordForm`.
 */
class ResultsSearch extends Doctors 
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patientId'], 'safe'  ],
            [['diagnosis', 'test', 'test_result'], 'safe'],
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
        $query = Doctors::find();

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
            'diagnosis' => $this->diagnosis,
            'test' => $this->test,
            'test_result' => $this->test_result,
            'patientId' => $this->patientId,

        ]);

        $query->andFilterWhere(['like', 'diagnosis', $this->diagnosis])
            ->andFilterWhere(['like', 'test', $this->test])
            ->andFilterWhere(['like', 'test_result', $this->test_result])
            ->andFilterWhere(['like', 'patientId', $this->patientId]);
            

        return $dataProvider;
    }
}
