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
class Number extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    const access = 'access';
    public static function tableName()
    {
        return 'number';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['id','name','value'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'name' => 'Name',
            'value' => 'giá trị',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    
    public function increaseAccess(){

    	$model = Number::find()->where(['name'=> Number::access])->one();
    	if($model){
    		$number =  $model->value;
    		$model->value = $number + 1;
    		$model->update();
    	}
    	
    }
    public function getValueAccess(){
    	$model = Number::find()->where(['name'=> Number::access])->one();
    	if($model){
    		return $model->value;
    	}
    	return '';
    }

    

    
}
