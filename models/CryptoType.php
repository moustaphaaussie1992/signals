<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "crypto_type".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property CryptoSignals[] $cryptoSignals
 */
class CryptoType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'crypto_type';
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
        return $this->hasMany(CryptoSignals::class, ['type' => 'id']);
    }
}
