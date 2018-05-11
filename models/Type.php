<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type".
 *
 * @property int $id
 * @property string $name
 * @property int $size_form
 * @property int $size_to
 *
 * @property Product[] $products
 */
class Type extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type';
    }

    public function getAllType()
    {
        return Type::find()->all();
    }

    public function getIdType($id)
    {
        return Type::find()->where(['id'=>$id])->one();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['size_form', 'size_to'], 'integer'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'size_form' => 'Size Form',
            'size_to' => 'Size To',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id_type' => 'id']);
    }

    public function getArraySize()
    {
        return $arrayName = array(  '29' =>'29' ,
                                    '30' =>'30' ,
                                    '31' =>'31' ,
                                    '32' =>'32' ,
                                    '33' =>'33',
                                    '34' =>'34' ,
                                    '35' =>'35' ,
                                    '36' =>'36' ,
                                    '37' =>'37' ,
                                    '38' =>'38' ,
                                    '39' =>'39' ,
                                    '40' =>'40' ,
                                    '41' =>'41' ,
                                    '42' =>'42' ,
                                    '43' =>'43' ,
                                    '44' =>'44' ,
                                    '45' =>'45' ,);
    }

    public static function getArrayType()
    {
        return $query = Type::find()->all();
    }
    
    public function FormatArrayType(){
        $aType = Type::getArrayType();
        $result= array();
        //return $aType;
        foreach ($aType as $key => $value) {
            $result[$value->id ] =  $value->name;
        }
        return $result;
    }

    
}
