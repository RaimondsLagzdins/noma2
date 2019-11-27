<?php

namespace app\controllers;

use Yii;
use app\models\USER;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RegisterController implements the CRUD actions for USER model.
 */
class RegisterController extends Controller
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
     * Lists all USER models.
     * @return mixed
     */
//    public function actionIndex()
//    {
//        $dataProvider = new ActiveDataProvider([
//            'query' => USER::find(),
//        ]);
//
//        return $this->render('index', [
//            'dataProvider' => $dataProvider,
//        ]);
//    }

    /**
     * Displays a single USER model.
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
     * Creates a new USER model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed           actionCreate
     */
    public function actionIndex()
    {
        $model = new USER();
       // if(isset('register'));
        if ($model->load(Yii::$app->request->post()) ) {

            $model->REG_DATE = date("Y-m-d");

            $tmpUsername = null;
            $tmpEmail = null;

            $tmpUsername = User::find()
                ->where( [ 'USERNAME' => $model->USERNAME ] )
                ->exists();

            $tmpEmail = User::find()
                ->where( [ 'EMAIL' => $model->EMAIL ] )
                ->exists();

            if(isset($tmpUsername)){
                echo 'pidars';
                echo $model->USERNAME;
                die;
            }
            if(!isset($tmpEmail)){
                echo 'sdasdasd2222222';
                die;
            }
            if (!isset($tmpUsername) && !isset($tmpEmail)){
                $model->save();
            }else{

                if(isset($tmpUsername)){
                    Yii::$app->session->addFlash('error', "Lietotājvārds ir aizņemts!");
                }else if(isset($tmpEmail)){
                    Yii::$app->session->addFlash('error', "Epasts ir aizņemts!");
                }

                return $this->render('create', [
                    'model' => $model,

                ]);
            }

            return $this->redirect(['view', 'id' => $model->ID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing USER model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing USER model.
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
     * Finds the USER model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return USER the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = USER::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
