<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\controllers\BillSearch;
use app\models\Bill;


class HomeController extends Controller{
	public function actionIndex(){
		$this->layout='theme-admin';
		return $this->render('index');
	}

	public function actionAccessBill()
    {
        $this->layout = 'theme-admin';
        $searchModel = new BillSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if($_GET){
        	$this->doAccessBill();
        }
        return $this->render('access-bill/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function doAccessBill(){
    	$id = $_GET['id'];
    	$model = Bill::findOne($id);
    	//$status = $model->status;
    	if($model->status == 1){
    		$model->status = 0;
    		$model->update();
    		return ;
    	}
        if($model->status == 0){
            $model->status = 3;
            $model->update();
            return ;
        }
    }

    public function actionRemoveBill(){
        $this->layout = 'theme-admin';
        $searchModel = new BillSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if($_GET){
            $this->doRemoveBill();
        }
        return $this->render('access-bill/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function doRemoveBill(){
        $id = $_GET['id'];
        $model = Bill::findOne($id);
        if($model->status == 1){
            $model->status = 2;
            $model->update();
            return ;
        }
        if($model->status == 0){
            $model->status = 2;
            $model->update();
            return ;
        }
    }

}