<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\controllers\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'theme-admin';
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = 'theme-admin';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'theme-admin';
        $model = new User();
        $post = Yii::$app->request->post();
        if($post){
             $model->beforeSaveUser($post['User']);
             $model->validate();
            // echo "<pre>";
            // print_r($model);
            // echo "</pre>";
            // die;
             if(!$model->hasErrors()){
                $model->save();
             return $this->redirect(['view', 'id' => $model->id]);
             }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = 'theme-admin';
        $model = $this->findModel($id);
        $post = Yii::$app->request->post();
        if($post){
             $model->beforeSaveUser($post['User']);
             $model->validate();
             if(!$model->hasErrors()){
                $model->save();
             return $this->redirect(['view', 'id' => $model->id]);
             }

            // echo "<pre>";
            // print_r($model);
            // echo "</pre>";
            // die;
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionLogout()
    {

       Yii::$app->user->logout();
       
    return Yii::$app->runController();
    }



     public function actionAjaxUpdate()
    {

         $this->doAjaxUpdate();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'success' => '1',
        ];
            
            // echo "<pre>";
            // print_r($model);
            // echo "</pre>";
            // die;
    
    }

    public function doAjaxUpdate(){
        $model = $this->findModel($_SESSION['ID_USER']);
             $model->beforeSaveUser($_POST);
             $model->validate();
                $model->save();
    }
}
