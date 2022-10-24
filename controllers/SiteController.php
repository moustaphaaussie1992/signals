<?php

namespace app\controllers;

use app\models\ContactForm;
use app\models\LoginForm;
use app\models\Members;
use app\models\StatisticsSearchModel;
use app\models\Subscriptions;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\Response;
use const YII_ENV_TEST;

class SiteController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }

    public function actionLanding() {
        return $this->renderPartial('landing');
    }

    public function actionDashboard() {

        $model = new StatisticsSearchModel();

        if ($model->load($this->request->post())) {

//            VarDumper::dump($model, 3, true);
//            die();
        }

        $userId = \Yii::$app->user->id;
        $totalMembers = 0;
        if ($userId) {
            $totalMembers = Members::find()
                    ->where(["r_user" => $userId])
                    ->andWhere(["active" => 1])
                    ->andFilterWhere(['>=', 'date', $model->from_date])
                    ->andFilterWhere(['<=', 'date', $model->to_date])
                    ->count();
            $totalMembersCrypto = Members::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'subscriptions', 'subscriptions.member_id = members.id')
                    ->andWhere(["active" => 1])
                    ->andWhere(['subscriptions.r_type' => 1])
                    ->andFilterWhere(['>=', 'subscription_date', $model->from_date])
                    ->andFilterWhere(['<=', 'subscription_date', $model->to_date])
                    ->count();

            $totalMembersForex = Members::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'subscriptions', 'subscriptions.member_id = members.id')
                    ->andWhere(["active" => 1])
                    ->andWhere(['subscriptions.r_type' => 2])
                    ->andFilterWhere(['>=', 'subscription_date', $model->from_date])
                    ->andFilterWhere(['<=', 'subscription_date', $model->to_date])
                    ->count();

            $totalMembersCryptoAndForex = Members::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'subscriptions', 'subscriptions.member_id = members.id')
                    ->andWhere(["active" => 1])
                    ->andWhere(['subscriptions.r_type' => 3])
                    ->andFilterWhere(['>=', 'subscription_date', $model->from_date])
                    ->andFilterWhere(['<=', 'subscription_date', $model->to_date])
                    ->count();

            $totalProfits = 0;

            $totalProfits = Subscriptions::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'members', 'members.id = subscriptions.member_id')
                    ->andWhere(["members.r_user" => $userId])
//                      ->andWhere('subscription_date between  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW() ')
                    ->andFilterWhere(['>=', 'subscription_date', $model->from_date])
                    ->andFilterWhere(['<=', 'subscription_date', $model->to_date])
                    ->sum('fee');

            $totalProfitsCrypto = Subscriptions::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'members', 'members.id = subscriptions.member_id')
                    ->andWhere(["members.r_user" => $userId])
                    ->andWhere(['subscriptions.r_type' => 1])
//                            ->andWhere('subscription_date between  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW() ')
                    ->andFilterWhere(['>=', 'subscription_date', $model->from_date])
                    ->andFilterWhere(['<=', 'subscription_date', $model->to_date])
                    ->sum('fee');
            $totalProfitsForex = Subscriptions::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'members', 'members.id = subscriptions.member_id')
                    ->andWhere(["members.r_user" => $userId])
                    ->andWhere(['subscriptions.r_type' => 2])
//                            ->andWhere('subscription_date between  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW() ')
                    ->andFilterWhere(['>=', 'subscription_date', $model->from_date])
                    ->andFilterWhere(['<=', 'subscription_date', $model->to_date])
                    ->sum('fee');
            $totalProfitsCryptoAndForex = Subscriptions::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'members', 'members.id = subscriptions.member_id')
                    ->andWhere(["members.r_user" => $userId])
                    ->andWhere(['subscriptions.r_type' => 3])
//                            ->andWhere('subscription_date between  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW() ')
                    ->andFilterWhere(['>=', 'subscription_date', $model->from_date])
                    ->andFilterWhere(['<=', 'subscription_date', $model->to_date])
                    ->sum('fee');
        }



        return $this->render('dashboard', [
                    'totalMembers' => $totalMembers,
                    'totalProfits' => ($totalProfits?$totalProfits:0),
                    'totalMembersCrypto' => $totalMembersCrypto,
                    'totalMembersForex' => $totalMembersForex,
                    'totalMembersCryptoAndForex' => $totalMembersCryptoAndForex,
                    'totalProfitsCrypto' => ($totalProfitsCrypto?$totalProfitsCrypto:0),
                    'totalProfitsForex' => ($totalProfitsForex?$totalProfitsForex:0),
                    'totalProfitsCryptoAndForex' => ($totalProfitsCryptoAndForex?$totalProfitsCryptoAndForex:0),
                    'userId' => $userId,
                    'model' => $model
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->renderPartial('login', [
                    'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout() {
        return $this->render('about');
    }

}
