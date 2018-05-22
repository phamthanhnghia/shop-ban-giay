<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;
 
use yii\web\Controller;
use app\models\Product;
use yii\data\Pagination;
use app\models\ImageProduct;
use app\models\User;
use Yii;
use app\controllers\SiteController;

 
class MainController extends Controller
{
    public $defaultAction = 'home';
 
    public function actionHome()
    {
        
        $this->layout = 'theme-user';

         // $product = new Product();
        $query = Product::find();
	    $countQuery = $query->count();
	    $pages = new Pagination(['totalCount' => $countQuery]);
	    $pages->pageSize= 9;
	    $models = $query->offset($pages->offset)
	        ->limit($pages->limit)
	        ->all();

        return $this->render('index',[
        	'listProduct' => $models,
        	'pages' => $pages,
        ]);
        //echo "hihi";
    }
    public function actionDetail($id)
    {
    	 $this->layout = 'layout-user';
        $model = Product::find()->where(['id' => $id])->all();
        return $this->render('detail/index', [
            'model' => $model,
        ]);
    }

    public function actionBasket()
    {
        if(isset($_SESSION['basket']) && !empty($_SESSION['basket'])){
             $this->layout = 'layout-user';
            return $this->render('basket/index');
        }
        User::CreateMessage('info','Bạn chưa chọn hàng !');
        return $this->goBack();
    }

    public function actionPay(){
        



        $this->layout = 'layout-user';
        $post = Yii::$app->request->post();
        $user = new User();
        if ($user->idLogged()) {
            return $this->goHome();
        }
       
        if(isset($post['register']) && $post['register'] == 1){
            $this->layout = 0;
            $users = new User();
            $users->beforeSaveUser($post['Users']);
            $users->validate();
            $users->save();
            echo $users->id;
            return $this->render('info-customer/index');
        }
        return $this->render('info-customer/register');
    }
}