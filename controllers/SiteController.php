<?php

namespace app\controllers;

use app\models\ContactForm;
use app\models\LoginForm;
use app\models\Members;
use app\models\Orders;
use app\models\StatisticsSearchModel;
use app\models\Subscriptions;
use app\models\UserPayments;
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
                    ->andFilterWhere([' >= ', 'date', $model->from_date])
                    ->andFilterWhere([' <= ', 'date', $model->to_date])
                    ->count();
            $totalMembersCrypto = Members::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'subscriptions', 'subscriptions.member_id = members.id')
                    ->andWhere(["active" => 1])
                    ->andWhere(['subscriptions.r_type' => 1])
                    ->andFilterWhere([' >= ', 'subscription_date', $model->from_date])
                    ->andFilterWhere([' <= ', 'subscription_date', $model->to_date])
                    ->count();

            $totalMembersForex = Members::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'subscriptions', 'subscriptions.member_id = members.id')
                    ->andWhere(["active" => 1])
                    ->andWhere(['subscriptions.r_type' => 2])
                    ->andFilterWhere([' >= ', 'subscription_date', $model->from_date])
                    ->andFilterWhere([' <= ', 'subscription_date', $model->to_date])
                    ->count();

            $totalMembersCryptoAndForex = Members::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'subscriptions', 'subscriptions.member_id = members.id')
                    ->andWhere(["active" => 1])
                    ->andWhere(['subscriptions.r_type' => 3])
                    ->andFilterWhere([' >= ', 'subscription_date', $model->from_date])
                    ->andFilterWhere([' <= ', 'subscription_date', $model->to_date])
                    ->count();

            $totalProfits = 0;

            $totalProfits = Subscriptions::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'members', 'members.id = subscriptions.member_id')
                    ->andWhere(["members.r_user" => $userId])
//                      ->andWhere('subscription_date between DATE_FORMAT(NOW(), "%Y-%m-01") AND NOW() ')
                    ->andFilterWhere([' >= ', 'subscription_date', $model->from_date])
                    ->andFilterWhere([' <= ', 'subscription_date', $model->to_date])
                    ->sum('fee');

            $totalProfitsCrypto = Subscriptions::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'members', 'members.id = subscriptions.member_id')
                    ->andWhere(["members.r_user" => $userId])
                    ->andWhere(['subscriptions.r_type' => 1])
//                            ->andWhere('subscription_date between DATE_FORMAT(NOW(), "%Y-%m-01") AND NOW() ')
                    ->andFilterWhere([' >= ', 'subscription_date', $model->from_date])
                    ->andFilterWhere([' <= ', 'subscription_date', $model->to_date])
                    ->sum('fee');
            $totalProfitsForex = Subscriptions::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'members', 'members.id = subscriptions.member_id')
                    ->andWhere(["members.r_user" => $userId])
                    ->andWhere(['subscriptions.r_type' => 2])
//                            ->andWhere('subscription_date between DATE_FORMAT(NOW(), "%Y-%m-01") AND NOW() ')
                    ->andFilterWhere([' >= ', 'subscription_date', $model->from_date])
                    ->andFilterWhere([' <= ', 'subscription_date', $model->to_date])
                    ->sum('fee');
            $totalProfitsCryptoAndForex = Subscriptions::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'members', 'members.id = subscriptions.member_id')
                    ->andWhere(["members.r_user" => $userId])
                    ->andWhere(['subscriptions.r_type' => 3])
//                            ->andWhere('subscription_date between DATE_FORMAT(NOW(), "%Y-%m-01") AND NOW() ')
                    ->andFilterWhere([' >= ', 'subscription_date', $model->from_date])
                    ->andFilterWhere([' <= ', 'subscription_date', $model->to_date])
                    ->sum('fee');
        }



        return $this->render('dashboard', [
                    'totalMembers' => $totalMembers,
                    'totalProfits' => ($totalProfits ? $totalProfits : 0),
                    'totalMembersCrypto' => $totalMembersCrypto,
                    'totalMembersForex' => $totalMembersForex,
                    'totalMembersCryptoAndForex' => $totalMembersCryptoAndForex,
                    'totalProfitsCrypto' => ($totalProfitsCrypto ? $totalProfitsCrypto : 0),
                    'totalProfitsForex' => ($totalProfitsForex ? $totalProfitsForex : 0),
                    'totalProfitsCryptoAndForex' => ($totalProfitsCryptoAndForex ? $totalProfitsCryptoAndForex : 0),
                    'userId' => $userId,
                    'model' => $model
        ]);
