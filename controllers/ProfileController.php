<?php

namespace app\controllers;

use app\models\base\User;
use app\models\ChangePassword;
use Yii;
use yii\web\Controller;

class ProfileController extends Controller {

    public function actionIndex($userId = 1) {

        $user = User::find()
                ->select(['id', 'username', 'email', 'photo', 'back_photo', 'bio', 'twitter'
                    , 'facebook', 'tiktok', 'insta', 'contact_number', 'telegram_link'])
                ->asArray()
                ->one();
        return $this->render('index', [
                    'user' => $user
        ]);
    }

    public function actionEdit($userId = 1) {

        $user = User::find()
                ->select(['id', 'username', 'email', 'photo', 'back_photo', 'bio', 'twitter'
                    , 'facebook', 'tiktok', 'insta', 'contact_number', 'telegram_link'])
                ->asArray()
                ->one();


        $request = Yii::$app->getRequest();
        $modelChangePassword = new ChangePassword();

        if ($modelChangePassword->load($request->post()) && $modelChangePassword->change()) {
//            $session->setFlash('success', 'The password has beeen changed successfully');
            return $this->redirect(['profile/edit',
                        'userId' => Yii::$app->user->id,
            ]);
        }

        return $this->render('edit', [
                    'user' => $user,
                    'modelChangePassword' => $modelChangePassword,
        ]);
    }

}
