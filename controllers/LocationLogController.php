<?php

namespace app\controllers;

use Yii;
use app\models\LocationLog;
use app\models\LocationLogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LocationLogController implements the CRUD actions for LocationLog model.
 */
class LocationLogController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all LocationLog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LocationLogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LocationLog model.
     * @param integer $player_id
     * @param integer $location_id
     * @return mixed
     */
    public function actionView($player_id, $location_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($player_id, $location_id),
        ]);
    }

    /**
     * Creates a new LocationLog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LocationLog();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'player_id' => $model->player_id, 'location_id' => $model->location_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing LocationLog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $player_id
     * @param integer $location_id
     * @return mixed
     */
    public function actionUpdate($player_id, $location_id)
    {
        $model = $this->findModel($player_id, $location_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'player_id' => $model->player_id, 'location_id' => $model->location_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing LocationLog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $player_id
     * @param integer $location_id
     * @return mixed
     */
    public function actionDelete($player_id, $location_id)
    {
        $this->findModel($player_id, $location_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the LocationLog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $player_id
     * @param integer $location_id
     * @return LocationLog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($player_id, $location_id)
    {
        if (($model = LocationLog::findOne(['player_id' => $player_id, 'location_id' => $location_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
