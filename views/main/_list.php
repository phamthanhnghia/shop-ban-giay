 
 <?php 
use app\models\Product;
   $product = new Product();
 ?>
 <?php foreach ($listProduct as $key): ?> 
                    
    <div class="col-md-4 text-center col-sm-6 col-xs-6">
        <div class="thumbnail product-box">
            <img style= " height: auto; 
width: auto; 
max-width: 200px; 
max-height: 200px;" src="../../images/product-images/<?php echo $product->showImage($key->id)?> ">
            <div class="caption">
                <h3><a href="#"><?= $key->name ?> </a></h3>
                <p>Price : <strong><?= $key->price ?> Đ</strong>  </p>
                <p><a href="#" class="btn btn-success" role="button">Add To Cart</a> <a href="#" class="btn btn-primary" role="button">See Details</a></p>
            </div>
        </div>
    </div>
<?php endforeach; ?>