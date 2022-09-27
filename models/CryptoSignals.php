<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "crypto_signals".
 *
 * @property int $id
 * @property int $coin
 * @property int $pair
 * @property int $type
 * @property string $target
 * @property int $result
 * @property int $percentage
 * @property string|null $comment
 * @property string $date 
 * @property int $user_id
 * 
 * @property CryptoCoin $coin0
 * @property CryptoPair $pair0
 * @property CryptoResult $result0
 * @property CryptoTarget $target0
 * @property CryptoType $type0
 * @property User $user 
 */
class CryptoSignals extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'crypto_signals';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['coin', 'pair', 'type', 'target', 'result', 'percentage', 'user_id'], 'required'],
            [['coin', 'pair', 'type', 'result', 'percentage', 'user_id'], 'integer'],
            [['comment'], 'string'],
//            [['target'], 'string', 'max' => 255],
            [['date'], 'safe'],
            [['pair'], 'exist', 'skipOnError' => true, 'targetClass' => CryptoPair::class, 'targetAttribute' => ['pair' => 'id']],
            [['coin'], 'exist', 'skipOnError' => true, 'targetClass' => CryptoCoin::class, 'targetAttribute' => ['coin' => 'id']],
            [['result'], 'exist', 'skipOnError' => true, 'targetClass' => CryptoResult::class, 'targetAttribute' => ['result' => 'id']],
//            [['target'], 'exist', 'skipOnError' => true, 'targetClass' => CryptoTarget::class, 'targetAttribute' => ['target' => 'id']],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => CryptoType::class, 'targetAttribute' => ['type' => 'id']],
            ['percentage', 'compare', 'compareValue' => 10000, 'operator' => '<='],
            ['percentage', 'compare', 'compareValue' => -100, 'operator' => '>='],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['target'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'coin' => 'Coin',
            'pair' => 'Pair',
            'type' => 'Type',
            'target' => 'Target',
            'result' => 'Result',
            'percentage' => 'Percentage',
            'comment' => 'Comment',
            'date' => 'Date',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Coin0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCoin0() {
        return $this->hasOne(CryptoCoin::class, ['id' => 'coin']);
    }

    /**
     * Gets query for [[Pair0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPair0() {
        return $this->hasOne(CryptoPair::class, ['id' => 'pair']);
    }

    /**
     * Gets query for [[Result0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getResult0() {
        return $this->hasOne(CryptoResult::class, ['id' => 'result']);
    }

    /**
     * Gets query for [[Target0]].
     *
     * @return \yii\db\ActiveQuery
     */
//    public function getTarget0() {
//        return $this->hasOne(CryptoTarget::class, ['id' => 'target']);
//    }

    /**
     * Gets query for [[Type0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType0() {
        return $this->hasOne(CryptoType::class, ['id' => 'type']);
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
