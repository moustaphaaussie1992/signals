<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "forex_signals".
 *
 * @property int $id
 * @property int $ticker
 * @property int $type
 * @property int $target
 * @property int $result
 * @property int $pips
 * @property string|null $comment
 * @property string $date
 *
 * @property ForexPips $pips0
 * @property ForexResult $result0
 * @property ForexTarget $target0
 * @property ForexTicker $ticker0
 * @property ForexType $type0
 */
class ForexSignals extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forex_signals';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticker', 'type', 'target', 'result', 'pips'], 'required'],
            [['ticker', 'type', 'target', 'result', 'pips'], 'integer'],
            [['comment'], 'string'],
            [['date'], 'safe'],
            [['pips'], 'exist', 'skipOnError' => true, 'targetClass' => ForexPips::class, 'targetAttribute' => ['pips' => 'id']],
            [['result'], 'exist', 'skipOnError' => true, 'targetClass' => ForexResult::class, 'targetAttribute' => ['result' => 'id']],
            [['target'], 'exist', 'skipOnError' => true, 'targetClass' => ForexTarget::class, 'targetAttribute' => ['target' => 'id']],
            [['ticker'], 'exist', 'skipOnError' => true, 'targetClass' => ForexTicker::class, 'targetAttribute' => ['ticker' => 'id']],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => ForexType::class, 'targetAttribute' => ['type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ticker' => 'Ticker',
            'type' => 'Type',
            'target' => 'Target',
            'result' => 'Result',
            'pips' => 'Pips',
            'comment' => 'Comment',
            'date' => 'Date',
        ];
    }

    /**
     * Gets query for [[Pips0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPips0()
    {
        return $this->hasOne(ForexPips::class, ['id' => 'pips']);
    }

    /**
     * Gets query for [[Result0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getResult0()
    {
        return $this->hasOne(ForexResult::class, ['id' => 'result']);
    }

    /**
     * Gets query for [[Target0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTarget0()
    {
        return $this->hasOne(ForexTarget::class, ['id' => 'target']);
    }

    /**
     * Gets query for [[Ticker0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTicker0()
    {
        return $this->hasOne(ForexTicker::class, ['id' => 'ticker']);
    }

    /**
     * Gets query for [[Type0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(ForexType::class, ['id' => 'type']);
    }
}
