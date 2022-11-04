<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $price
 * @property int $usdt_mangment
 * @property int $members_limit
 * @property int $signals_limit
 * @property int $share_signal
 * @property int $prolabz_users
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'price', 'usdt_mangment', 'members_limit', 'signals_limit', 'share_signal', 'prolabz_users'], 'required'],
            [['description'], 'string'],
            [['price', 'usdt_mangment', 'members_limit', 'signals_limit', 'share_signal', 'prolabz_users'], 'integer'],
            [['name'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'price' => 'Price',
            'usdt_mangment' => 'Usdt Mangment',
            'members_limit' => 'Members Limit',
            'signals_limit' => 'Signals Limit',
            'share_signal' => 'Share Signal',
            'prolabz_users' => 'Prolabz Users',
        ];
    }
}
