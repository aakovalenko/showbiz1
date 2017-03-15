<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Perfomance;

/**
 * PerfomanceSearch represents the model behind the search form about `backend\models\Perfomance`.
 */
class PerfomanceSearch extends Perfomance
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perfomance_di', 'artist_id', 'place_id'], 'integer'],
            [['name', 'date', 'perfomance_status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Perfomance::find();

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
            'perfomance_di' => $this->perfomance_di,
            'date' => $this->date,
            'artist_id' => $this->artist_id,
            'place_id' => $this->place_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'perfomance_status', $this->perfomance_status]);

        return $dataProvider;
    }
}
