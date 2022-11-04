<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_payments".
 *
 * @property int $id
 * @property string $payment_id
 * @property string $pay_address
 * @property string|null $pay_amount
 * @property string|null $price_currency
 * @property string|null $payment_status
 * @property string|null $invoice_id
 * @property string|null $purchase_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $order_description
 * @property string|null $order_id
 * @property string|null $pay_currency
 * @property string|null $actually_paid
 * @property string|null $outcome_currency
 * @property string|null $outcome_amount
 * @property string|null $payout_hash
 * @property string|null $payin_hash
 * @property int $r_user
 * @property string|null $price_amount
 * @property string|null $amount_received
 * @property string|null $ipn_callback_url
 * @property string|null $smart_contract
 * @property string|null $network
 * @property string|null $network_precision
 * @property string|null $time_limit
 * @property string|null $burning_percent
 * @property string|null $expiration_estimate_date
 * @property string|null $success
 *
 * @property User $rUser
 */
class UserPayments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_payments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_id', 'pay_address', 'r_user'], 'required'],
            [['r_user'], 'integer'],
            [['payment_id', 'pay_address', 'pay_amount', 'price_currency', 'payment_status', 'invoice_id', 'purchase_id', 'created_at', 'updated_at', 'order_description', 'order_id', 'pay_currency', 'actually_paid', 'outcome_currency', 'outcome_amount', 'payout_hash', 'payin_hash', 'price_amount', 'amount_received', 'ipn_callback_url', 'smart_contract', 'network', 'network_precision', 'time_limit', 'burning_percent', 'expiration_estimate_date', 'success'], 'string', 'max' => 256],
            [['r_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['r_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payment_id' => 'Payment ID',
            'pay_address' => 'Pay Address',
            'pay_amount' => 'Pay Amount',
            'price_currency' => 'Price Currency',
            'payment_status' => 'Payment Status',
            'invoice_id' => 'Invoice ID',
            'purchase_id' => 'Purchase ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'order_description' => 'Order Description',
            'order_id' => 'Order ID',
            'pay_currency' => 'Pay Currency',
            'actually_paid' => 'Actually Paid',
            'outcome_currency' => 'Outcome Currency',
            'outcome_amount' => 'Outcome Amount',
            'payout_hash' => 'Payout Hash',
            'payin_hash' => 'Payin Hash',
            'r_user' => 'R User',
            'price_amount' => 'Price Amount',
            'amount_received' => 'Amount Received',
            'ipn_callback_url' => 'Ipn Callback Url',
            'smart_contract' => 'Smart Contract',
            'network' => 'Network',
            'network_precision' => 'Network Precision',
            'time_limit' => 'Time Limit',
            'burning_percent' => 'Burning Percent',
            'expiration_estimate_date' => 'Expiration Estimate Date',
            'success' => 'Success',
        ];
    }

    /**
     * Gets query for [[RUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRUser()
    {
        return $this->hasOne(User::class, ['id' => 'r_user']);
    }
}
