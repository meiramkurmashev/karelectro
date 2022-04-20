<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cars;

/**
 * CarsSearch represents the model behind the search form of `app\models\Cars`.
 */
class CarsSearch extends Cars
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'carYear'], 'integer'],
            [['carObject', 'carName', 'carType', 'carDriver1', 'carDriver2'], 'safe'],
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
        $query = Cars::find();

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
            'id' => $this->id,
            'carYear' => $this->carYear,
        ]);

        $query->andFilterWhere(['like', 'carObject', $this->carObject])
            ->andFilterWhere(['like', 'carName', $this->carName])
            ->andFilterWhere(['like', 'carType', $this->carType])
            ->andFilterWhere(['like', 'carDriver1', $this->carDriver1])
            ->andFilterWhere(['like', 'carDriver2', $this->carDriver2]);

        return $dataProvider;
    }
}
