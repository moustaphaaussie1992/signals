<?php

namespace app\models;

use yii\base\Model;

class NewPassword extends Model {

    public $password;

    public function rules() {
        return [
            [['password'], 'required'],
            [['password'], 'string', 'max' => 255],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function attributeLabels() {
        return [
            'password' => 'password',
        ];
    }

}
