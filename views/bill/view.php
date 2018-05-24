<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;
use app\models\Product;
use app\models\Bill;
use app\models\BillDetail;


/* @var $this yii\web\View */
/* @var $model app\models\Bill */

$this->title = $model->bill_code;
$this->params['breadcrumbs'][] = ['label' => 'Bills', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bill-view">

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
            //'id',
            //'total_price',
            [
                'label' => 'Tổng tiền',
                'type' =>'html',
                'value' =>  number_format($model->total_price)  ." VNĐ"
            ],
            'bill_code',
            //'status',
            [
                'label' => 'Trạng thái',
                'type' =>'html',
                'value' =>  $model->showNameStatus($model->status)
            ],
            'created_date',
            //'id_user',
            [
                'label' => 'Khách hàng',
                'type' =>'html',
                'value' =>  User::findUsersById($model->id_user)->name
            ],
        ],
    ]) ?>

    <?php


$product = new Product();
$id_bill = $_GET['id'];
$bill = Bill::findOne(['id' => $id_bill]);
$list_detail = BillDetail::find()->where(['id_bill' => $id_bill])->all();
?>

<div class="container">
    <div class="row">
        <h4>Chi tiết hoá đơn : <b><?php echo $bill->bill_code; ?></b></h4>
        <hr style="height:1px;border:none;color:#333;background-color:#333;">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th class="text-center">Giá</th>
                        <th> </th>
                        <th class="text-center">Tiền</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($list_detail as $key => $value) {
                        $product = Product::findOne(['id' => $value->id_product]);
                        ?>
                        <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="../../images/product-images/<?php echo $product->showImage($value->id_product) ?> " style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#"><?php echo $product->name; ?></a></h4>
                                <h5 class="media-heading"> Size <a href="#"><?php echo $value->size_product; ?></a></h5>
                                <span>Khuyến mãi: </span>
                                <span class="text-success">
                                    <strong>
                                        <?php echo $product->getDiscountProductsDiscount() . "%"; ?>
                                    </strong>
                                    <?php echo $product->getDiscountProductsInfo(); ?>
                                </span>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <strong><?php echo $value->amount; ?></strong>
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?= number_format($product->price) ?> VNĐ</strong></td>
                        <td class="col-sm-1 col-md-1">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?= number_format($value->sum_price) ?> VNĐ</strong></td>
                        
                    </tr>

                        <?php

                    }
                    ?>
                    
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Tổng tiền</h3></td>
                        <td class="text-right"><h3><strong><?= number_format($bill->total_price) ?> VNĐ</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                            <?php
                                if($bill->status == 1){
                                    ?>
                                    <a href="<?php  //echo Yii::$app->urlManager->createUrl("main/remove-bill/?id=" .$id_bill); ?>">
                                        <button type="button" class="btn btn-primary">
                                                Tiếp nhận xử lý đơn hàng
                                        </button>
                                    </a>
                                        
                                    <?php
                                }

                            ?>
                            <?php
                                if($bill->status == 0){
                                    ?>
                                    <a href="<?php  //echo Yii::$app->urlManager->createUrl("main/hide-bill/?id=" .$id_bill); ?>">
                                        <button type="button" class="btn btn-primary">
                                                Xác nhận hoàn thành đơn hàng
                                        </button>
                                    </a>
                                        
                                    <?php
                                }

                            ?>
                        </td>
                        <td>
                           
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
    </div>
</div>

</div>
