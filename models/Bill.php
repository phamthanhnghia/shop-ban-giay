<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bill".
 *
 * @property int $id
 * @property int $total_price
 * @property string $bill_code
 * @property int $status 0: ko còn - 1 : báo giá - 2 : hủy - 3: đã bán
 * @property string $created_date
 * @property int $id_user
 *
 * @property User $user
 * @property BillDetail[] $billDetails
 */
class Bill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['total_price', 'created_date', 'id_user'], 'required'],
            [['total_price', 'status', 'id_user'], 'integer'],
            [['created_date'], 'safe'],
            [['bill_code'], 'string', 'max' => 20],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'total_price' => 'Total Price',
            'bill_code' => 'Bill Code',
            'status' => '0: ko còn - 1 : báo giá - 2 : hủy - 3: đã bán',
            'created_date' => 'Created Date',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBillDetails()
    {
        return $this->hasMany(BillDetail::className(), ['id_bill' => 'id']);
    }
}
