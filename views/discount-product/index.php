<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\DiscountProduct;
/* @var $this yii\web\View */
/* @var $searchModel app\controllers\DiscountProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Discount Products';
$this->params['breadcrumbs'][] = $this->title;

$discount = new DiscountProduct();
$Astatus = $discount->getArrayStatus();
// echo "<pre>";
//             print_r($Astatus[1]);
//             echo "</pre>";
//             die;
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
            [
                'label' => 'Loại',
                'value' => function($model){
                    $discount = new DiscountProduct();
                    $Atype = $discount->getArrayType();
                    return $Atype[$model->type];
                }
            ],
            'discount',
            [ 
                'label' => 'Trạng thái',
                'value' => function ($model) {
                    $discount = new DiscountProduct();
                    $Astatus = $discount->getArrayStatus();
                    return $Astatus[$model->status];
                }
            ],
            //'id_product',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
