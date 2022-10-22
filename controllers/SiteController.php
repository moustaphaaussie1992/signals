<?php

namespace app\controllers;

use app\models\ContactForm;
use app\models\LoginForm;
use app\models\Members;
use app\models\Subscriptions;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
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
        
        
        
        $userId = \Yii::$app->user->id;
        $totalMembers = 0;
        if ($userId) {
            $totalMembers = Members::find()
                    ->where(["r_user" => $userId])
                    ->andWhere(["active"=>1])
                    ->count();
              $totalMembersCrypto = Members::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'subscriptions', 'subscriptions.member_id = members.id')
                      ->andWhere(["active"=>1])
                    ->andWhere(['subscriptions.r_type' => 1])
                    ->count();
              
                 $totalMembersForex = Members::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'subscriptions', 'subscriptions.member_id = members.id')
                      ->andWhere(["active"=>1])
                    ->andWhere(['subscriptions.r_type' => 2])
                    ->count();
                 
                 
                 $totalMembersCryptoAndForex = Members::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'subscriptions', 'subscriptions.member_id = members.id')
                      ->andWhere(["active"=>1])
                    ->andWhere(['subscriptions.r_type' => 3])
                    ->count();
              
               $totalProfits = 0;
      
            $totalProfits = Subscriptions::find()
                    
                    ->where(["r_user" => $userId])
                    ->join('join', 'members', 'members.id = subscriptions.member_id')
                    ->andWhere(["members.r_user" => $userId])
//                      ->andWhere('subscription_date between  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW() ')
                    ->sum('fee');
            
                 $totalProfitsCrypto = Subscriptions::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'members', 'members.id = subscriptions.member_id')
                    ->andWhere(["members.r_user" => $userId])
                    ->andWhere(['subscriptions.r_type' => 1])
//                            ->andWhere('subscription_date between  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW() ')
                    ->sum('fee');
           $totalProfitsForex = Subscriptions::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'members', 'members.id = subscriptions.member_id')
                    ->andWhere(["members.r_user" => $userId])
                    ->andWhere(['subscriptions.r_type' => 2])
//                            ->andWhere('subscription_date between  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW() ')
                    ->sum('fee');
                $totalProfitsCryptoAndForex = Subscriptions::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'members', 'members.id = subscriptions.member_id')
                    ->andWhere(["members.r_user" => $userId])
                    ->andWhere(['subscriptions.r_type' => 3])
//                            ->andWhere('subscription_date between  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW() ')
                    ->sum('fee');
              
     
        }
       


        return $this->render('dashboard', [
                    
                    'totalMembers' => $totalMembers,
                    'totalProfits' => $totalProfits,
                    'totalMembersCrypto' => $totalMembersCrypto,
                    'totalMembersForex' => $totalMembersForex,
                    'totalMembersCryptoAndForex' => $totalMembersCryptoAndForex,
                    'totalProfitsCrypto' => $totalProfitsCrypto,
                    'totalProfitsForex' => $totalProfitsForex,
                    'totalProfitsCryptoAndForex' => $totalProfitsCryptoAndForex,
            'userId'=>$userId
                   
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
