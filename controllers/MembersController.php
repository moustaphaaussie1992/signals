<?php

namespace app\controllers;

use app\models\Members;
use app\models\MembersSearch;
use app\models\Subscriptions;
use Yii;
use yii\data\ArrayDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * MembersController implements the CRUD actions for Members model.
 */
class MembersController extends Controller {

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
     * Lists all Members models.
     *
     * @return string
     */
    public function actionIndex() {
        $searchModel = new MembersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $userId = \Yii::$app->user->id;
        $totalMembers = 0;
        if ($userId) {
            $totalMembers = Members::find()
                    ->where(["r_user" => $userId])
                    ->andWhere(["active"=>1])
                    ->count();
              $totalInactive = Members::find()
                    ->where(["r_user" => $userId])
                    ->andWhere(["active"=>0])
                    ->count();
              $newMembers= Members::find()
                    ->where(' date between  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW() ')
                    ->andWhere(["r_user" => $userId])
                    ->andWhere(["active"=>1])
                    ->count();
        }
        $totalProfits = 0;
        if ($userId) {
            $totalProfits = Subscriptions::find()
                    
                    ->where(["r_user" => $userId])
                    ->join('join', 'members', 'members.id = subscriptions.member_id')
                    ->andWhere(["members.r_user" => $userId])
                      ->andWhere('subscription_date between  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW() ')
                    ->sum('fee');
        }


        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'totalMembers' => $totalMembers,
                    'totalProfits' => $totalProfits,
                    'totalInactive' => $totalInactive,
                    'newMembers' => $newMembers,
        ]);
    }

    public function actionMembersCrypto() {
        $searchModel = new MembersSearch();
        $subscriptionType = 1;
        $dataProvider = $searchModel->searchByType($this->request->queryParams, $subscriptionType); // 1 means crypto

        $userId = \Yii::$app->user->id;
        $totalMembers = 0;
        if ($userId) {
            $totalMembers = Members::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'subscriptions', 'subscriptions.member_id = members.id')
                      ->andWhere(["active"=>1])
                    ->andWhere(['subscriptions.r_type' => $subscriptionType])
                    ->count();
                    $totalInactive = Members::find()
                               ->join('join', 'subscriptions', 'subscriptions.member_id = members.id')
                    ->andWhere(['subscriptions.r_type' => $subscriptionType])
                    ->andWhere(["r_user" => $userId])
                    ->andWhere(["active"=>0])
                    ->count();
              $newMembers= Members::find()
                         ->join('join', 'subscriptions', 'subscriptions.member_id = members.id')
                    ->andWhere(['subscriptions.r_type' => $subscriptionType])
                    ->andWhere(' date between  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW() ')
                    ->andWhere(["r_user" => $userId])
                    ->andWhere(["active"=>1])
                    ->count();
        }
        $totalProfits = 0;
        if ($userId) {
            $totalProfits = Subscriptions::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'members', 'members.id = subscriptions.member_id')
                    ->andWhere(["members.r_user" => $userId])
                    ->andWhere(['subscriptions.r_type' => $subscriptionType])
                            ->andWhere('subscription_date between  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW() ')
                    ->sum('fee');
        }


        return $this->render('index_by_type', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'title' => "Crypto Members",
                    'totalMembers' => $totalMembers,
                    'totalProfits' => $totalProfits,
                    'subscriptionType' => $subscriptionType,
                      'totalInactive' => $totalInactive,
                    'newMembers' => $newMembers,
        ]);
    }

    public function actionMembersForex() {
        $searchModel = new MembersSearch();
        $subscriptionType = 2;
        $dataProvider = $searchModel->searchByType($this->request->queryParams, $subscriptionType); // 2 means forex

        $userId = \Yii::$app->user->id;
        $totalMembers = 0;
        if ($userId) {
            $totalMembers = Members::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'subscriptions', 'subscriptions.member_id = members.id')
                    ->andWhere(['subscriptions.r_type' => $subscriptionType])
                         ->andWhere(["active"=>1])
                    ->count();
                       $totalInactive = Members::find()
                                  ->join('join', 'subscriptions', 'subscriptions.member_id = members.id')
                    ->andWhere(['subscriptions.r_type' => $subscriptionType])
                    ->andWhere(["r_user" => $userId])
                    ->andWhere(["active"=>0])
                    ->count();
              $newMembers= Members::find()
                         ->join('join', 'subscriptions', 'subscriptions.member_id = members.id')
                    ->andWhere(['subscriptions.r_type' => $subscriptionType])
                    ->andWhere(' date between  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW() ')
                    ->andWhere(["r_user" => $userId])
                    ->andWhere(["active"=>1])
                    ->count();
        }
        $totalProfits = 0;
        if ($userId) {
            $totalProfits = Subscriptions::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'members', 'members.id = subscriptions.member_id')
                    ->andWhere(["members.r_user" => $userId])
                    ->andWhere(['subscriptions.r_type' => $subscriptionType])
                             ->andWhere('subscription_date between  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW() ')
                    ->sum('fee');
        }


        return $this->render('index_by_type', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'title' => "Forex Members",
                    'totalMembers' => $totalMembers,
                    'totalProfits' => $totalProfits,
                    'subscriptionType' => $subscriptionType,
                      'totalInactive' => $totalInactive,
                    'newMembers' => $newMembers,
        ]);
    }

    public function actionMembersForexAndCrypto() {
        $searchModel = new MembersSearch();
        $subscriptionType = 3;
        $dataProvider = $searchModel->searchByType($this->request->queryParams, 3); // 2 means forex and crypto


        $userId = \Yii::$app->user->id;
        $totalMembers = 0;
        if ($userId) {
            $totalMembers = Members::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'subscriptions', 'subscriptions.member_id = members.id')
                    ->andWhere(['subscriptions.r_type' => $subscriptionType])
                             ->andWhere(["active"=>1])
                    ->count();
                      $totalInactive = Members::find()
                                 ->join('join', 'subscriptions', 'subscriptions.member_id = members.id')
                    ->andWhere(['subscriptions.r_type' => $subscriptionType])
                    ->andWhere(["r_user" => $userId])
                    ->andWhere(["active"=>0])
                    ->count();
              $newMembers= Members::find()
                         ->join('join', 'subscriptions', 'subscriptions.member_id = members.id')
                    ->andWhere(['subscriptions.r_type' => $subscriptionType])
                    ->andWhere(' date between  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW() ')
                    ->andWhere(["r_user" => $userId])
                    ->andWhere(["active"=>1])
                    ->count();
        }
        $totalProfits = 0;
        if ($userId) {
            $totalProfits = Subscriptions::find()
                    ->where(["r_user" => $userId])
                    ->join('join', 'members', 'members.id = subscriptions.member_id')
                    ->andWhere(["members.r_user" => $userId])
                    ->andWhere(['subscriptions.r_type' => $subscriptionType])
                             ->andWhere('subscription_date between  DATE_FORMAT(NOW() ,"%Y-%m-01") AND NOW() ')
                    ->sum('fee');
        }


        return $this->render('index_by_type', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'title' => "Forex And Cypto Members",
                    'totalMembers' => $totalMembers,
                    'totalProfits' => $totalProfits,
                    'subscriptionType' => $subscriptionType,
                 'totalInactive' => $totalInactive,
                    'newMembers' => $newMembers,
        ]);
    }

    /**
     * Displays a single Members model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {

        $subscriptions = Subscriptions::find()
                        ->select("subscriptions.*,members.fullname,type.name as typeName")
                        ->join("join", "members", "members.id = subscriptions.member_id")
                        ->join("join", "type", "type.id = subscriptions.r_type")
                        ->where(["member_id" => $id])
                        ->asArray()->all();


        $provider = new ArrayDataProvider([
            'allModels' => $subscriptions,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['member_id'],
            ],
        ]);

        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'provider' => $provider
        ]);
    }

    /**
     * Creates a new Members model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|Response
     */
    public function actionCreate() {
        $model = new Members();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->r_user = Yii::$app->user->id;
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
//                    return $this->redirect(['index']);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Members model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
//            return $this->redirect(['index']);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Members model.
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
     * Finds the Members model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Members the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Members::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
