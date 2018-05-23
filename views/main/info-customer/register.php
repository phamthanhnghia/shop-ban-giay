<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="login-form">
    
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
    ]); ?>
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                
                <label>&nbsp;</label>
                    <center><h4>Để lại thông tin khách hàng cho hoá đơn</h4></center>
                    <div class="row">
                    <div class="span6">
                        <div class="form-group">
                        <input type="text" id="users-username" class="form-control" name="Users[username]" placeholder="User Name" style="display: none;">
                        </div>
                        <div class="form-group">
                            <input type="password" id="users-username" class="form-control" name="Users[password]" placeholder="Password" style="display: none;">
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" id="users-username" class="form-control" name="Users[name]" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" id="users-username" class="form-control" name="Users[email]" placeholder="Email">
                        </div>
                     </div>
                     <div class="span6">
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" id="users-username" class="form-control" name="Users[address]" placeholder="Địa chỉ">
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh</label>
                            <input type="date" id="users-username" class="form-control" name="Users[dob]">
                        </div>
                        <div class="form-group">
                            <label>Điện thoại</label>
                            <input type="text" id="users-username" class="form-control" name="Users[phone]">
                        </div>
                        <input type="text" id="users-username" class="form-control" name="Users[role]" value="4" hidden="true" style="display: none;">
                        <input type="text" id="users-username" class="form-control" name="Users[status]" value="1" hidden="1" style="display: none;">
                        <input type="text" id="users-username" class="form-control" name="register" value="1" hidden="1" style="display: none;">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Đăng ký</button>
                        </div>
                    </div>
                </div>
                 
                <div class="register-link m-t-15 text-center">
                    <p>Có tài khoản ? <a href="login">Đăng nhập</a></p>
                </div>
            </div>
            <div class="col-md-4">.col-md-4</div>

            
        </div>  <!--- end row -->
        
    </div>

<?php ActiveForm::end(); ?>

</div>
