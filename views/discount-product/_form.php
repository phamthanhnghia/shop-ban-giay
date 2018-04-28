<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\DiscountProduct;
/* @var $this yii\web\View */
/* @var $model app\models\DiscountProduct */
/* @var $form yii\widgets\ActiveForm */
$discount = new DiscountProduct();
?>

<div class="discount-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'info')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList($discount->getArrayType()) ?>

    <?= $form->field($model, 'discount')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList($discount->getArrayStatus()) ?>

    <?= $form->field($model, 'id_product')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
