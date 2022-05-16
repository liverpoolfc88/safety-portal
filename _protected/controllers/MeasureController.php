<?php

namespace app\controllers;

use app\models\Appeal;
use app\models\Measure;
use app\models\MeasureSearch;
use yii\base\BaseObject;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\web\UploadedFile;

/**
 * MeasureController implements the CRUD actions for Measure model.
 */
class MeasureController extends Controller
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

    public function beforeAction($action)
    {
        if ((Yii::$app->user->isGuest)) {
            return $this->goHome();
        }

        return parent::beforeAction($action);
    }

    /**
     * Lists all Measure models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MeasureSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Measure model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Measure model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Measure();

//        var_dump($this->request->post()); die();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())  ) {

                $appeal = Appeal::find()->where(['id'=>$id])->one();


                $model->status = 0;
//                $model->appeal_id = $this->request->post('id');
                $model->appeal_id = $id;
                $model->user_id = Yii::$app->user->identity->id;
                $model->created_at = date('Y-m-d H:i:s');

                function mfile($model,$qiymat){
                    $file = UploadedFile::getInstance($model, $qiymat);
                    if (isset($file))
                    {
                        $filename = uniqid() . '.' . $file->extension;
                        $path = 'uploads/';
                        if (!file_exists($path)) {
                            mkdir($path,0777,true);
                        }
                        $path = 'uploads/' . $filename;
                        if ($file->saveAs($path))
                        {
                            return $path;
                        }
                    }
                }

                $model->measure_file = mfile($model, 'measure_file');

                $model->save();
                if ($model->save()){
                    $appeal->status = 1;
                    $appeal->save();
                }


                return $this->redirect(['/appeal/view', 'id' => $id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionMcreate(){

        $appeal_id = $_GET['appeal_id'];


        $model = new Measure();


        return $appeal_id;
    }

    /**
     * Updates an existing Measure model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Measure model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Measure model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Measure the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Measure::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
