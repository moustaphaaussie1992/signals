<?php

namespace app\controllers;

use app\models\Usdt;
use app\models\UsdtSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * UsdtController implements the CRUD actions for Usdt model.
 */
class UsdtController extends Controller {

    /**
     * @inheritDoc
     */
    public function behaviors() {
        return array_merge(
                parent::behaviors(),
                [
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
     * Lists all Usdt models.
     *
     * @return string
     */
    public function actionIndex() {






        $searchModel = new UsdtSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $model = new Usdt();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $userId = \Yii::$app->user->id;
                $model->user_id = $userId;
                $model->type = $model->type[0];



                if ($model->save()) {

//                return $this->redirect(['view', 'id' => $model->id]);
                    return $this->redirect(['index']);
                } else {
                    return $model->getErrors();
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model' => $model,
        ]);
    }

    /**
     * Displays a single Usdt model.
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
     * Creates a new Usdt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|Response
     */
    public function actionCreate() {
        $model = new Usdt();

        if ($this->request->isPost) {

            if ($model->load($this->request->post())) {
                $userId = Yii::$app->user->id;
                $model->user_id = $userId;
                if ($model->save()) {
//                    return $this->redirect(['view', 'id' => $model->id]);
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
     * Updates an existing Usdt model.
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
     * Deletes an existing Usdt model.
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
     * Finds the Usdt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Usdt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Usdt::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
