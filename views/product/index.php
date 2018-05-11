<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Type;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sản phẩm';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //id',
            'code',
            'name',
            [
                'label' => 'Giá',
                'value' => function($model){ 
                         return $model->price . " VNĐ";
                        },
            ],
            //'price',
            //'gender',
            
            //'created_date',
            //'list_color',
            // 'status',
            [
                'label' => 'Loại',
                'value' => function($model){ 
                        $type = new Type();
                         return $type->getIdType($model->id_type)->name;
                        },
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
