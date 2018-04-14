<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Product;
use app\models\Type;
/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
$product = new Product();
$type = new Type();
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php  echo $form->field($model, 'price')->textInput(); ?>

    <?php echo $form->field($model, 'gender')->radioList($product->getRender()); ?>

    <?= $form->field($model, 'list_color')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'status')->dropDownList($product->getArrayStatus()); ?>

    <?php echo $form->field($model, 'id_type')->dropDownList($type->FormatArrayType()); ?>

    <hr style="height:1px;border:none;color:#333;background-color:#333;" />

    <div class="form-group" id="them">
        <p><label>Hình ảnh &nbsp; &nbsp; </label><button type="button" onclick="addButton()" class="btn btn-primary">Thêm</button></p>
        <div class="btn-group">
            <input type="file"  name="Image[1]" class="btn btn-default" id="exampleInputFile">
            
            <button type="button" onclick="deleteButton()" class="btn btn-danger">Xoá</button>
        </div>
    </div>


    <hr style="height:1px;border:none;color:#333;background-color:#333;" />
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">
    function addButton(){
        console.log("ok");
        var html = "";
        html += "<div class=\"btn-group add1\">";
        html += "<input type=\"file\"  name=\"Image[1]\" class=\"btn btn-default\" id=\"exampleInputFile\">";
        html += "<button type=\"button\" onclick=\"deleteButton()\" class=\"btn btn-danger\">Xoá</button>";
        html += "</div>";
        $("#them").append(html);
    }

    function deleteButton(){
        console.log("ok");
        $(".add1").remove();
    }

</script>