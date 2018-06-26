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
use app\models\Bill;
use app\models\BillDetail;
use app\controllers\BillController;
use Yii;
use app\controllers\SiteController;
use app\components\Mailer\PHPMailer;
 
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
        $bill = new Bill();
        $this->layout = 'layout-user';
        $post = Yii::$app->request->post();
        $user = new User();
        if ($user->idLogged()) {
            $bill->createBill();
            $this->sendMailSussecc();

            return $this->render('pay/success');
            //return $this->goHome();
        }
       
        if(isset($post['register']) && $post['register'] == 1){
            $this->layout = 0;
            $users = new User();
            $users->beforeSaveUser($post['Users']);
            $users->validate();
            $users->save();
            $_SESSION['ID_USER'] = $users->id;
            $bill->createBill();
            $this->sendMailSussecc();
            return $this->render('pay/success');
        }
        return $this->render('info-customer/register');
    }

    public function actionBill(){
        $this->layout = 'layout-user';
        return $this->render('bill/index');
    }

    public function actionBillDetail($id){ //$id bill
        $this->layout = 'layout-user';
        return $this->render('bill/billdetail');
    }

    public function actionRemoveBill($id){

        
        try {
            // $billdetail = BillDetail::find()->where(['id_bill'=>$id])->all();
            // foreach ($billdetail as $key) {
            //     $key->delete();
            // }
            // $bill = Bill::findOne($id)->delete();

            $bill = Bill::findOne($id);
            $bill->attributes = array(
                                'status' => 2, /// danger
                                );
            $bill->update();
            $this->layout = 'layout-user';
            $this->sendMailRemove();
            return $this->render('pay/remove');
        } catch (Exception $e) {
            $this->layout = 'layout-user';
            return $this->render('bill/index');
        }
        
    }
    public function actionHideBill($id){

        
        try {

            $bill = Bill::findOne($id);
            $bill->attributes = array(
                                'status' => -1, /// ẩn đi cho khách hàng
                                );
            $bill->update();
            $this->layout = 'layout-user';
            return $this->render('bill/index');
        } catch (Exception $e) {
            // $this->layout = 'layout-user';
            // return $this->render('bill/index');
        }
        
    }
    public function actionInfoCustomer(){
        $this->layout = 'layout-user';
        return $this->render('info-customer/index');
    }
    public function sendMailSussecc(){
        $mail = new PHPMailer(false);                              // Passing `true` enables exceptions
        try {
            //Server settings
            //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';   //'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'hai.01678465648@gmail.com';                 // SMTP username
            $mail->Password = '01678465648';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('hai.01678465648@gmail.com', 'Mailer');
            $mail->addAddress('15520545@gm.uit.edu.vn', 'Joe User');     // Add a recipient
            // $mail->addAddress($mail);               // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Xác nhận đơn hàng thành công';
            $mail->Body    = 'Xác nhận đơn hàng thành công';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }

    }
    public function sendMailRemove(){
        $mail = new PHPMailer(false);                              // Passing `true` enables exceptions
        try {
            //Server settings
            //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';   //'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'hai.01678465648@gmail.com';                 // SMTP username
            $mail->Password = '01678465648';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('hai.01678465648@gmail.com', 'Mailer');
            $mail->addAddress('15520545@gm.uit.edu.vn', 'Joe User');     // Add a recipient
            // $mail->addAddress($mail);               // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Xác nhận hủy đơn hàng thành công';
            $mail->Body    = 'Xác nhận hủy đơn hàng thành công';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }

    }

}