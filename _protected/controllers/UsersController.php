<?php

namespace app\controllers;

use app\models\Users;
use app\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Adldap\Adldap;
use yii\web\Response;
use Yii;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
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
        if ((Yii::$app->user->isGuest) || (Yii::$app->user->identity->role != 'admin')) {
            return $this->goHome();
        }

        return parent::beforeAction($action);
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionUsercreate()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $tbn = $_GET['tbn'];
//        return $tbn;
        $user = \Yii::$app->ad->search()->findBy('employeenumber', $tbn);
//        $user = Adldap::search()->findBy('employeenumber', $tbn);
        if ($user) {
            $username = $user->samaccountname[0];
            $fuulname = $user->cn[0];
            $email = $user->mail[0];
            $tbnumber = $user->employeenumber[0];
            return [
                'username' => $username,
                'fuulname' => $fuulname,
                'email' => $email,
                'tbnumber' => $tbnumber
            ];
        }
    }
    /**
     * Displays a single Users model.
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
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();
//        $user = \Yii::$app->user->identity->branch_id;
//        var_dump($user); die();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $user = \Yii::$app->user->identity;
                $model->section = $user->section;
                $model->branch_id = $user->branch_id;
                $model->role = 'controller';
                $model->save();
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Users model.
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
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
