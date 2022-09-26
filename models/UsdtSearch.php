<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usdt;

/**
 * UsdtSearch represents the model behind the search form of `app\models\Usdt`.
 */
class UsdtSearch extends Usdt {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'price', 'profit', 'type', 'user_id'], 'integer'],
            [['date'], 'safe'],
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
        $query = Usdt::find();

        $userId = \Yii::$app->user->id;
        $query->andWhere(['user_id' => $userId]);

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
            'price' => $this->price,
            'profit' => $this->profit,
            'date' => $this->date,
            'type' => $this->type,
            'user_id' => $this->user_id,
        ]);

        return $dataProvider;
    }

}
