<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;
 
use yii\web\Controller;
use app\models\Product;
 
class MainController extends Controller
{
    public $defaultAction = 'home';
 
    public function actionHome()
    {
        
        $this->layout = 'theme-user';

        $product = new Product();
        $listProduct = $product->showProduct();

        return $this->render('index',[
        	'listProduct' => $listProduct,
        ]);
        //echo "hihi";
    }
}