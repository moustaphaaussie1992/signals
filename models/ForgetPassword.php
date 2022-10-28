<?php

namespace app\models;

use yii\base\Model;

class ForgetPassword extends Model {

    public $email;

    public function rules() {
        return [
            [['email'], 'required'],
            [['email'], 'email'],
            [['password_hash'], 'string', 'max' => 255]
        ];
    }

    public function attributeLabels() {
        return [
            'email' => 'Email',
        ];
    }

}
