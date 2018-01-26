<?php

namespace app\models;

use Yii;

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
 * @property string $addpress
 * @property string $email
 * @property int $status 1: còn hoạt động- 0 : ko hoạt động
 *
 * @property Bill[] $bills
 */
class User extends \yii\db\ActiveRecord
{
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
            [['email'], 'required'],
            [['username', 'name', 'addpress', 'email'], 'string', 'max' => 100],
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
            'name' => 'Name',
            'dob' => 'Dob',
            'phone' => 'Phone',
            'role' => '0: admin - 1 : khách hàng- 2 : nhân viên - 3: quản lý',
            'addpress' => 'Addpress',
            'email' => 'Email',
            'status' => '1: còn hoạt động- 0 : ko hoạt động',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBills()
    {
        return $this->hasMany(Bill::className(), ['id_user' => 'id']);
    }
}
