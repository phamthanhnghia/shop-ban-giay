<?php

namespace app\models;

use Yii;
use app\components\Format;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $dob
 * @property string $phone
 * @property int $role 0: admin - 1 : khách hàng- 2 : nhân viên - 3: quản lý
 * @property string $address
 * @property string $email
 * @property int $status 1: còn hoạt động- 0 : ko hoạt động
 *
 * @property Bill[] $bills
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const ADMIN = 1;
    const QUANLY = 2;
    const NHANVIEN = 3;
    const KHACH = 4;
    
    const CO = 1;
    const KHONG = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dob'], 'safe'],
            [['role', 'status'], 'integer'],
            [['email','name','phone','dob'], 'required'],
            [['username', 'name', 'address', 'email'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 200],
            [['phone'], 'string', 'max' => 12],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'name' => 'Tên',
            'dob' => 'Sinh nhật',
            'phone' => 'Điện thoại',
            'role' => 'Phân quyền',
            'address' => 'Địa chỉ',
            'email' => 'Email',
            'status' => 'Trạng thái',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBills()
    {
        return $this->hasMany(Bill::className(), ['id_user' => 'id']);
    }

    // value
    public function getArrayRole(){
        return $arrayName = array(
            User::ADMIN => 'admin',
            User::QUANLY => 'Quản lý',
            User::NHANVIEN => 'Nhân viên',
            User::KHACH => 'Khách hàng',
        );
    }
    public function getArrayStatus(){
        return $arrayName = array(
            User::CO => 'Còn hoạt động',
            User::KHONG => 'Không hoạt động',
        );
    }
    public function beforeSaveUser($post){
        // echo "<pre>";
        //     print_r($post);
        //     echo "</pre>";
        //     die;
        $this->username = ($post['username']) ? $post['username'] : '';
        $this->password = ($post['password']) ? $post['password'] : '';
        $this->auth_key = Yii::$app->security->generateRandomString();
        $this->name = ($post['name']) ? $post['name'] : '';
        $this->dob = ($post['dob']) ? Format::dateConverDmyToYmd($post['dob'],'-') : '';
        $this->phone = ($post['phone']) ? $post['phone'] : '';
        $this->role = ($post['role']) ? $post['role'] : '1';
        $this->address = ($post['address']) ? $post['address'] : '';
        $this->email = ($post['email']) ? $post['email'] : '';
    }
    public function beforeUpdateUser($post){
        // echo "<pre>";
        //     print_r($post);
        //     echo "</pre>";
        //     die;
        $this->username = ($post['username']) ? $post['username'] : '';
        $this->password = ($post['password']) ? $post['password'] : '';
        $this->name = ($post['name']) ? $post['name'] : '';
        $this->dob = ($post['dob']) ? Format::dateConverDmyToYmd($post['dob'],'-') : '';
        $this->phone = ($post['phone']) ? $post['phone'] : '';
        $this->role = ($post['role']) ? $post['role'] : '1';
        $this->address = ($post['address']) ? $post['address'] : '';
        $this->email = ($post['email']) ? $post['email'] : '';
    }

    public function getRole(){
        $user = new User();
        $aRole = $user->getArrayRole();
        return ($aRole[$this->role]) ? $aRole[$this->role] : '';
    }
    public function getStatus(){
        $user = new User();
        $aStatus = $user->getArrayStatus();
        return ($aStatus[$this->status]) ? $aStatus[$this->status] : '';
    }
    public function getDob($dob){
        return Yii::$app->formatter->asDate($dob, 'd-M-Y');
    }
    public function findByUsername($username){
         $user = User::find()
                 ->where(['username'=> $username])
                 ->one();
         // echo "<pre>";
         // print_r($user->password);
         // echo "</pre>";
         // die;
         return $user;
    }
    public function validatePassword($password){
         return ($this->password == $password) ? true : false; //
    }
    // public function hasUsername(){
    //   $countUser = User::find()
    //         ->where(['username'=> $username])
    //         ->count();
    //         return ($countUser > 0) ? true : false;
    // }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }


    /////////

    public static function findUsers($username,$password){
        $let = User::findOne(['username' => $username],['password' == $password]);
        if($let == ""){
            return false;
        }
        return $let;
    }
    public function findUsersById($id){
        $let = User::findOne(['id' => $id]);
        if($let == ""){
            return false;
        }
        return $let;
    }

    public function idLogged(){
        if(isset($_SESSION['ID_USER'])){
            return $_SESSION['ID_USER'];
        }
        return false;
    }
    public static function logout(){
        unset($_SESSION['ID_USER']);
    }
    
    public function getRoleUserLogged(){
        $user = new User();
        if($user->idLogged()){
            $id = $user->idLogged();
            return Users::findIdentity($id);
        }
        return false;
    }

    public function HasUserName($username){
        $Users = User::find()->where(['username' => $username])->all();
        if($Users){
             return true;
        }
        return false;
    }

    
    public static function CreateMessage($typemessage, $info){
        $_SESSION['message'][$typemessage] = $info;
    }
    public static function CheckMessage(){
        if(isset($_SESSION['message']['danger'])){
            ?>
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Thất bại !</strong> <?= $_SESSION['message']['danger'] ?>
              </div>
            <?php
            unset($_SESSION['message']['danger']);
        }
        if(isset($_SESSION['message']['success'])){
            ?>
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Thành công !</strong> <?= $_SESSION['message']['success'] ?>
              </div>
            <?php
            unset($_SESSION['message']['success']);
        }
        
        if(isset($_SESSION['message']['info'])){
            ?>
            <div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Thông tin !</strong> <?= $_SESSION['message']['info'] ?>
              </div>
            <?php
            unset($_SESSION['message']['info']);
        }
        
        if(isset($_SESSION['message']['warning'])){
            ?>
            <div class="alert alert-warning alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Cảnh báo !</strong> <?= $_SESSION['message']['warning'] ?>
              </div>
            <?php
            unset($_SESSION['message']['warning']);
        }
        
    }

    public function setInterval($f, $milliseconds){
        $seconds=(int)$milliseconds/1000;
        while(true)
        {
            $f();
            sleep($seconds);
        }
    }

    public function countUser(){
        return User::find()->where(['role'=>4])->count();
    }
}
