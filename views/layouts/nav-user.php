<?php 
use app\models\User;
use app\models\Product;

$product = new Product();
?>
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
                            <li><a href="<?php  echo Yii::$app->urlManager->createUrl("main/info-customer");?>" align="center"><strong>Thông tin </strong></a></li>
                            <li><a href="<?php  echo Yii::$app->urlManager->createUrl("main/bill");?>" align="center"><strong>Hoá đơn </strong></a></li>
                            <li><a href="<?php  echo Yii::$app->urlManager->createUrl("site/logout-user");?>" align="center"><strong>Đăng xuất </strong></a></li>
                            
                            
                        </ul>
                    </li>


                    
                <?php else: ?>
                    <li><a href="#">    </a></li>
                    
                    <li>
                        <a href="<?php  echo Yii::$app->urlManager->createUrl("site/login");?>" >Đăng nhập <b class="caret"></b></a>
                        
                    </li>
                    <li><a href="<?php  echo Yii::$app->urlManager->createUrl("site/register");?>">Đăng ký</a></li>
                <?php endif; ?>





                    <li >
                        <a href="<?php  echo Yii::$app->urlManager->createUrl("main/basket");?>" >Giỏ hàng </a>
                        
                    </li>
                </ul>
                
               <!--  <form autocomplete="off" class="navbar-form navbar-right" action="/action_page.php">
                  <div  class="form-group" class="autocomplete" style="width:300px;">
                    <input id="search" type="text" name="myCountry" placeholder="Country" class="form-control">
                  </div>
                  <input type="submit">
                </form> -->
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    



<!-- <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thông tin giỏ hàng của bạn</h4>
      </div>
      <div class="modal-body">
        <p id='basket'>
            
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> -->

<script type="text/javascript">
    

    var data = [];
    function getBasket(){
        data = JSON.parse(' <?php $product->getBasket(); ?>');
        var html = "";
        for (var i = 0; i < data.length; i++) {
            html = html + (data[i].id) +" : "+data[i].amount  + "<br>";
        }
        document.getElementById("basket").innerHTML = "";
        document.getElementById("basket").innerHTML = html;
        console.log(html);
        console.log(data);
        console.log(data.length);
    }
    /////////////////////////////////////////////////////////////////////////

   




</script>