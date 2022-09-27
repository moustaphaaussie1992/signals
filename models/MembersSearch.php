<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Members;

/**
 * MembersSearch represents the model behind the search form of `app\models\Members`.
 */
class MembersSearch extends Members {

    public $subscription_date;
    public $from;
    public $to;
    public $days_left;
    public $r_type;

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id'], 'integer'],
            [['fullname', 'registration_date', 'phone', 'telegram', 'r_user', 'subscription_date', 'from', 'to', 'days_left', 'r_type'], 'safe'],
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

//        $query = (new \yii\db\Query)
//                ->select('members.*,members.id as memberId,subscriptions.subscription_date,subscriptions.r_type,subscriptions.from,subscriptions.to,datediff(subscriptions.to, curdate()) as days_left,subscriptions.member_id')
//                ->from('members')
//                ->join('join', 'user', 'user.id = members.r_user')
//                ->leftJoin('subscriptions', 'subscriptions.member_id = members.id');


        $query = Members::find()
                ->select('members.*,subscriptions.subscription_date,subscriptions.from,subscriptions.to,datediff(subscriptions.to, curdate()) as days_left,subscriptions.r_type,subscriptions.member_id')
                ->joinWith('rUser')
                ->join('join', 'subscriptions', 'subscriptions.member_id = members.id');
//        $query = Members::find()->joinWith('rUser');


        $userLoggedInId = \Yii::$app->user->id;
        $query = $query->andWhere(["r_user" => $userLoggedInId]);
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
            'registration_date' => $this->registration_date,
        ]);

        $query->andFilterWhere(['like', 'fullname', $this->fullname])
                ->andFilterWhere(['like', 'phone', $this->phone])
                ->andFilterWhere(['like', 'telegram', $this->telegram])
                ->andFilterWhere(['like', 'subscriptions.r_type', $this->r_type])
                ->andFilterWhere(['like', 'user.username', $this->r_user]);

        return $dataProvider;
    }

    public function searchByType($params, $type) {
        $query = Members::find()
                ->select('members.*,subscriptions.subscription_date,subscriptions.from,subscriptions.to,datediff(subscriptions.to, curdate()) as days_left')
                ->joinWith('rUser')
                ->join('join', 'subscriptions', 'subscriptions.member_id = members.id')
                ->where(['subscriptions.r_type' => $type]);


        $userLoggedInId = \Yii::$app->user->id;
        $query = $query->andWhere(["r_user" => $userLoggedInId]);
//        \yii\helpers\VarDumper::dump($query->all(), 3, true);
//        die();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['subscription_date'] = [
            'asc' => ['subscription_date' => SORT_ASC],
            'desc' => ['subscription_date' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['from'] = [
            'asc' => ['from' => SORT_ASC],
            'desc' => ['from' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['to'] = [
            'asc' => ['to' => SORT_ASC],
            'desc' => ['to' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['days_left'] = [
            'asc' => ['to' => SORT_ASC],
            'desc' => ['to' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'registration_date' => $this->registration_date,
        ]);

        $query->andFilterWhere(['like', 'fullname', $this->fullname])
                ->andFilterWhere(['like', 'phone', $this->phone])
                ->andFilterWhere(['like', 'telegram', $this->telegram])
                ->andFilterWhere(['like', 'user.username', $this->r_user])
                ->andFilterWhere(['like', 'subscriptions.subscription_date', $this->subscription_date])
                ->andFilterWhere(['like', 'subscriptions.from', $this->from])
                ->andFilterWhere(['like', 'subscriptions.to', $this->to])

        ;

        return $dataProvider;
    }

}
