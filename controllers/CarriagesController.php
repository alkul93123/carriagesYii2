<?php

namespace app\controllers;

use Yii;
use app\models\CarriageModel;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response as Response;

/**
 * CarriagesController implements the CRUD actions for CarriageModel model.
 */
class CarriagesController extends Controller
{
    public function beforeAction($action)
    {
      $this->enableCsrfValidation = false;
      return parent::beforeAction($action);
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['DELETE'],
                ],
            ],
        ];
    }

    /**
     * Lists all CarriageModel models.
     * @return mixed
     */
    public function actionIndex()
    {

        $carriages = CarriageModel::find()->with('owner')->asArray()->all();


        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $response->data = ['carriages'  => $carriages ];

        return $response;
    }

    /**
     * Creates a new CarriageModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CarriageModel();

        $post = Yii::$app->request->post();


        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;

        if (CarriageModel::find()
              ->where(['carriage_number' => $post['carriage_number']])->exists()) {
          $response->statusCode = 400;
          $response->data = ['error' => 'Вагон с таким id уже существует'];
          return $response;
        }

        $carriage = array(
            '_csrf'           => Yii::$app->request->headers->get('X-CSRF-Token'),
            'CarriageModel'   => $post,
        );

        if ($model->load($carriage) && $model->save()) {
            $response->statusCode = 201;
            return $response;
        } else {
          $response->statusCode = 400;
          $response->data = ['error'  => 'Запись не добавлена'];
          return $response;
        }
    }

    /**
     * Updates an existing CarriageModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $carriage = array(
            '_csrf'           => Yii::$app->request->headers->get('X-CSRF-Token'),
            'CarriageModel'   => Yii::$app->request->post(),
        );

        if ($model->load($carriage) && $model->save()) {
          return Yii::$app->response->statusCode = 200;
        } else {
          return Yii::$app->response->statusCode = 400;
          // В приципе тут можно отловить ошибку, почему не обновились данные
        }
    }

    /**
     * Deletes an existing CarriageModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return Yii::$app->response->statusCode = 200;

    }

    /**
     * Finds the CarriageModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CarriageModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CarriageModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
