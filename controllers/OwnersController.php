<?php

namespace app\controllers;

use app\models\OwnerModel as Owner;
use Yii;

class OwnersController extends \yii\web\Controller
{

    // public function beforeAction($action)
    // {
    //   $this->enableCsrfValidation = false;
    //   return parent::beforeAction($action);
    // }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
      $request = Yii::$app->request;
      $response = Yii::$app->response;

      print_r($_POST);
      exit;

      $owner = new Owner($request->post());
      if ($owner->save()) {
        return $response->statusCode = 200;
      }

      return $response->statusCode = 500;
    }
}
