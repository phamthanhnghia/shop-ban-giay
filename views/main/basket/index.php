<?php 
use app\models\User;
use app\models\Product;
$product = new Product();
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Tổng tiền</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">Product name</a></h4>
                                <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="email" class="form-control" id="exampleInputEmail1" value="3">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>$4.87</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>$14.61</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Xoá sản phẩm
                        </button></td>
                    </tr> -->
                   <?php $product->showProductOnBasket(); ?>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong id="tienTong">$24.59</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong id="tienKhuyenMai">$6.94</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Thành tiền</h3></td>
                        <td class="text-right"><h3><strong id="tongThanhTien">$31.53</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Tiếp tục mua sắp
                        </button></td>
                        <td>
                        <button type="button" class="btn btn-success">
                            Thanh toán <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	function removeTr(id){
		var select = '#'+id+'tr';
		$(select).remove();
		$.ajax({
               url: '<?php echo Yii::$app->request->baseUrl. '/product/remove-id-basket' ?>',
               type: 'post',
               data: {
                         _csrf : '<?=Yii::$app->request->getCsrfToken()?>',
                         id : id
                     },
               success: function (data) {
                   console.log(data);
                   //alert("Thêm sản phẩm vào giỏ hàng thành công !");
 
               }
            });
    }

    function changeNumber(number,id, price){
    	console.log(number);
    	console.log(id);
    	console.log(price);
    	var select = id+'thanhtien';
    	thanhtien = number*price;
    	document.getElementById(select).innerHTML = thanhtien;
    	console.log(thanhtien);
    	console.log(select);
    }
</script>