  <?php
use app\models\User;
use app\models\Bill;
$user = new User();
$user = $user->findUsersById($_SESSION['ID_USER']);
$aRole = $user->getArrayRole();
?>
  <div class="container">    
                  <div class="row">
                      <div class="panel panel-default">
                      <div class="panel-heading">  <h4 >Thông tin người dùng</h4></div>
                       <div class="panel-body">
                      <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                       <img alt="User Pic" src="<?php echo Yii::$app->homeUrl.'nobody_m.original.jpg'?>" id="profile-image1" class="img-circle img-responsive"> 
                     
                 
                      </div>
                      <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
                          <div class="container" >
                            <h2><?= $user->name ?></h2>
                            <p>vai trò   <b><?= $aRole[$user->role]?></b></p>
                          
                           
                          </div>
                           <hr>
                          <ul class="container details" >
                            <li><p><span class="glyphicon glyphicon-user one" style="width:50px;"></span><?= $user->address ?></p></li>
                            <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span><?= $user->email ?></p></li>
                            <li><p><span class="glyphicon glyphicon-phone-alt one" style="width:50px;"></span><?= $user->phone ?></p></li>
                          </ul>
                          <hr>
                          <div class="col-sm-5 col-xs-6 tital " >Ngày sinh :<?= $user->dob ?></div>
                          <div class="form-group">
                          	<br><br>
							  <div class="col-md-8">
							  	<a href="">
							    	<button id="button1id" name="button1id" class="btn btn-default">Cập nhật thông tin</button>
							    	
							    </a>
							    <a href="<?php  echo Yii::$app->urlManager->createUrl("main/basket");?>">
							    	<button id="button2id" name="button2id" class="btn btn-primary">Giỏ hàng</button>
							    </a>
							    <a href="<?php  echo Yii::$app->urlManager->createUrl("main/bill");?>">
							    	<button id="button1id" name="button1id" class="btn btn-success">Hoá đơn</button>
							    	
							    </a>
							    
							  </div>
							</div>
                      </div>
                </div>
            </div>
            </div>