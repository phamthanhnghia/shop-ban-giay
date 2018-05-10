<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\DiscountProduct;
use app\models\Product;
/* @var $this yii\web\View */
/* @var $searchModel app\controllers\DiscountProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Giảm giá sản phẩm';
$this->params['breadcrumbs'][] = $this->title;

$discount = new DiscountProduct();

?>
<div class="discount-product-index">



    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tạo giảm giá', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'info',
            'discount',
            
            //'id_product',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
