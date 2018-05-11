<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Product;
use app\models\Type;
use app\models\ImageProduct;
use app\models\DiscountProduct;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
$product = new Product();
$type = new Type();
$discount = new DiscountProduct();
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php  echo $form->field($model, 'price')->textInput(); ?>
    
    <?php  echo $form->field($model, 'amount')->textInput(); ?>
    
    <?php echo $form->field($model, 'gender')->radioList($product->getRender()); ?>

    <?= $form->field($model, 'list_color')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'status')->dropDownList($product->getArrayStatus()); ?>

    <?php echo $form->field($model, 'id_type')->dropDownList($type->FormatArrayType()); ?>

    <?php echo $form->field($model, 'id_discount')->dropDownList($discount->getArrayDiscountProduct()); ?>

    <hr style="height:1px;border:none;color:#333;background-color:#333;" />

    <?php 

        // echo "<pre>";
        // print_r($modelImage);
        // print_r(in_array('0', $modelImage));
        // echo "</pre>";
        // die;
        if(!is_array($modelImage)){
            echo $form->field($modelImage, 'link')->fileInput(); 
        }else{
            $Image = (array)$modelImage[0]->attributes;
            echo '<img width="200" height="200" src="../../images/product-images/'.$Image['link'].'">';
            $modelImage = new ImageProduct();
            echo $form->field($modelImage, 'link')->fileInput(); 
        }
    ?>
    
    <!-- <div class="form-group" id="them">
        <p><label>Hình ảnh &nbsp; &nbsp; </label><button type="button" onclick="addButton()" class="btn btn-primary">Thêm</button></p>
        <div class="btn-group">
            <input type="file"  name="Product[link]" class="btn btn-default" id="exampleInputFile">
            
            <button type="button" onclick="deleteButton()" class="btn btn-danger">Xoá</button>
        </div>
    </div> -->


    <hr style="height:1px;border:none;color:#333;background-color:#333;" />
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">
    var list = new Array();
    var numB = 0; // number button
    list.push({add : 1});

    function addButton(){
        var html = "";
        numB++;
        html += "<div class=\"btn-group add1\" id=\"add"+numB+"\">";
        html += "<input type=\"file\"  name=\"Image["+numB+"]\" class=\"btn btn-default\" id=\"exampleInputFile\">";
        html += "<button type=\"button\" onclick=\"deleteButton("+numB+")\" class=\"btn btn-danger\">Xoá</button>";
        html += "</div>";
        $("#them").append(html);
    }

    function deleteButton(so){
        var idDelete = "add"+so;
        $("#"+idDelete).remove();
    }

</script>