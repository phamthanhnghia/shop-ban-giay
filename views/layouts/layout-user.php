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

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?= Html::csrfMetaTags() ?>
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

    <?= $content ?>
                            
    <!-- /.col -->
    <div class="col-md-12 end-box " style="position: fixed;
                       left: 0;
                       bottom: 0;
                       width: 100%;
                       color: white;
                       text-align: center;">
       
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
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>