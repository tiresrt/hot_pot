<?php
include 'inc/header.php';
if(!isset($_GET['id']) || $_GET['id']==NULL){
    echo "<script>window.location = '404.php'</script>";
}else{
    $id= $_GET['id'];
}
if($_SERVER['REQUEST_METHOD']==='POST'){
 
  $pass0= md5($_POST['pass0']);
  $pass1= md5($_POST['pass1']);
  $repass=md5($_POST['repass']);
  $result = $us->change_pass($id,$pass0,$pass1,$repass);
 
}


?>
<style>
  label{
    color: black;
    font-size: 20px;
    font-weight: bold;
  }
  </style>

<section class="chpass-section no-pdt no-pdb">
    <div class="container-chpass">
        <div class="d-flex no-gutters">
            <div class="col-msx-6">
                <h2 class="title-per">Đổi mật khẩu</h2>
                <span  > <?php 
				    if(isset($result))
				        {
				    	echo $result ;
				        }
			?></span>

                <form class="login-form" action="" method="post">
                    <div class="form-text">
                        <div class="form-col">
                            <label>Mật khẩu cũ</label>
                            <input type="password" name=pass0 class="infor-ip" placeholder="">
                        </div>
                    </div>
                    <div class="form-text">
                        <div class="form-col ">
                            <label>Mật khẩu mới</label>
                            <input type="password" name=pass1 class="infor-ip" placeholder="">
                        </div>
                    </div>
                    <div class="form-text">
                        <div class="form-col ">
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" name=repass class="infor-ip" placeholder="">
                        </div>
                    </div>

                    <?php
                 
                 ?> 


                    <div class="form-check">
                     <!-- <label class="form-check-label">
                     <input type="checkbox" class="form-check-input">
                     <small></small>
                 </label> -->

                      <input  type="submit" value="Đổi mật khẩu" class="btn btn-primary pd-3xy">
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>










<?php
  include 'inc/footer.php';
  ?>