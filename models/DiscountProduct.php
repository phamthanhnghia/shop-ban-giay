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
            [['info', 'discount', ], 'required'],
            [[ 'discount'], 'integer'],
            [['created_date'], 'safe'],
            [['info'], 'string', 'max' => 100],
            
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
    
    public function formatSave(){
        $format = "Y-m-d h:m:s";
        $this->created_date = date($format);
    }

    public function getArrayDiscountProduct(){
        $variable = DiscountProduct::find()->all();
        $result = [];


        foreach ($variable as $key ) {
            $result[$key->id] =  $key->info . " ( giảm ". $key->discount . " % )" ; 
        }
        // echo "<pre>";
        //     print_r($result);
        //     echo "</pre>";
        //     die;
        return $result;
    }
}
