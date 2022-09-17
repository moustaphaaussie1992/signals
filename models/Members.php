<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "members".
 *
 * @property int $id
 * @property string $fullname
 * @property string $registration_date
 * @property string $phone
 * @property string $telegram
 * @property int $r_user
 *
 * @property User $rUser
 * @property Subscriptions[] $subscriptions
 */
class Members extends \yii\db\ActiveRecord {

    public $subscription_date;
    public $from;
    public $to;
    public $days_left;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'members';
    }

    /** 
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['fullname', 'registration_date', 'phone', 'telegram', 'r_user'], 'required'],
            [['registration_date', 'subscription_date', 'from', 'to', 'days_left', 'date'], 'safe'],
            [['r_user'], 'integer'],
            [['fullname', 'phone', 'telegram'], 'string', 'max' => 255],
            [['r_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['r_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'fullname' => 'Fullname',
            'registration_date' => 'Registration Date',
            'phone' => 'Phone',
            'telegram' => 'Telegram',
            'r_user' => 'User',
            'date' => 'Date',
        ];
    }

    /**
     * Gets query for [[RUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRUser() {
        return $this->hasOne(User::class, ['id' => 'r_user']);
    }

    /**
     * Gets query for [[Subscriptions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubscriptions() {
        return $this->hasMany(Subscriptions::class, ['user_id' => 'id']);
    }

}
