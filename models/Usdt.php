<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usdt".
 *
 * @property int $id
 * @property int $price
 * @property string $date
 * @property int $type
 * @property int $user_id
 * @property string $name
 * @property string $phone
 *
 * @property User $user
 */
class Usdt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usdt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'type', 'user_id', 'name', 'phone'], 'required'],
            [['price', 'type', 'user_id'], 'integer'],
            [['date'], 'safe'],
            [['name', 'phone'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'price' => 'Price',
            'date' => 'Date',
            'type' => 'Type',
            'user_id' => 'User ID',
            'name' => 'Name',
            'phone' => 'Phone',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
