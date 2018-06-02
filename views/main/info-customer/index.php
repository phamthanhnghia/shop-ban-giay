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
							  	<a href="<?php  //echo Yii::$app->urlManager->createUrl("user/update?id=".$user->id);?>">
							    	
							    	
							    </a>
                  <button id="button1id" name="button1id" class="btn btn-default" data-toggle="modal" data-target="#myModal" >Cập nhật thông tin</button>
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



            <!-- Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>

          <div class="form-group">
                        <input type="text" class="form-control" id="username" value="<?= $user->username ?>" placeholder="User Name" >
                        </div>
                        <div class="form-group">
                            <input type="password"  class="form-control" id="password" value="<?= $user->password ?>" placeholder="Password" >
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text"  class="form-control" id="name" value="<?= $user->name ?>" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text"  class="form-control" id="email" value="<?= $user->email ?>" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text"  class="form-control" id="address" value="<?= $user->address ?>" placeholder="Địa chỉ">
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh</label>
                            <input type="date"  class="form-control" value="<?= $user->dob ?>" id="dob">
                        </div>
                        <div class="form-group">
                            <label>Điện thoại</label>
                            <input type="text"  class="form-control" value="<?= $user->phone ?>" id="phone">
                        </div>
                        <input type="text"  class="form-control" id="role" value="<?= $user->role ?>" hidden="true" style="display: none;">
                        <input type="text" class="form-control" id="status" value="1" hidden="1" style="display: none;">
                        
                        





        </div>
        
        <div class="modal-footer">
              <button type="submit" onclick="sendupdate()" class="btn btn-primary btn-flat m-b-30 m-t-30" data-dismiss="modal">Lưu</button>

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <script type="text/javascript">
    function sendupdate(){


      $.ajax({
               url: '<?php echo Yii::$app->request->baseUrl. '/user/ajax-update' ?>',
               type: 'post',
               data: {
                         _csrf : '<?=Yii::$app->request->getCsrfToken()?>',
                         username : $('#username').val(),
                         password : $('#password').val(),
                         name : $('#name').val(),
                         email : $('#email').val(),
                         address : $('#address').val(),
                         dob : $('#dob').val(),
                         phone : $('#phone').val(),
                         role : $('#role').val(),
                         status : $('#status').val(),
                         
                     },
               success: function (data) {
                   //console.log(data);
                   alert("Thông tin da duoc cap nhat");
 
               }
                });
    }



  </script>