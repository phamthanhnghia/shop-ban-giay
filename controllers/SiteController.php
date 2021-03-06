<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        //  $this->layout = 0;
        // if (!Yii::$app->user->isGuest) {
        //     return $this->goHome();
        // }

        // $model = new LoginForm();
        // if ($model->load(Yii::$app->request->post()) && $model->login()) {
        //     return $this->goBack();
        // }
        // return $this->render('login', [
        //     'model' => $model,
        // ]);

        $this->layout = 0;
        $user = new User();
        if ($user->idLogged()) {
            return $this->goHome();
        }

        $model = new LoginForm();
        $post = Yii::$app->request->post();
        if(isset($post['LoginForm'])){
            $model->formatForLoginUsers($post['LoginForm']);
            $model->login();
            if( $user->idLogged()){
                $id = $user->idLogged();
                $user = $user->findUsersById($id);
                $role = $user->role;
                if($role == 1){
                    header('Location: ../home');
                    exit;
                }
            }
            return $this->goHome();
        }
        
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    // public function actionLogout()
    // {
    //     Yii::$app->user->logout();
    //     return $this->goHome();
    // }

    public function actionLogoutUser()
    {
        unset($_SESSION['ID_USER']);
        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
     public function actionRegister()
    {
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
            return $this->redirect('login');
        }
        return $this->render('register');
    }
    
    public function  actionLoading(){
        $this->layout = 0;
        return $this->render('loading');
    }
}