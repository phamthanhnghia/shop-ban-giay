<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BillDetail */

$this->title = 'Update Bill Detail: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Bill Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bill-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
