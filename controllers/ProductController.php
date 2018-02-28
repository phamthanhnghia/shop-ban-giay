<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use app\controllers\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\db\Connection;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            echo "<pre>";
//            print_r($model);
//            echo "</pre>";
//            die;
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
        $post = Yii::$app->request->post();
        if ($post) {
            
          // $imageFile = UploadedFile::getInstance($model, 'link');
          // $name = "12312.".$imageFile->getExtension();
          // $imageFile->saveAs($this->getStoreToSave().'/'. $name);
          //
//           echo "<pre>";
//           print_r();
//           echo "</pre>";
//           die;
//            $connection = new Connection();
//            $connection->createCommand()->insert('product', [
//                'code' => ($post["code"]) ? $post["code"] : "",
//                'name' => ($post["name"]) ? $post["name"] : "",
//                'price' => ($post["price"]) ? $post["price"] : "",
//                'gender' => $post['gender'],
//                'created_date' => date("Y-m-d h:m:s"),
//                'list_color' => $post["list_color"],
//                'status' => $post['status'],
//                'id_type' => $post['id_type'],
//            ])->execute();
            
            
//            $format = "Y-m-d h:m:s"; // any format you wish
//            $model->code = ($post["code"]) ? $post["code"] : "";
//            $model->name = ($post["name"]) ? $post["name"] : "";
//            $model->price = ($post["price"]) ? $post["price"] : "";
//            $model->gender = ($post['gender']) ? $post['gender'] : '1';
//            $model->created_date = date($format);
//            $model->list_color = ($post["list_color"]) ? $post["list_color"] : '1';
//            $model->status = ($post['status']) ? $post['status'] : '1';
//            $model->id_type = ($post['id_type']) ? $post['id_type'] : '';
            //$model->validate();
          $model->beforeSave($post['Product']);
          $model->validate();
          //$model->attributes = $post['Product'];
          if(!$model->hasErrors()){
                $model->save(false);
             return $this->redirect(['view', 'id' => $model->id]);
             }
          //$model->save();
          //$model->getPrimaryKey();
          //$model->load($post);
          //$model->validate();
          //$model->save();
          // echo "<pre>";
          // print_r($post['Product']['code']);
          // echo "</pre>";
          echo "<pre>";
          print_r($model);
          echo "</pre>";
          die;
          return $this->redirect(['view', 'id' => $model->id]);
          if(!$model->hasErrors()){
              $model->save();
              return $this->redirect(['view', 'id' => $model->id]);
          }

        }

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function getStoreToSave(){
      Yii::setAlias('@project', realpath(dirname(__FILE__).'/../'));
      return Yii::getAlias('@project') .'\store';
    }
}
