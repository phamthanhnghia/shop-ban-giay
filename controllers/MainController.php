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
        $this->layout = 'layout-user';
        return $this->render('basket/index');
    }
}