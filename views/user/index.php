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
                'label' => 'DATE',
                'filter'=> DatePicker::widget([
                'attribute' => 'dob',
                'model' => $searchModel,
                'clientOptions' => [
                     'autoclose' => false,
                    'format' => 'yyyy-mm-dd'
                   ],
                ]),
            ],
            'phone',
            'address',
            'email',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
