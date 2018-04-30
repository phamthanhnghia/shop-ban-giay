<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\controllers\DiscountProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Discount Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discount-product-index">



    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Discount Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'info',
            'type',
            'discount',
            'status',
            //'created_date',
            //'id_product',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
