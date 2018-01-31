<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Type;

/* @var $this yii\web\View */
/* @var $model app\models\Type */
/* @var $form yii\widgets\ActiveForm */
$type = new Type();
// $a = $type->getAllType();
// $aType = $type->FormatArrayType();

// // foreach ($a as $key => $value) {
// // 	echo $value['name'] . '<br/>';
// // 	echo $value['size_form'] . '<br/>';
// // 	echo $value['size_to'] . '<br/>';

// //  }
// // echo "<hr>"; 


// //foreach ($idType as $value) 

// 	echo $idType->name . '<br/>' ;
// 	echo $idType->size_form . '<br/>';
// 	echo $idType->size_to . '<br/>';

	// echo $value['name'] . '<br/>';
	// echo $value['size_form'] . '<br/>';
	// echo $value['size_to'] . '<br/>';

 //}
// die;
// echo "<pre>";
//             print_r($type->getIdType());
//             echo "</pre>";
//             die;

?>

<div class="type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php  echo $form->field($model, 'size_form')->dropDownList($type->getArraySize()); ?>

    <?php echo $form->field($model, 'size_to')->dropDownList($type->getArraySize()); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
