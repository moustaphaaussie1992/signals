<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "forex_signals".
 *
 * @property int $id
 * @property int $ticker
 * @property int $type
 * @property string $target
 * @property int $result
 * @property int $pips
 * @property string|null $comment
 * @property string $date
 * @property int $user_id 
 *
 * @property ForexPips $pips0
 * @property ForexResult $result0
 * @property ForexTarget $target0
 * @property ForexTicker $ticker0
 * @property ForexType $type0
 * @property User $user 
 */
class ForexSignals extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'forex_signals';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['ticker', 'type', 'target', 'result', 'pips', 'percentage', 'user_id'], 'required'],
            [['ticker', 'type', 'result', 'pips', 'percentage', 'user_id'], 'integer'],
            [['comment'], 'string'],
            [['date'], 'safe'],
//            [['target'], 'string', 'max' => 255],
            [['pips'], 'exist', 'skipOnError' => true, 'targetClass' => ForexPips::class, 'targetAttribute' => ['pips' => 'id']],
            [['result'], 'exist', 'skipOnError' => true, 'targetClass' => ForexResult::class, 'targetAttribute' => ['result' => 'id']],
//            [['target'], 'exist', 'skipOnError' => true, 'targetClass' => ForexTarget::class, 'targetAttribute' => ['target' => 'id']],
            [['ticker'], 'exist', 'skipOnError' => true, 'targetClass' => ForexTicker::class, 'targetAttribute' => ['ticker' => 'id']],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => ForexType::class, 'targetAttribute' => ['type' => 'id']],
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
            'ticker' => 'Ticker',
            'type' => 'Type',
            'target' => 'Target',
            'result' => 'Result',
            'pips' => 'Pips',
            'percentage' => 'Percentage',
            'comment' => 'Comment',
            'date' => 'Date',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Pips0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPips0() {
        return $this->hasOne(ForexPips::class, ['id' => 'pips']);
    }

    /**
     * Gets query for [[Result0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getResult0() {
        return $this->hasOne(ForexResult::class, ['id' => 'result']);
    }

    /**
     * Gets query for [[Target0]].
     *
     * @return \yii\db\ActiveQuery
     */
//    public function getTarget0() {
//        return $this->hasOne(ForexTarget::class, ['id' => 'target']);
//    }

    /**
     * Gets query for [[Ticker0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTicker0() {
        return $this->hasOne(ForexTicker::class, ['id' => 'ticker']);
    }

    /**
     * Gets query for [[Type0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType0() {
        return $this->hasOne(ForexType::class, ['id' => 'type']);
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
