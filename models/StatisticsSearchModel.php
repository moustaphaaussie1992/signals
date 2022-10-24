<?php
namespace app\models;

use yii\base\Model;


class StatisticsSearchModel extends Model {

    public $from_date;
    public $to_date;

    public function rules() {
        return [
            [['from_date', 'to_date'], 'safe'],
        ];
    }

    public function attributeLabels() {
        return [
            'from_date' => 'From',
            'to_date' => 'To',
        ];
    }

}
