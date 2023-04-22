<?php
include 'inc/header.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
 
    $ten = $_POST['ten'];
    $sdt1=$_POST['sdt1'];
    $sex=$_POST['gioitinh'];
    $pass1= md5($_POST['pass1']);
    $repass=md5($_POST['repass']);
    $result = $us->insert_user($ten,$sdt1,$sex,$pass1,$repass);
    
   
  }
?>

<style>
    label{
        color: black;
        font-weight: bold;
    }


</style>


<div class="signup-section no-pdt no-pdb">
    <div class="container-signup pd-rf-6  pd-tb-6 mg-rf-auto">
        <div class="register-flex">
            <div class="register-row pd-6">
                <h2 class="title-register mb-48">
                    Đăng ký
                </h2>
                <span  > <?php 
				    if(isset($result))
				        {
				    	echo $result ;
				        }
			?></span>
                <form action="register.php" class="sign-form" method="post">
                    <div class="form-text">
                        <div class="form-col">
                            <label>Họ và Tên</label>
                            <input type="text" class="infor-ip" placeholder="Nguyen Hoa" required name="ten">
                        </div>
                    </div>
                    <div class="form-text">
                        <div class="form-col ">
                            <label>Địa chỉ</label>
                            <input type="text" class="infor-ip" placeholder="Nhà số 10 - Đoàn Kết - Phổ Yên" required name="diachi">
                        </div>
                    </div>
                    <div class="form-text">
                        <div class="form-col">
                            <label>Số điện thoại</label>
                            <input type="text" class="infor-ip" placeholder="0972842XXX" pattern="[0]{1}[0-9]{9}" required name="sdt1">
                        </div>
                    </div>
                    <div class="form-text">
                        <div class="form-col">
                            <label>Giới tính</label>
                            <div class="form-row">
                                <div class="box-gender pd-r-2">
                                    <label class="male-box solid-1 gender-same">
                                        <span>Male</span>
                                        <input  type="radio" name="gioitinh" value="1">
                                    </label>
                                </div>
                                <div class="box-gender pd-l-2">
                                    <label class="female-box solid-1 gender-same">
                                        <span>Female</span>
                                        <input  type="radio" name="gioitinh" value="0">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-text">
                        <div class="form-col">
                            <label class="password-signup">Mật khẩu</label>
                            <input type="password" class="infor-ip" placeholder="**************" required name="pass1">
                        </div>
                    </div>
                    <div class="form-text">
                        <div class="form-col">
                        <label class="password-signup">Nhập lại mật khẩu</label>
                            <input type="password" class="infor-ip" placeholder="**************" required name="repass">
                        </div>
                    </div>
                    <div class="form-check">
                        <input type="submit" value="Register" class="btn-register pd-rf-6 pd-tb-6">
                    </div>
                </form>
            </div>
        </div>
    </div>  
</div>







<?php
include 'inc/footer.php';
?>