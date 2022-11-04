<?php

namespace app\controllers;

use app\models\ForexSignals;
use app\models\ForexSignalsSearch;
use app\models\User;
use app\models\Utils;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * ForexSignalsController implements the CRUD actions for ForexSignals model.
 */
class ForexSignalsController extends Controller {

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
     * Lists all ForexSignals models.
     *
     * @return string
     */
    public function actionIndex() {
        $searchModel = new ForexSignalsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $model = new ForexSignals();

        $user = User::find()
                ->select(['id', 'username', 'email', 'photo', 'back_photo', 'bio', 'twitter'
                    , 'facebook', 'tiktok', 'insta', 'contact_number', 'telegram_link'])
                ->asArray()
                ->where(['id' => Yii::$app->user->id])
                ->one();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                if (\Yii::$app->user->can("/forex-signals/create")) {
                    $userId = Yii::$app->user->id;
                    $model->user_id = $userId;
                    $model->target = implode(',', $model->target);
                    $model->user_id = Yii::$app->user->id;
                    if ($model->save()) {

//                return $this->redirect(['view', 'id' => $model->id]);
                        return $this->redirect(['index']);
                    } else {
                        VarDumper::dump($model->getErrors(), 3, true);
                        die();
                    }
                }
            }
        } else {
            $model->loadDefaultValues();
        }
        $shareUrl = Url::current(['userId' => $user["id"]], true);
        $shareUrl = str_replace('forex-signals/index', 'forex-signals/share', $shareUrl);
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model' => $model,
                    'user' => $user,
                    'shareUrl' => $shareUrl,
        ]);
    }

    public function actionShare() {

        $searchModel = new ForexSignalsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $userId = $this->request->queryParams["userId"];
        $user = User::find()
                ->select(['id', 'username', 'email', 'photo', 'back_photo', 'bio', 'twitter'
                    , 'facebook', 'tiktok', 'insta', 'contact_number', 'telegram_link', 'discord', 'year_offer', 'all_till_offer', 'three_months_offer', 'monthly_charge_offer', 'year_offer_forex', 'all_till_offer_forex', 'three_months_offer_forex', 'monthly_charge_offer_forex'])
                ->asArray()
                ->where(['id' => $userId])
                ->one();


        $netProfit = Utils::getSignalForexProfitByUserId($userId);
        $wonProfit = Utils::getSignalForexProfitWonByUserId($userId);
        $lossProfit = Utils::getSignalForexProfitLossByUserId($userId);

        $this->layout = 'main-wothout-additions';

        return $this->render('share', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'user' => $user,
                    'netProfit' => $netProfit,
                    'wonProfit' => $wonProfit,
                    'lossProfit' => $lossProfit
        ]);
    }

    /**
     * Displays a single ForexSignals model.
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
     * Creates a new ForexSignals model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|Response
     */
    public function actionCreate() {
        $model = new ForexSignals();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $userId = Yii::$app->user->id;
                $model->user_id = $userId;
                if ($model->save()) {
                    //                return $this->redirect(['view', 'id' => $model->id]);
                    return $this->redirect(['index']);
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
     * Updates an existing ForexSignals model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|Response
     * @throws NotFoundHttpException if the model cannot be found
     */
//    public function actionUpdate($id) {
//        $model = $this->findModel($id);
//
//        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
////            return $this->redirect(['view', 'id' => $model->id]);
//            return $this->redirect(['index']);
//        }
//
//        return $this->render('update', [
//                    'model' => $model,
//        ]);
//    }

    /**
     * Deletes an existing ForexSignals model.
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
     * Finds the ForexSignals model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ForexSignals the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = ForexSignals::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
