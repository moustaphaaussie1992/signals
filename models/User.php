<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string|null $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $photo
 * @property string|null $back_photo
 * @property string|null $bio
 * @property string|null $twitter
 * @property string|null $facebook
 * @property string|null $tiktok
 * @property string|null $insta
 * @property string|null $contact_number
 * @property string|null $telegram_link
 * @property string|null $fullname 
 * @property string|null $channel_link_telegram 
 * @property string|null $monthly_charge_offer 
 * @property string|null $three_months_offer 
 * @property string|null $all_till_offer 
 *
 * @property Members[] $members
 */
class User extends base\User {

    /**
     * Gets query for [[Members]].
     *
     * @return ActiveQuery
     */
    public $password;

    public function getMembers() {
        return $this->hasMany(Members::class, ['r_user' => 'id']);
    }

    public function rules() {

        return ArrayHelper::merge(parent::rules(), [
                    ['password', 'required', 'on' => 'signUp'],
                    ['password', 'string', 'min' => 6],
        ]);
    }

    public function signup() {
        if ($this->validate()) {
            $this->setPassword($this->password);
            $this->generateAuthKey();
            if ($this->save()) {
                return $this;
            }
        }
        return null;
    }

}
