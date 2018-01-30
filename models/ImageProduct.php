<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "image_product".
 *
 * @property int $id
 * @property string $link
 * @property int $id_product
 *
 * @property Product $product
 */
class ImageProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['link', 'id_product'], 'required'],
            [['id_product'], 'integer'],
            [['link'], 'string', 'max' => 300],
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
            'link' => 'Link',
            'id_product' => 'Id Product',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'id_product']);
    }
}
