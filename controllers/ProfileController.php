<?php

namespace app\controllers;

use app\models\ChangePassword;
use app\models\CoverPictureModel;
use app\models\Members;
use app\models\ProfilePictureModel;
use app\models\User as User;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;

class ProfileController extends Controller {

    public function actionIndex($userId = null) {
        if ($userId) {

        } else {
            $userId = Yii::$app->user->id;
        }

        $user = User::find()
                ->select(['id', 'username', 'email', 'photo', 'back_photo', 'bio', 'twitter'
                    , 'facebook', 'tiktok', 'insta', 'contact_number', 'telegram_link', 'discord', 'year_offer', 'all_till_offer', 'three_months_offer', 'monthly_charge_offer','year_offer_forex', 'all_till_offer_forex', 'three_months_offer_forex', 'monthly_charge_offer_forex'])
                ->asArray()
                ->where(['id' => $userId])
                ->one();


        $totalMembersCrypto = Members::find()
                ->where(["r_user" => $userId])
                ->join('join', 'subscriptions', 'subscriptions.member_id = members.id')
                ->andWhere(['subscriptions.r_type' => 1])
                ->andWhere(["active" => 1])
                ->count();
        $totalMembersForex = Members::find()
                ->where(["r_user" => $userId])
                ->join('join', 'subscriptions', 'subscriptions.member_id = members.id')
                ->andWhere(['subscriptions.r_type' => 2])
                ->andWhere(["active" => 1])
                ->count();

        $totalMembersCryptoForex = Members::find()
                ->where(["r_user" => $userId])
                ->join('join', 'subscriptions', 'subscriptions.member_id = members.id')
                ->andWhere(['subscriptions.r_type' => 3])
                ->andWhere(["active" => 1])
                ->count();


        $totalMembers = Members::find()
                ->where(["r_user" => $userId])
                ->andWhere(["active" => 1])
                ->count();


        return $this->render('index', [
                    'user' => $user,
                    'totalMembers' => $totalMembers,
                    'totalMembersCryptoForex' => $totalMembersCryptoForex,
                    'totalMembersForex' => $totalMembersForex,
                    'totalMembersCrypto' => $totalMembersCrypto,
        ]);
    }

    public function actionEdit() {
        $userId = \Yii::$app->user->id;
        $user = User::find()
                ->select(['id', 'username', 'email', 'photo', 'back_photo', 'bio', 'twitter'
                    , 'facebook', 'tiktok', 'insta', 'contact_number', 'telegram_link'])
                ->asArray()
                ->where(['id' => $userId])
                ->one();


        $request = Yii::$app->getRequest();
        $modelChangePassword = new ChangePassword();
        if ($modelChangePassword->load($request->post()) && $modelChangePassword->change()) {
//            $session->setFlash('success', 'The password has beeen changed successfully');
            return $this->redirect(['profile/edit',
                        'userId' => Yii::$app->user->id,
            ]);
        }

        $userModel = User::findOne(['id' => $userId]);

        if ($userModel->load($request->post()) && $userModel->save()) {
            return $this->redirect(['edit', 'id' => $userId]);
        }

        $modelBio = User::findOne(['id' => $userId]);

        if ($modelBio->load($request->post()) && $modelBio->save()) {
            return $this->redirect(['edit', 'id' => $userId]);
        }

        $userSocialMediaModel = User::findOne(['id' => $userId]);

        if ($userSocialMediaModel->load($request->post()) && $userSocialMediaModel->save()) {
            return $this->redirect(['edit', 'id' => $userId]);
        }


        return $this->render('edit', [
                    'user' => $user,
                    'modelChangePassword' => $modelChangePassword,
                    'userModel' => $userModel,
                    'userSocialMediaModel' => $userSocialMediaModel,
                    'modelBio' => $modelBio,
        ]);
    }

    public function actionEditProfilePicture() {
        $userId = \Yii::$app->user->id;
        $model = new ProfilePictureModel();

        if ($model->load($this->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $file = $model->file;
            if ($model->uploadFile($file, $userId)) {
                return $this->redirect(['edit']);
            } else {

            }
        }
        return $this->render('edit_profile_picture', [
                    'model' => $model,
        ]);
    }

    public function actionEditCoverPhoto() {
        $userId = \Yii::$app->user->id;
        $model = new CoverPictureModel();

        if ($model->load($this->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $file = $model->file;
            if ($model->uploadFile($file, $userId)) {
                return $this->redirect(['edit']);
            } else {

            }
        }
        return $this->render('edit_cover_photo', [
                    'model' => $model,
        ]);
    }

}
