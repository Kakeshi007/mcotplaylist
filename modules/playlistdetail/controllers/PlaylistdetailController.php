<?php

namespace app\modules\playlistdetail\controllers;

use Yii;
use app\models\PlaylistDetail;
use app\models\PlaylistDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PlaylistdetailController implements the CRUD actions for PlaylistDetail model.
 */
class PlaylistdetailController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all PlaylistDetail models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PlaylistDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PlaylistDetail model.
     * @param integer $playlistid
     * @param integer $fileid
     * @param integer $linkid
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($playlistid, $fileid, $linkid)
    {
        return $this->render('view', [
            'model' => $this->findModel($playlistid, $fileid, $linkid),
        ]);
    }

    /**
     * Creates a new PlaylistDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PlaylistDetail();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'playlistid' => $model->playlistid, 'fileid' => $model->fileid, 'linkid' => $model->linkid]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PlaylistDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $playlistid
     * @param integer $fileid
     * @param integer $linkid
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($playlistid, $fileid, $linkid)
    {
        $model = $this->findModel($playlistid, $fileid, $linkid);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'playlistid' => $model->playlistid, 'fileid' => $model->fileid, 'linkid' => $model->linkid]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PlaylistDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $playlistid
     * @param integer $fileid
     * @param integer $linkid
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($playlistid, $fileid, $linkid)
    {
        $this->findModel($playlistid, $fileid, $linkid)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PlaylistDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $playlistid
     * @param integer $fileid
     * @param integer $linkid
     * @return PlaylistDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($playlistid, $fileid, $linkid)
    {
        if (($model = PlaylistDetail::findOne(['playlistid' => $playlistid, 'fileid' => $fileid, 'linkid' => $linkid])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
