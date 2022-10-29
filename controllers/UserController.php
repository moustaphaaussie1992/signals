<?php

namespace app\controllers;

use app\models\ChangePassword;
use app\models\ForgetPassword;
use app\models\NewPassword;
use app\models\User;
use app\models\UserSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller {

    /**
     * @inheritDoc
     */
    public function behaviors() {
        return array_merge(
                parent::behaviors(), [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
                ]
        );
    }

    /**
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex() {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|Response
     */
    public function actionCreate() {
        $model = new User();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSignUp() {


        $string = Yii::$app->security->generateRandomString();
        $verifyUrl = Yii::$app->params['ip'] . Url::to(['user/verify-account', 's' => $string]);



        $model = new User();
        $model->scenario = 'signUp';
        if ($this->request->isPost) {
            $model->verify_sgn_up = $string;
            if ($model->load($this->request->post()) && $model->signup()) {

                Yii::$app->mailer->compose()
                        ->setFrom('mortux313@outlook.com')
                        ->setTo($model->username)
                        ->setSubject('Verify Account')
                        ->setTextBody('Please click on the link to verify your account')
                        ->setHtmlBody('<a href="' . $verifyUrl . '">' . $verifyUrl . '</a>')
                        ->send();

                return $this->redirect(['user/check-email', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->renderPartial('sign_up', [
                    'model' => $model,
        ]);
    }

    public function actionVerifyAccount($s) {
        $user = User::findOne([
                    "verify_sgn_up" => $s
        ]);
        if ($user) {
            $user->status = 10;
            $user->save();
            return $this->renderPartial('verified');
        }
        return "failed";
    }

    public function actionCheckEmail() {
        return $this->renderPartial('check_email');
    }

    public function actionCheckEmailToResetPassword() {
        return $this->renderPartial('check_email_to_reset_password');
    }

    public function actionChangePassword() {
        $request = Yii::$app->getRequest();
        $session = Yii::$app->session;

        $model = new ChangePassword();

        if ($model->load($request->post()) && $model->change()) {
            $session->setFlash('success', 'The password has beeen changed successfully');
            return $this->goHome();
        }

        return $this->render('change-password', [
                    'model' => $model,
        ]);
    }

    public function actionForgetPassword() {

        $request = Yii::$app->getRequest();

        $model = new ForgetPassword();
        if ($model->load($request->post())) {


            $string = Yii::$app->security->generateRandomString();
            $verifyUrl = Yii::$app->params['ip'] . Url::to(['user/create-new-password', 's' => $string]);


            $user = User::findOne(["username" => $model->email]);
            if ($user) {
                Yii::$app->mailer->compose()
                        ->setFrom('mortux313@outlook.com')
                        ->setTo($model->email)
                        ->setSubject('Forget Password')
                        ->setTextBody('Please click on the link to create new password')
                        ->setHtmlBody('<a href="' . $verifyUrl . '">' . $verifyUrl . '</a>')
                        ->send();

                $user->forget_password_token = $string;
                $user->save();

                return $this->redirect(['check-email-to-reset-password']);
            } else {
                $model->addError('email', 'email not available');
            }
        }



        return $this->renderPartial('forget_password', [
                    'model' => $model
        ]);
    }

    public function actionCreateNewPassword($s) {
        $request = Yii::$app->getRequest();
        $user = User::findOne([
                    "forget_password_token" => $s
        ]);
        if ($user) {
            $model = new NewPassword();

            if ($model->load($request->post())) {
                $newPassword = $model->password;
                $user->setPassword($model->password);
                $user->generateAuthKey();
                if ($user->save()) {
                    return $this->renderPartial('password_succefully_changed');
                }
            }


            return $this->renderPartial('create_new_password', [
                        'model' => $model
            ]);
        }
        return "failed";
    }

}
