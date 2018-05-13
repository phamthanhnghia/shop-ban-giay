 
 <?php 
use app\models\Product;
use yii\widgets\LinkPager;
   $product = new Product();
 ?>
 <div class="row">
        <div class="btn-group alg-right-pad">
            <button type="button" class="btn btn-default"><strong>1235  </strong>items</button>
            <div class="btn-group">
                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                    Sort Products &nbsp;
			<span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">By Price Low</a></li>
                    <li class="divider"></li>
                    <li><a href="#">By Price High</a></li>
                    <li class="divider"></li>
                    <li><a href="#">By Popularity</a></li>
                    <li class="divider"></li>
                    <li><a href="#">By Reviews</a></li>
                </ul>
            </div>
        </div>
    </div>
<div class="row">
	 <?php foreach ($listProduct as $key): ?> 
	                    
	    <div class="col-md-4 text-center col-sm-6 col-xs-6">
	        <div class="thumbnail product-box">
	            <img style= " height: auto; 
	width: auto; 
	max-width: 200px; 
	max-height: 200px;" src="../../images/product-images/<?php echo $product->showImage($key->id)?> ">
	            <div class="caption">
                    <small><?= $key->code ?></small>
	                <h3><a href="#"><?= $key->name ?> </a></h3>
	                <p>Giá : <strong><?= number_format($key->price) ?> VNĐ</strong>  </p>
	                <p><button onclick="addToBasket(<?= $key->id ?>)" class="btn btn-success" >Thêm vào giỏ </button> <a href="<?php echo Yii::$app->request->baseUrl.'/main/detail?id='. $key->id ; ?>" class="btn btn-primary" role="button">Xem chi tiết</a></p>
	            </div>
	        </div>
	    </div>
	<?php endforeach; ?>
</div>
<!-- /.row -->
<?php
echo LinkPager::widget([
    'pagination' => $pages,
]);
?>
<style type="text/css">
    [data-notify="progressbar"] {
        margin-bottom: 0px;
        position: absolute;
        bottom: 0px;
        left: 0px;
        width: 100%;
        height: 5px;
    }

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo Yii::$app->homeUrl.'bootstrap-growl/jquery.bootstrap-growl.js'?>"></script>
<script type="text/javascript">
    //$("button").click(function(){
        // $.ajax({
        //        url: '<?php echo Yii::$app->request->baseUrl. '/product/test' ?>',
        //        type: 'post',
        //        data: {
                         
        //                  _csrf : '<?=Yii::$app->request->getCsrfToken()?>',
        //                  id : "sđfsd"
        //              },
        //        success: function (data) {
        //           // console.log(data.code);
        //            console.log(data);
        //           // console.log("ok");
        //            //alert(data);
        //        }
        //   });
            

    //    });
    function addToBasket(id) {
        // console.log(id);
        $.ajax({
               url: '<?php echo Yii::$app->request->baseUrl. '/product/add-basket' ?>',
               type: 'post',
               data: {
                         _csrf : '<?=Yii::$app->request->getCsrfToken()?>',
                         id : id
                     },
               success: function (data) {
                   //console.log(data);
                   alert("Thêm sản phẩm vào giỏ hàng thành công !");
 
               }
                });
        }
    
    
</script>