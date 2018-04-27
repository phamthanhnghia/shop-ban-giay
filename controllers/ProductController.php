<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\ImageProduct;
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
//        $dataProvider = new ActiveDataProvider([
//            'query' => Product::find(),
//        ]);

        $this->layout = 'theme-admin';
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
        $this->layout = 'theme-admin';
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
        $this->layout = 'theme-admin';
        $model = new Product();
        $modelImage = new ImageProduct();
        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
            $model->attributes=$_POST['Product'];
            $model->formatSave();
            $model->save();

            // echo "<pre>";
            // print_r($model);
            // echo "</pre>";
            // die;
            if(UploadedFile::getInstance($modelImage, 'link'))
            {
                $modelImage->id_product = $model->id;
                // $modelImage->save();
                $productId = $model->id;
                $imageId = $modelImage->id;
                $image = UploadedFile::getInstance($modelImage, 'link');
                $imgName = '[giay]'.$productId.$imageId.'.'.$image->getExtension();
                $image->saveAs($this->getStoreToSave().'/'.$imgName);
                $modelImage->link = $imgName;
                $modelImage->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
            'modelImage'=> $modelImage,
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
        $this->layout = 'theme-admin';
        $model = $this->findModel($id);

        $modelImage = new ImageProduct();
        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
            $model->attributes=$_POST['Product'];
            $model->formatSave();
            $model->save();

            // echo "<pre>";
            // print_r($model);
            // echo "</pre>";
            // die;
            if(UploadedFile::getInstance($modelImage, 'link'))
            {
                $modelImage->id_product = $model->id;
                // $modelImage->save();
                $productId = $model->id;
                $imageId = $modelImage->id;
                $image = UploadedFile::getInstance($modelImage, 'link');
                $imgName = '[giay]'.$productId.$imageId.'.'.$image->getExtension();
                $image->saveAs($this->getStoreToSave().'/'.$imgName);
                $modelImage->link = $imgName;
                $modelImage->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'modelImage'=> $modelImage,
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
      return Yii::getAlias('@project') .'\web\images\product-images';
    }
}
