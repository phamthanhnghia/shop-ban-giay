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

    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../.."><strong>ST's</strong> Shop</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                
                <ul class="nav navbar-nav navbar-right">
                    <?php if(isset($_SESSION['ID_USER'])): ?> 

                    <li>
                        <a href="index.php/site/login" class="dropdown-toggle" data-toggle="dropdown">
                            <?php
                            $users = User::findUsersById($_SESSION['ID_USER']);
                            echo $users->name;
                            ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="../site/logout-user" align="center"><strong>Sign out </strong></a></li>
                            <li><a href="" align="center"><strong>Contact </strong></a></li>
                        </ul>
                    </li>


                    
                <?php else: ?>
                    <li><a href="#">Track Order</a></li>
                    
                    <li>
                        <a href="../../site/login" >Login <b class="caret"></b></a>
                        
                    </li>
                    <li><a href="../site/register">Sign up</a></li>
                <?php endif; ?>





                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Infomation <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><strong>Call: </strong>+09-456-567-890</a></li>
                            <li><a href="#"><strong>Mail: </strong>info@yourdomain.com</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><strong>Address: </strong>
                                <div>
                                    234, New york Street,<br />
                                    Just Location, USA
                                </div>
                            </a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" placeholder="Enter Keyword Here ..." class="form-control">
                    </div>
                    &nbsp; 
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <?= $content ?>
                            
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
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>