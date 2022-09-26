<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usdt".
 *
 * @property int $id
 * @property int $price
 * @property int $profit
 * @property string $date
 * @property int $type
 * @property int $user_id
 *
 * @property User $user
 */
class Usdt extends \yii\db\ActiveRecord {

    const BUY_USDT = 1;
    const SELL_USDT = 2;
    const USDT_TYPES = [
        1 => 'Buy',
        2 => 'Sell'
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'usdt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['price', 'profit', 'type', 'user_id'], 'required'],
            [['price', 'profit', 'type', 'user_id'], 'integer'],
            [['date'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'price' => 'Price',
            'profit' => 'Profit',
            'date' => 'Date',
            'type' => 'Type',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

}
