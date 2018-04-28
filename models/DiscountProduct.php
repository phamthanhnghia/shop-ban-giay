<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "discount_product".
 *
 * @property int $id
 * @property string $info
 * @property int $type 1: giảm phần trăm - 2: giảm tiền
 * @property int $discount
 * @property int $status 0: ko đùng - 1 : còn áp dụng
 * @property string $created_date
 * @property int $id_product
 *
 * @property Product $product
 */
class DiscountProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'discount_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['info', 'type', 'discount', 'id_product'], 'required'],
            [['type', 'discount', 'status', 'id_product'], 'integer'],
            [['created_date'], 'safe'],
            [['info'], 'string', 'max' => 100],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['id_product' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'info' => 'Thông tin',
            'type' => 'Loại',
            'discount' => 'Giảm',
            'status' => 'Trạng thái',
            'created_date' => 'Ngày tạo',
            'id_product' => 'Sản phẩm',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'id_product']);
    }

            
    public function getArrayStatus(){
        return [
            '0' => 'Không áp dụng',
            '1' => 'Còn áp dụng',
        ];
    }
    public function getArrayType(){
        return [
            '1' => 'Giảm phần trăm',
            '2' => 'Giảm tiền',
        ];
    }
    public function formatSave(){
        $format = "Y-m-d h:m:s";
        $this->created_date = date($format);
    }
}
