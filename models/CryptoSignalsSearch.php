<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CryptoSignals;

/**
 * CryptoSignalsSearch represents the model behind the search form of `app\models\CryptoSignals`.
 */
class CryptoSignalsSearch extends CryptoSignals
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'coin', 'pair', 'type', 'target', 'result', 'percentage'], 'integer'],
            [['comment'], 'safe'],
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
        $query = CryptoSignals::find();

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
            'coin' => $this->coin,
            'pair' => $this->pair,
            'type' => $this->type,
            'target' => $this->target,
            'result' => $this->result,
            'percentage' => $this->percentage,
        ]);

        $query->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