//        return $this->render('index');
//        //// hay meshye ->
//        $html2pdf = new Html2Pdf();
//        $html2pdf->writeHTML($this->renderPartial('index'));
//        $html2pdf->output();
    }

    public function actionLanding() {
        $basic = Orders::find()
                ->where(['id' => 1])
                ->one();
        $advanced = Orders::find()
                ->where(['id' => 2])
                ->one();
        $regular = Orders::find()
                ->where(['id' => 3])
                ->one();

        return $this->renderPartial('landing', [
                    'basic' => $basic,
                    'advanced' => $advanced,
                    'regular' => $regular,
        ]);
    }

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionUpdatePayment() {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        if (Yii::$app->request->post()) {
            $data = Yii::$app->request->post();


            $payment = UserPayments::Find()
                    ->where(['r_user' => Yii::$app->user->id])
                    ->orderBy('id desc')
                    ->all();
            if (sizeof($payment) > 0) {
                $payment = UserPayments::findOne(["id" => $payment[0]["id"]]);
                $payment->payment_status = $data["payment_status"];

                if ($payment->save()) {

                    if ($data["payment_status"] == "finished") {


                        if ($payment->order_id == 1) {  // basic
                            $authManager = Yii::$app->authManager;
                            $authManager->revokeAll(Yii::$app->user->id);
                            $role = $authManager->getRole(\app\models\User::$ROLE_UserBasic);
                            $authManager->assign($role, Yii::$app->user->id);
                            return [
                                "status" => $data["payment_status"],
                                "orderName" => 'basic'
                            ];
//                        return "basic";
//                    $authManager = Yii::$app->authManager;
//                    $roleUser = $authManager->getRole(User::$ROLE_USER);
//                    $authManager->assign($roleUser, $model->id);
                        } else if ($payment->order_id == 2) {  // advanced
                            $authManager = Yii::$app->authManager;
                            $authManager->revokeAll(Yii::$app->user->id);
                            $role = $authManager->getRole(\app\models\User::$ROLE_UserAdvanced);
                            $authManager->assign($role, Yii::$app->user->id);
                            return [
                                "status" => $data["payment_status"],
                                "orderName" => 'advanced'
                            ];
//                        return "advanced";
//                    $authManager = Yii::$app->authManager;
//                    $roleUser = $authManager->getRole(User::$ROLE_USER);
//                    $authManager->assign($roleUser, $model->id);
                        } else if ($payment->order_id == 3) {  // regular
                            $authManager = Yii::$app->authManager;
                            $authManager->revokeAll(Yii::$app->user->id);
                            $role = $authManager->getRole(\app\models\User::$ROLE_UserRegular);
                            $authManager->assign($role, Yii::$app->user->id);
                            return [
                                "status" => $data["payment_status"],
                                "orderName" => 'regular'
                            ];
//                        return "regular";
//                    $authManager = Yii::$app->authManager;
//                    $roleUser = $authManager->getRole(User::$ROLE_USER);
//                    $authManager->assign($roleUser, $model->id);
                        }
                    } else {

                        return [
                            "status" => "not finished",
                        ];
                    }


                    return true;
                }
            } else {
                return "payment not found";
            }
        }
    }

    public function actionCreatePayment() {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        if (Yii::$app->request->post()) {
            $data = Yii::$app->request->post();

            $data = $data["response"];
            $userPayment = new UserPayments();
            $userPayment->payment_id = $data["payment_id"];
            $userPayment->payment_status = $data["payment_status"];
            $userPayment->pay_address = $data["pay_address"];
            $userPayment->price_amount = $data["price_amount"];
            $userPayment->price_currency = $data["price_currency"];
            $userPayment->pay_amount = $data["pay_amount"];
            $userPayment->amount_received = $data["amount_received"];
            $userPayment->pay_currency = $data["pay_currency"];
            $userPayment->order_id = $data["order_id"];
            $userPayment->order_description = $data["order_description"];
            $userPayment->ipn_callback_url = $data["ipn_callback_url"];
            $userPayment->created_at = $data["created_at"];
            $userPayment->updated_at = $data["updated_at"];
            $userPayment->purchase_id = $data["purchase_id"];
            $userPayment->smart_contract = $data["smart_contract"];
            $userPayment->network = $data["network"];
            $userPayment->network_precision = $data["network_precision"];
            $userPayment->time_limit = $data["time_limit"];
            $userPayment->burning_percent = $data["burning_percent"];
            $userPayment->expiration_estimate_date = $data["expiration_estimate_date"];
//            $userPayment->success = $data["success"];
            $userPayment->r_user = Yii::$app->user->id;
            $userPayment->setAttributes($data);
            if ($userPayment->save()) {
                return $userPayment;
            } else {
                VarDumper::dump($userPayment->getErrors(), 3, true);
            }

            return $data;
        }

        return false;

//        $model->load($this->request->post())
    }

    public function actionPaymentQr() {
//        VarDumper::dump($this->request->get(), 3, 3);
//        die();
        $response = $this->request->get();
        $r_user = $response["r_user"];
        $order_id = $response["order_id"];
        $pay_address = $response["pay_address"];
        $order = Orders::find()->where(['id' => $order_id])->one();

        $this->layout = "main-wothout-additions";
        return $this->render('payment-qr', [
                    'order' => $order,
                    'pay_address' => $pay_address,
        ]);
    }

