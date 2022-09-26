<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CryptoSignals;

/**
 * CryptoSignalsSearch represents the model behind the search form of `app\models\CryptoSignals`.
 */
class CryptoSignalsSearch extends CryptoSignals {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'percentage'], 'integer'],
            [['comment', 'date', 'coin', 'pair', 'type', 'result'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
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
    public function search($params) {
        $query = CryptoSignals::find()
                ->joinWith("coin0")
                ->joinWith("pair0")
                ->joinWith("result0")
//                ->joinWith("target0")
                ->joinWith("type0");

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
            'percentage' => $this->percentage,
        ]);

        $query->andFilterWhere(['like', 'comment', $this->comment]);
        $query->andFilterWhere(['like', 'crypto_coin.name', $this->coin]);
        $query->andFilterWhere(['like', 'crypto_pair.name', $this->pair]);
        $query->andFilterWhere(['like', 'crypto_result.name', $this->result]);
//        $query->andFilterWhere(['like', 'crypto_target.name', $this->target]);
        $query->andFilterWhere(['like', 'crypto_type.name', $this->type]);
        $query->andFilterWhere(['like', 'date', $this->date]);

        return $dataProvider;
    }

}
