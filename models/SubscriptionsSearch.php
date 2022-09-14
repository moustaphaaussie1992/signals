<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Subscriptions;

/**
 * SubscriptionsSearch represents the model behind the search form of `app\models\Subscriptions`.
 */
class SubscriptionsSearch extends Subscriptions {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'fee'], 'integer'],
            [['from', 'to', 'subscription_date', 'r_type', 'member_id'], 'safe'],
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
        $query = Subscriptions::find()
                ->joinWith('member')
                ->joinWith('rType');

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
            'from' => $this->from,
            'to' => $this->to,
            'subscription_date' => $this->subscription_date,
            'fee' => $this->fee,
        ]);

        $query
                ->andFilterWhere(['like', 'type.name', $this->r_type])
                ->andFilterWhere(['like', 'members.fullname', $this->member_id]);

        return $dataProvider;
    }

}
