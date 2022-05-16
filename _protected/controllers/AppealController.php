<?php

namespace app\controllers;

use app\models\Appeal;
use app\models\AppealSearch;
use app\models\Measure;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * AppealController implements the CRUD actions for Appeal model.
 */
class AppealController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
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

//    public function beforeAction($action)
//    {
//        if ((Yii::$app->user->isGuest)) {
//            return $this->goHome();
//        }
//
//        return parent::beforeAction($action);
//    }

    /**
     * Lists all Appeal models.
     * @return mixed
     */
    public function actionIndex()
    {

        if ((Yii::$app->user->isGuest)) {
            return $this->goHome();
        }
        $searchModel = new AppealSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Appeal model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        if ((Yii::$app->user->isGuest)) {
            return $this->goHome();
        }
        $model_a = $this->findModel($id);
        $measure = $model_a->getMeas()->all();

        $model = new Measure();


        return $this->render('view', [
            'model' => $model,
            'model_a' => $model_a,
            'measure' => $measure
        ]);
    }
//    public function actionTextview($id)
//    {
//        return $this->renderAjax('textview', [
//            'model' => $this->findModel($id),
//        ]);
//    }

    /**
     * Creates a new Appeal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($section = '')
    {
        $model = new Appeal();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
//                return 'sasas';
                $model->branch = 1;
                $model->status = 0;
                $model->appeal_date	 = date('Y-m-d H:i:s');
                $model->section = $section;
                $model->save();
                return $this->redirect(['site/index', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionStatus(){
        $appeal_id = $_GET['appeal_id'];
        $appeal = Appeal::find()->where(['id'=>$appeal_id])->one();
        if (Yii::$app->user->identity->role == 'admin'){
            $appeal->status = 2;
            $appeal->save();
            return 'success';
        }
        return 'error';
    }
    public function actionRejection(){
        $appeal_id = $_GET['appeal_id'];
        $appeal = Appeal::find()->where(['id'=>$appeal_id])->one();
        if (Yii::$app->user->identity->role == 'admin'){
            $appeal->status = 0;
            $appeal->save();
            return 'success';
        }
        return 'error';
    }

    /**
     * Updates an existing Appeal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        if ((Yii::$app->user->isGuest)) {
            return $this->goHome();
        }
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Appeal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        if ((Yii::$app->user->isGuest)) {
            return $this->goHome();
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Appeal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Appeal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Appeal::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
