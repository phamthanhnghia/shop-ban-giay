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

    <?= $form->field($model, 'price')->textInput() ?>

    <?php echo $form->field($model, 'gender')->radioList($product->getRender()); ?>

    <?= $form->field($model, 'list_color')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'status')->dropDownList($product->getArrayStatus()); ?>

    <?php echo $form->field($model, 'id_type')->dropDownList($type->FormatArrayType()); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
