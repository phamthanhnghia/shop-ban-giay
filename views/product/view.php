<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            'name',
            'price',
            'gender',
            'created_date',
            'list_color',
            'status',
            //'id_type',
        ],
    ]) ?>
    <hr style="height:1px;border:none;color:#333;background-color:#333;" />
    
    <?php 
        if(!empty($modelImage)){
            $Image = (array)$modelImage[0]->attributes;
            echo '<img width="200" height="200" src="../../images/product-images/'.$Image['link'].'">';
        }
    ?>

</div>
