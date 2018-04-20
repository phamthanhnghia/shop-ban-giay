<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;

class HomeController extends Controller{
	public function actionIndex(){
		$this->layout='theme-admin';
		return $this->render('index');
	}
}