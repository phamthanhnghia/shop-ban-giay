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
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $link;
    
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
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Mã sản phẩm'),
            'name' => Yii::t('app', 'Tên sản phẩm'),
            'price' => Yii::t('app', 'Giá'),
            'gender' => Yii::t('app', 'Giới tình'),
            'created_date' => Yii::t('app', 'thời gian tao'),
            'list_color' => Yii::t('app', 'Màu sắc'),
            'status' => Yii::t('app', 'Trạng thái'),
            'id_type' => Yii::t('app', 'Loại'),
        ];
    }
    
    public function getRender()
    {
        return $arrayName = array('0'=>'Nữ',
                                    '1'=>'Nam',);
    }

    public function getArrayStatus()
    {
        return $arayName = array('0'=>'Không bán',
                                    '1'=>'Mới',
                                    '2'=>'Bình thường');
    }
    
    public function formatSave(){
        $format = "Y-m-d h:m:s";
        $this->created_date = date($format);
    }
}
