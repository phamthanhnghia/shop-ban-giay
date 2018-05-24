<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\BillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bills';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bill-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bill', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
             [
                'attribute' => 'total_price',
                //'label' => 'Trạng thái',
                'value' => function($model){ 
                            $str  = number_format($model->total_price)  ." VNĐ";
                            return $str;
                        },
            ],
            //'total_price',
            'bill_code',
            //'status',
            [
                'attribute' => 'status',
                //'label' => 'Trạng thái',
                'value' => function($model){ 
                         return $model->showNameStatus($model->status);
                        },
            ],

            'created_date',
            //'id_user',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
