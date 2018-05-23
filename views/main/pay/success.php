<?php 
use app\models\User;
//$user = new User();
$user = User::findUsersById($_SESSION['ID_USER']);
                            
?>
<div class="container">
	<div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3">
        <br><br> <h2 style="color:#0fad00">Thành công</h2>

        <h3>Chào, <?php echo $user->name; ?></h3>
        <p style="font-size:20px;color:#5C5C5C;">Cám ơn bạn đã mua hàng của chúng tôi, chúng tôi đã gửi thông tin hoá đơn đến email "<?php echo $user->email ; ?>". Đến email để xem thông tin hoá đơn.</p>
        <a href="" class="btn btn-success">     Kiểm tra hoá đơn      </a>
    <br><br>
        </div>
        
	</div>
</div>