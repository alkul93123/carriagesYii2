<?php

namespace app\controllers;

use Yii;
use app\models\OwnerModel;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OwnersController implements the CRUD actions for OwnerModel model.
 * В целом полный CRUD нам не нужен, нам нужно только получать владельцев, и
 * добавлять
 */
class OwnersController extends Controller
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
     * Получение всех владельцев.
     * @return mixed
     */
    public function actionIndex()
    {

        $owners = OwnerModel::find()->all();

        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        $response->data = ['owners' => $owners];

        return $response;
    }


    /**
    * Добавление нового владельца.
    * @return boolean
    */

    public function actionCreate()
    {

        $model = new OwnerModel();
        /*
        * Т.к. у меня csrf передается в заголовках, а метод load у модели
        * проверяет наличие _csrf пришлось сделать этот костыль
        * (Я думаю есть и другое решение, но я особо не искал)
        */
        $owner = array(
            '_csrf'       => Yii::$app->request->headers->get('X-CSRF-Token'),
            'OwnerModel'  => Yii::$app->request->post(),
        );

        if ($model->load($owner) && $model->save()) {
            return Yii::$app->response->statusCode = 200;
        } else {
            return Yii::$app->response->statusCode = 400;
        }
    }
}
