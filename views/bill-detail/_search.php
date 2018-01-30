<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\controllers\BillDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bill-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'amount') ?>

    <?= $form->field($model, 'size_product') ?>

    <?= $form->field($model, 'sum_price') ?>

    <?= $form->field($model, 'code_color') ?>

    <?php // echo $form->field($model, 'id_product') ?>

    <?php // echo $form->field($model, 'id_bill') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
