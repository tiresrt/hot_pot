<?php
include 'inc/header.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $sdt = $_POST['sdt'];
    $pass = md5($_POST['pass']); 
  
    // $result = $us->insert_user($ten,$sdt1,$sex,$pass1);
    $login_check = $us->login_user($sdt,$pass) ;
  }
?>
        

<div class="login-section no-pdt no-pdb">
    <div class="container-login pd-rf-6  pd-tb-6 mg-rf-8">
        <div class="login-flex">
            <div class="login-row pd-6">
                <h2 class="title-login mb-48">
                    Đăng nhập
                </h2>
                <span  > <?php 
				    if(isset($login_check))
				        {
				    	echo $login_check ;
				        }
			?></span>
                <form action="login.php" class="sign-form" method="post">
                    <div class="form-text">
                        <div class="form-col">
                            <input type="text" class="infor-ip" placeholder="Số điện thoại" required name="sdt">
                        </div>
                    </div>
                    <div class="form-text">
                        <div class="form-col ">
                            <input type="Password" class="infor-ip" placeholder="Mật khẩu" required name="pass">
                        </div>
                    </div>
                    <div class="form-check">
                        <input type="submit" value="Đăng nhập" class="btn-login pd-rf-6 pd-tb-6">
                    </div>
                    <div class="signup-link">
                        <a href="register.php">Đăng ký</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<?php
  include 'inc/footer.php';
?>