//    public function actionDashboard() {
//
//        $model = new StatisticsSearchModel();
//
//        if ($model->load($this->request->post())) {
//
////            VarDumper::dump($model, 3, true);
////            die();
//        }
//
//        $userId = \Yii::$app->user->id;
//        $totalMembers = 0;
//        if ($userId) {
//            $totalMembers = Members::find()
//                    ->where(["r_user" => $userId])
//                    ->andWhere(["active" => 1])
//                    ->andFilterWhere([' >= ', 'date', $model->from_date])
//                    ->andFilterWhere([' <= ', 'date', $model->to_date])
//                    ->count();
//            $totalMembersCrypto = Members::find()
//                    ->where(["r_user" => $userId])
//                    ->join('join', 'subscriptions', 'subscriptions.member_id = members.id')
//                    ->andWhere(["active" => 1])
//                    ->andWhere(['subscriptions.r_type' => 1])
//                    ->andFilterWhere([' >= ', 'subscription_date', $model->from_date])
//                    ->andFilterWhere([' <= ', 'subscription_date', $model->to_date])
//                    ->count();
//
//            $totalMembersForex = Members::find()
//                    ->where(["r_user" => $userId])
//                    ->join('join', 'subscriptions', 'subscriptions.member_id = members.id')
//                    ->andWhere(["active" => 1])
//                    ->andWhere(['subscriptions.r_type' => 2])
//                    ->andFilterWhere([' >= ', 'subscription_date', $model->from_date])
//                    ->andFilterWhere([' <= ', 'subscription_date', $model->to_date])
//                    ->count();
//
//            $totalMembersCryptoAndForex = Members::find()
//                    ->where(["r_user" => $userId])
//                    ->join('join', 'subscriptions', 'subscriptions.member_id = members.id')
//                    ->andWhere(["active" => 1])
//                    ->andWhere(['subscriptions.r_type' => 3])
//                    ->andFilterWhere([' >= ', 'subscription_date', $model->from_date])
//                    ->andFilterWhere([' <= ', 'subscription_date', $model->to_date])
//                    ->count();
//
//            $totalProfits = 0;
//
//            $totalProfits = Subscriptions::find()
//                    ->where(["r_user" => $userId])
//                    ->join('join', 'members', 'members.id = subscriptions.member_id')
//                    ->andWhere(["members.r_user" => $userId])
////                      ->andWhere('subscription_date between DATE_FORMAT(NOW(), "%Y-%m-01") AND NOW() ')
//                    ->andFilterWhere([' >= ', 'subscription_date', $model->from_date])
//                    ->andFilterWhere([' <= ', 'subscription_date', $model->to_date])
//                    ->sum('fee');
//
//            $totalProfitsCrypto = Subscriptions::find()
//                    ->where(["r_user" => $userId])
//                    ->join('join', 'members', 'members.id = subscriptions.member_id')
//                    ->andWhere(["members.r_user" => $userId])
//                    ->andWhere(['subscriptions.r_type' => 1])
////                            ->andWhere('subscription_date between DATE_FORMAT(NOW(), "%Y-%m-01") AND NOW() ')
//                    ->andFilterWhere([' >= ', 'subscription_date', $model->from_date])
//                    ->andFilterWhere([' <= ', 'subscription_date', $model->to_date])
//                    ->sum('fee');
//            $totalProfitsForex = Subscriptions::find()
//                    ->where(["r_user" => $userId])
//                    ->join('join', 'members', 'members.id = subscriptions.member_id')
//                    ->andWhere(["members.r_user" => $userId])
//                    ->andWhere(['subscriptions.r_type' => 2])
////                            ->andWhere('subscription_date between DATE_FORMAT(NOW(), "%Y-%m-01") AND NOW() ')
//                    ->andFilterWhere([' >= ', 'subscription_date', $model->from_date])
//                    ->andFilterWhere([' <= ', 'subscription_date', $model->to_date])
//                    ->sum('fee');
//            $totalProfitsCryptoAndForex = Subscriptions::find()
//                    ->where(["r_user" => $userId])
//                    ->join('join', 'members', 'members.id = subscriptions.member_id')
//                    ->andWhere(["members.r_user" => $userId])
//                    ->andWhere(['subscriptions.r_type' => 3])
////                            ->andWhere('subscription_date between DATE_FORMAT(NOW(), "%Y-%m-01") AND NOW() ')
//                    ->andFilterWhere([' >= ', 'subscription_date', $model->from_date])
//                    ->andFilterWhere([' <= ', 'subscription_date', $model->to_date])
//                    ->sum('fee');
//        }
//
//
//
//        return $this->render('dashboard', [
//                    'totalMembers' => $totalMembers,
//                    'totalProfits' => ($totalProfits ? $totalProfits : 0),
//                    'totalMembersCrypto' => $totalMembersCrypto,
//                    'totalMembersForex' => $totalMembersForex,
//                    'totalMembersCryptoAndForex' => $totalMembersCryptoAndForex,
//                    'totalProfitsCrypto' => ($totalProfitsCrypto ? $totalProfitsCrypto : 0),
//                    'totalProfitsForex' => ($totalProfitsForex ? $totalProfitsForex : 0),
//                    'totalProfitsCryptoAndForex' => ($totalProfitsCryptoAndForex ? $totalProfitsCryptoAndForex : 0),
//                    'userId' => $userId,
//                    'model' => $model
//        ]);
//    }

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
        return $this->render
                        ('about');
    }

}
