<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subscriptions".
 *
 * @property int $id
 * @property int $member_id
 * @property int $r_type
 * @property string $from
 * @property string $to
 * @property string $subscription_date
 * @property int $fee
 *
 * @property Members $member
 * @property Type $rType
 */
class Subscriptions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subscriptions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id', 'r_type', 'from', 'to', 'subscription_date', 'fee'], 'required'],
            [['member_id', 'r_type', 'fee'], 'integer'],
            [['from', 'to', 'subscription_date'], 'safe'],
            [['member_id', 'r_type'], 'unique', 'targetAttribute' => ['member_id', 'r_type']],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => Members::class, 'targetAttribute' => ['member_id' => 'id']],
            [['r_type'], 'exist', 'skipOnError' => true, 'targetClass' => Type::class, 'targetAttribute' => ['r_type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_id' => 'Member',
            'r_type' => 'Type',
            'from' => 'From',
            'to' => 'To',
            'subscription_date' => 'Subscription Date',
            'fee' => 'Fee',
        ];
    }

    /**
     * Gets query for [[Member]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(Members::class, ['id' => 'member_id']);
    }

    /**
     * Gets query for [[RType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRType()
    {
        return $this->hasOne(Type::class, ['id' => 'r_type']);
    }
}
