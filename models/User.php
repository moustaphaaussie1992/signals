<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
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
 *
 * @property Members[] $members
 */
class User extends base\User {

    /**
     * Gets query for [[Members]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMembers() {
        return $this->hasMany(Members::class, ['r_user' => 'id']);
    }

}
