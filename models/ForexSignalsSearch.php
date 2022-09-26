<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ForexSignals;

/**
 * ForexSignalsSearch represents the model behind the search form of `app\models\ForexSignals`.
 */
class ForexSignalsSearch extends ForexSignals {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id'], 'integer'],
            [['comment', 'date', 'ticker', 'type', 'result', 'pips'], 'safe'],
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
        $query = ForexSignals::find()
                ->joinWith("pips0")
                ->joinWith("result0")
//                ->joinWith("target0")
                ->joinWith("type0")
                ->joinWith("ticker0")
        ;

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
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'comment', $this->comment]);
        $query->andFilterWhere(['like', 'forex_ticker.name', $this->ticker]);
//        $query->andFilterWhere(['like', 'forex_target.name', $this->target]);
        $query->andFilterWhere(['like', 'forex_type.name', $this->type]);
        $query->andFilterWhere(['like', 'forex_result.name', $this->result]);
        $query->andFilterWhere(['like', 'forex_pips.name', $this->pips]);

        return $dataProvider;
    }

}
