<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $price
 * @property int $gender 0: nữ - 1: nam
 * @property string $created_date
 * @property string $list_color
 * @property int $status 0: không bán - 1: mới - 2 : bình thường
 * @property int $id_type
 *
 * @property BillDetail[] $billDetails
 * @property DiscountProduct[] $discountProducts
 * @property ImageProduct[] $imageProducts
 * @property Type $type
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name', 'price', 'gender', 'created_date', 'list_color', 'id_type'], 'required'],
            [['price', 'gender', 'status', 'id_type'], 'integer'],
            [['created_date'], 'safe'],
            [['code'], 'string', 'max' => 20],
            [['name', 'list_color'], 'string', 'max' => 100],
            [['id_type'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['id_type' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            'price' => 'Price',
            'gender' => '0: nữ - 1: nam',
            'created_date' => 'Created Date',
            'list_color' => 'List Color',
            'status' => '0: không bán - 1: mới - 2 : bình thường',
            'id_type' => 'Id Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBillDetails()
    {
        return $this->hasMany(BillDetail::className(), ['id_product' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscountProducts()
    {
        return $this->hasMany(DiscountProduct::className(), ['id_product' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageProducts()
    {
        return $this->hasMany(ImageProduct::className(), ['id_product' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::className(), ['id' => 'id_type']);
    }
}
