<?php

namespace app\models;

use mdm\admin\models\form\ChangePassword as BaseChangePassword;
use Yii;
use yii\helpers\ArrayHelper;

class ChangePassword extends BaseChangePassword {

    public function attributeLabels() {
        return ArrayHelper::merge(parent::attributeLabels(), [
                    'role' => 'Role',
                    'password' => 'Password',
                    'actions' => 'Actions',
                    'oldPassword' => 'Old Password',
                    'newPassword' => 'New Password',
                    'retypePassword' => 'Retype Password',
        ]);
    }

}
