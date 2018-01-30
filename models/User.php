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
class User extends \yii\db\ActiveRecord
{
    const ADMIN = 1;
    const KHACH = 2;
    const NHANVIEN = 3;
    const QUANLY = 4;
    //
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
            User::KHACH => 'Khách hàng',
            User::NHANVIEN => 'Nhân viên',
            User::QUANLY => 'Quản lý', 
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

}
