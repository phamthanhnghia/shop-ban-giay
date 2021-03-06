<?php

use app\models\Product;
use app\models\Type;

   $product = new Product();
$model = $model[0];
$type = new Type();
$type = $type->getIdType($model->id_type);
// echo "<pre>";
//             print_r($type);
//             echo "</pre>";
//             die;
$product = Product::findOne(['id' => $model->id]);
?>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="../../images/product-images/<?php echo $product->showImage($model->id)?> " /></div>
						  
						</div>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title"><?= $model->name ?></h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">Mã sản phẩm : <?= $model->code ?></span>
						</div>
						<p class="product-description"> Hunter dòng cơ bản có những thay đổi lớn về họa tiết trên upper (thân giày) giày và ứng dụng một trong những bộ đế bán chạy nhất vào năm 2017.</p>
						<h4 class="price">Giá hiện tại: <span><?= number_format($model->price) ." VNĐ" ?></span></h4>
						<p class="vote"><strong>Khuyến mãi</strong>  <?php echo $product->getDiscountProductsDiscount() . "%"; ?> <strong>(<?php echo $product->getDiscountProductsInfo(); ?>)</strong></p>
						<h5 class="sizes row"> 
                <div class="col-xs-2">
                sizes
                </div>
                <div class="col-xs-3">
  							  <select class="form-control" id="<?php echo $model->id."product"; ?>">
                    <?php for($i = $type->size_form;  $i <= $type->size_to ; $i++) { ?>
                    <option><?= $i?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-xs-7">
                </div>
						</h5>
						<h5 class="colors">
							
						</h5>
						<div class="action">
							<button class="add-to-cart btn btn-default" onclick="addToBasket(<?= $product->id ?>)" type="button">Đặt mua ngay</button>
							<button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  <hr>
<script type="text/javascript">
  function addToBasket(id) {
        var select = '#'+id+'product';
        size = $(select).val();
        //console.log($(select).val());
        $.ajax({
               url: '<?php echo Yii::$app->request->baseUrl. '/product/add-basket' ?>',
               type: 'post',
               data: {
                         _csrf : '<?=Yii::$app->request->getCsrfToken()?>',
                         id : id,
                         size :size
                     },
               success: function (data) {
                   //console.log(data);
                   alert("Thêm sản phẩm vào giỏ hàng thành công !");
 
               }
                });
    }

</script>  
<style type="text/css">
	
/*****************globals*************/
body {
  font-family: 'open sans';
  overflow-x: hidden; }

img {
  max-width: 100%; }

.preview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }
  @media screen and (max-width: 996px) {
    .preview {
      margin-bottom: 20px; } }

.preview-pic {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.preview-thumbnail.nav-tabs {
  border: none;
  margin-top: 15px; }
  .preview-thumbnail.nav-tabs li {
    width: 18%;
    margin-right: 2.5%; }
    .preview-thumbnail.nav-tabs li img {
      max-width: 100%;
      display: block; }
    .preview-thumbnail.nav-tabs li a {
      padding: 0;
      margin: 0; }
    .preview-thumbnail.nav-tabs li:last-of-type {
      margin-right: 0; }

.tab-content {
  overflow: hidden; }
  .tab-content img {
    width: 100%;
    -webkit-animation-name: opacity;
            animation-name: opacity;
    -webkit-animation-duration: .3s;
            animation-duration: .3s; }

.card {
  margin-top: 50px;
  background: #eee;
  padding: 3em;
  line-height: 1.5em; }

@media screen and (min-width: 997px) {
  .wrapper {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex; } }

.details {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }

.colors {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.product-title, .price, .sizes, .colors {
  text-transform: UPPERCASE;
  font-weight: bold; }

.checked, .price span {
  color: #ff9f1a; }

.product-title, .rating, .product-description, .price, .vote, .sizes {
  margin-bottom: 15px; }

.product-title {
  margin-top: 0; }

.size {
  margin-right: 10px; }
  .size:first-of-type {
    margin-left: 40px; }

.color {
  display: inline-block;
  vertical-align: middle;
  margin-right: 10px;
  height: 2em;
  width: 2em;
  border-radius: 2px; }
  .color:first-of-type {
    margin-left: 20px; }

.add-to-cart, .like {
  background: #ff9f1a;
  padding: 1.2em 1.5em;
  border: none;
  text-transform: UPPERCASE;
  font-weight: bold;
  color: #fff;
  -webkit-transition: background .3s ease;
          transition: background .3s ease; }
  .add-to-cart:hover, .like:hover {
    background: #b36800;
    color: #fff; }

.not-available {
  text-align: center;
  line-height: 2em; }
  .not-available:before {
    font-family: fontawesome;
    content: "\f00d";
    color: #fff; }

.orange {
  background: #ff9f1a; }

.green {
  background: #85ad00; }

.blue {
  background: #0076ad; }

.tooltip-inner {
  padding: 1.3em; }

@-webkit-keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

@keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

/*# sourceMappingURL=style.css.map */

</style>