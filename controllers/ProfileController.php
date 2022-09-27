<?php

namespace app\controllers;

use yii\web\Controller;

class ProfileController extends Controller {

    public function actionIndex($userId = 1) {

        $user = \app\models\base\User::find()
                ->select(['id','username', 'email', 'photo', 'back_photo', 'bio', 'twitter'
                    , 'facebook', 'tiktok', 'insta', 'contact_number', 'telegram_link'])
                ->asArray()
                ->one();
        return $this->render('index', [
                    'user' => $user
        ]);
    }

}
