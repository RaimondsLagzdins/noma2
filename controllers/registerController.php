<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class RegisterController extends Controller
{

    public function actionIndex()
    {
//        $asd = Yii::$app->request->post(‘vards’);
//        echo $asd;
        return $this->render('register');

    }

    public function actionRegister(){
//        $newUser = new Users;
//
//        $newUser->username = Yii::app()->request->getParam(‘vards’);

    }
    public function actionHelloWorld()
    {
        return 'Hello World';
    }
}
?>