<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BillDetail */

$this->title = 'Create Bill Detail';
$this->params['breadcrumbs'][] = ['label' => 'Bill Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bill-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
