<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel app\controllers\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [ 
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            [
            'attribute' => 'dob',
            'value' => function($model){
                            return $model->getDob($model->dob);
                        },
            'filter' => DatePicker::widget(['language' => 'ru' , 'dateFormat' => 'dd-MM-yyyy']),
            'format' => 'raw',
            ],
            'phone',
            'address',
            'email',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
