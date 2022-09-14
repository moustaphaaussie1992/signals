<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "crypto_result".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property CryptoSignals[] $cryptoSignals
 */
class CryptoResult extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'crypto_result';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
        return $this->hasMany(CryptoSignals::class, ['result' => 'id']);
    }
}
