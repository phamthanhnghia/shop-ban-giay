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
        $modelImage = new ImageProduct();
        $modelImage = ImageProduct::find()->where(['id_product' => $id])->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'modelImage'=> $modelImage,
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

                $productId = $model->id;
                $image = UploadedFile::getInstance($modelImage, 'link');
                $imgName = 'giay'.$productId.'.'.$image->getExtension(); // .jpg .png 
                $image->saveAs($this->getStoreToSave().'/'.$imgName);
                $modelImage->attributes = array('id_product' => $model->id, 'link' => $imgName, );
               
                
                // echo "<pre>";
                // print_r($modelImage->attributes);
                // echo "</pre>";
                // die;
                $modelImage->save();
                //  echo "<pre>";
                // print_r($modelImage);
                // echo "</pre>";
                // die;
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
                $productId = $model->id;
                $image = UploadedFile::getInstance($modelImage, 'link');
                $imgName = 'giay'.$productId.'.'.$image->getExtension();
                $image->saveAs($this->getStoreToSave().'/'.$imgName);
                $modelImage->attributes = array('id_product' => $model->id, 'link' => $imgName, );
                $modelImage->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $modelImage = ImageProduct::find()->where(['id_product' => $id])->all();


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
        $ImageProduct = ImageProduct::find()->where(['id_product' => $id])->all();
        foreach ($ImageProduct as $key) {
            $key->delete();
        }
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

    
    //
    public function actionAddBasket()
    {
        
        $this->doAddBasket();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'success' => '1',
        ];
    }
    //
    public function  actionRemoveIdBasket(){
        $this->removeIdBasket();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'success' => '1',
        ];
    }
    //
    public function actionAddBasketButton(){
        $this->doAddBasketButton();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'success' => '1',
        ];
    }

    public function doAddBasketButton(){
        try {
                $aBasket = $_SESSION['basket'];
                $aBasket[$_POST['id']] =  $_POST['number'] ;
                $_SESSION['basket'] = $aBasket ;
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function removeIdBasket(){
        try {
                $aBasket = $_SESSION['basket'];
                unset($aBasket[$_POST['id']]);
                $_SESSION['basket'] = $aBasket ;
                if(empty($_SESSION['basket'])){
                    unset($_SESSION['basket']);
                }
            } catch (Exception $e) {
                echo $e;
            }
    }
    public function doAddBasket(){ // tạo giỏ hàng
        try {
            //  echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            // die;
            if(empty($_SESSION['basket'])){
                $aBasket  = array();
                $aBasket[] = array('id' => $_POST['id'],'size' => $_POST['size'], 'amount' => 1);
                $_SESSION['basket'] =  $aBasket;
            }else{
                $aBasket = $_SESSION['basket'];
                
                $id_array =$this->search_array( $aBasket,$_POST['id'],$_POST['size'] );
                
                if( $id_array != -1){
                    $mun = $aBasket[$id_array]['amount'];
                    $mun++;
                    $aBasket[$id_array]['amount'] = $mun;
                    $_SESSION['basket'] = $aBasket ;
                }else{
                    $aBasket  = $_SESSION['basket'];
                    $aBasket[] = array('id' => $_POST['id'],'size' => $_POST['size'], 'amount' => 1);
                    $_SESSION['basket'] =  $aBasket;
                }
                // if(!empty($aBasket[$_POST['id']])){
                //     $mun = $aBasket[$_POST['id']];
                //     $mun++;
                //     $aBasket[$_POST['id']] = $mun;
                //         $_SESSION['basket'] = $aBasket ;
                    
                // }else{
                //     $aBasket = $_SESSION['basket'];
                //     $aBasket[$_POST['id']] =  1 ;
                //     $_SESSION['basket'] = $aBasket ;
                // }
            }
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function search_array($ArrayBasket , $id ,$size){ ////////////////////////////////
        foreach ($ArrayBasket as $key => $value) {
           if($ArrayBasket[$key]['id'] == $id && $ArrayBasket[$key]['size'] == $size){
                return $key;
           } 
        }
        return -1;
    }

    //
    public function actionTest()
    {
        //unset($_SESSION['basket']);
        if(isset($_SESSION['basket'])){
            echo "<pre>";
            print_r($_SESSION['basket']);
            echo "</pre>";
            die;
        }
        // echo "<pre>";
        //     print_r($_POST);
        //     echo "</pre>";
        //     \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        // return [
        //     //'_csrf' => Yii::$app->request->getCsrfToken(),
        //     'code' => '100',
        //     'data' => 'ahihi',
        // ];
    }

}
