<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;
use app\models\Number;
use app\models\Product;
use app\models\Type;



$number = new Number();
$product = new Product();
$type = new Type();
$number->increaseAccess();

AppAsset::register($this);
$user = new User();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Trang bán hàng trực tuyến của ST's Shop</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo Yii::$app->homeUrl.'assets-theme/css/bootstrap.css'?>" rel="stylesheet">
    <!-- Fontawesome core CSS -->
    <link href="<?php echo Yii::$app->homeUrl.'assets-theme/css/font-awesome.min.css' ?>" rel="stylesheet" />
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--Slide Show Css -->
    <link href="<?php echo Yii::$app->homeUrl.'assets-theme/ItemSlider/css/main-style.css'?>" rel="stylesheet" />
    <!-- custom CSS here -->
    <link href="<?php echo Yii::$app->homeUrl.'assets-theme/css/style.css'?>" rel="stylesheet" />
</head>
<body>

    <?php  include "nav-user.php";?>

    

    <div class="container">
        <?php User::CheckMessage();  ?>
        <div class="row">
            <div class="col-md-9">
                <div class="main box-border">
                    <div id="mi-slider" class="mi-slider">
                        <ul>

                            <?php $product->showProductHeaderByIdType('1'); ?>
                        </ul>
                        <ul>
                            <?php $product->showProductHeaderByIdType('5'); ?>
                        </ul>
                        <ul>
                            <?php $product->showProductHeaderByIdType('2'); ?>
                        </ul>
                        <ul>
                            <?php $product->showProductHeaderByIdType('3'); ?>
                        </ul>
                        <nav>
                            <a href="#"><?= $type->showNameById('1') ?></a>
                            <a href="#"><?= $type->showNameById('5') ?></a>
                            <a href="#"><?= $type->showNameById('2') ?></a>
                            <a href="#"><?= $type->showNameById('3') ?></a>
                        </nav>
                    </div>
                    
                </div>
                <br />
            </div>
            <!-- /.col -->
            
            <div class="col-md-3 text-center">
                <div class=" col-md-12 col-sm-6 col-xs-6" >
                    <div class="offer-text">
                        30% off here
                    </div>
                    <div class="thumbnail product-box">
                        <img src="assets-theme/img/dummyimg.png" alt="" />
                        <div class="caption">
                            <h3><a href="#">Samsung Galaxy </a></h3>
                            <p><a href="#">Ptional dismiss button </a></p>
                        </div>
                    </div>
                </div>
                <div class=" col-md-12 col-sm-6 col-xs-6">
                    <div class="offer-text2">
                        30% off here
                    </div>
                    <div class="thumbnail product-box">
                        <img src="assets-theme/img/dummyimg.png" alt="" />
                        <div class="caption">
                            <h3><a href="#">Samsung Galaxy </a></h3>
                            <p><a href="#">Ptional dismiss button </a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <!-- <div class="col-md-3">
            </div> -->
            <!-- /.col -->
            <div class="col-md-12">
                <div>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Electronics</li>
                    </ol>
                </div>
                <!-- /.div -->
                
                
                    <?= Alert::widget() ?>
                    <?= $content ?>

                    
                    
                
                
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
    <div class="col-md-12 download-app-box text-center">


    </div>

       <!--Footer -->
    <div class="col-md-12 footer-box">


        
        <div class="row">
            <div class="col-md-4">
                <strong>Send a Quick Query </strong>
                <hr>
                <form>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Email address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <textarea name="message" id="message" required="required" class="form-control" rows="3" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit Request</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <strong>Our Location</strong>
                <hr>
                <p>
                     234, New york Street,<br />
                                    Just Location, USA<br />
                    Call: +09-456-567-890<br>
                    Email: info@yourdomain.com<br>
                </p>

                2014 www.yourdomain.com | All Right Reserved
            </div>
            <div class="col-md-4 social-box">
                <strong>We are Social </strong>
                <hr>
                <a href="#"><i class="fa fa-facebook-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-twitter-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-google-plus-square fa-3x c"></i></a>
                <a href="#"><i class="fa fa-linkedin-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-pinterest-square fa-3x "></i></a>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nec nisl odio. Mauris vehicula at nunc id posuere. Curabitur nec nisl odio. Mauris vehicula at nunc id posuere. 
                </p>
            </div>
        </div>
        <hr>
    </div>
    <!-- /.col -->
    <div class="col-md-12 end-box ">
       
    </div>
    <!-- /.col -->
    <!--Footer end -->
    <!--Core JavaScript file  -->
    <script src="<?php echo Yii::$app->homeUrl.'assets-theme/js/jquery-1.10.2.js'?>"></script>
    <!--bootstrap JavaScript file  -->
    <script src="<?php echo Yii::$app->homeUrl.'assets-theme/js/bootstrap.js'?>"></script>
    <!--Slider JavaScript file  -->
    <script src="<?php echo Yii::$app->homeUrl.'assets-theme/ItemSlider/js/modernizr.custom.63321.js'?>"></script>
    <script src="<?php echo Yii::$app->homeUrl.'assets-theme/ItemSlider/js/jquery.catslider.js'?>"></script>
    <script>
        $(function () {

            $('#mi-slider').catslider();

        });
    </script>
</body>
</html>
