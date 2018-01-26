<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bill_detail".
 *
 * @property int $id
 * @property int $amount số lượng 
 * @property int $size_product
 * @property int $sum_price
 * @property int $code_color
 * @property int $id_product
 * @property int $id_bill
 *
 * @property Product $product
 * @property Bill $bill
 */
class BillDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bill_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount', 'sum_price', 'id_product', 'id_bill'], 'required'],
            [['amount', 'size_product', 'sum_price', 'code_color', 'id_product', 'id_bill'], 'integer'],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['id_product' => 'id']],
            [['id_bill'], 'exist', 'skipOnError' => true, 'targetClass' => Bill::className(), 'targetAttribute' => ['id_bill' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'amount' => 'số lượng ',
            'size_product' => 'Size Product',
            'sum_price' => 'Sum Price',
            'code_color' => 'Code Color',
            'id_product' => 'Id Product',
            'id_bill' => 'Id Bill',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'id_product']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBill()
    {
        return $this->hasOne(Bill::className(), ['id' => 'id_bill']);
    }
}
