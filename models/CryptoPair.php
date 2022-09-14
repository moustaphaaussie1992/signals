<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "crypto_pair".
 *
 * @property int $id
 * @property string $name
 *
 * @property CryptoSignals[] $cryptoSignals
 */
class CryptoPair extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'crypto_pair';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * Gets query for [[CryptoSignals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCryptoSignals()
    {
        return $this->hasMany(CryptoSignals::class, ['pair' => 'id']);
    }
}
