<?php
include 'inc/header.php';
// if($_SERVER['REQUEST_METHOD']==='POST'){
 
//   $ten = $_POST['ten'];
//   $sdt1=$_POST['sdt1'];
//   $sex=$_POST['gioitinh'];
//   $pass1= md5($_POST['pass1']);
//   $repass=md5($_POST['repass']);
//   $result = $us->insert_user($ten,$sdt1,$sex,$pass1,$repass);
 
// }
if(!isset($_GET['id']) || $_GET['id']==NULL){
    echo "<script>window.location = '404.php'</script>";
}else{
    $id= $_GET['id'];
}
if($_SERVER['REQUEST_METHOD']==='POST'){
 
    $ten = $_POST['ten'];
    $sdt1=$_POST['sdt1'];
    $sex=$_POST['gioitinh'];

    $result = $us->update_user($ten,$sdt1,$sex,$id);
   
  }
?>

<style>
label {
    color: black;

    font-weight: bold;
}
</style>


<div class="user-section">
    <div class="container-user">
        <div class="row-user">
            <div class="col-msd-4-1 col-msd-4-2 col-msd-4-3 pd-5s">
                <h2 class="title-per">Thông tin cá nhân</h2>
                <?php 
				    if(isset($result))
				        {
				    	echo $result ;
				        }
			    ?> 
                    <?php

                        $usershow = $us->show_thongtin($id);
                        if($usershow){
                        while($user = $usershow->fetch_assoc()){

      
                     ?>

                <form class="login-form" action="" method="post">
                    <div class="form-text">
                        <div class="form-col">
                            <label>Họ và Tên</label>
                            <input type="text" class="infor-ip" value="<?php echo $user['ten']?>" required name="ten">
                        </div>
                    </div>
                    <div class="form-text">
                        <div class="form-col ">
                            <label class="text-uppercase">Số điện thoại</label>
                            <input type="text" class="infor-ip" pattern="[0]{1}[0-9]{9}" name=sdt1 value="<?php echo $user['sodienthoai'] ?>">
                        </div>
                    </div>
                    <div class="form-text">
                        <div class="form-col">
                            <label>Giới tính</label>
                            <div class="form-row">
                                <div class="box-gender pd-r-2">
                                    <label class="male-box solid-1 gender-same">
                                        <span>Male</span>
                                        <input <?php if( ($user['gioitinh'])==1){
                                                echo "checked";
                                            }
                                             ?>  type="radio" name="gioitinh" value="1">
                                    </label>
                                </div>
                                <div class="box-gender pd-l-2">
                                    <label class="female-box solid-1 gender-same">
                                        <span>Female</span>
                                        <input  type="radio" <?php if( ($user['gioitinh'])==0){
                                                echo "checked";

                                            }
                                             ?> name="gioitinh" value="0">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                            <?php
                               }
                            }
                            ?>

                    <div class="form-check">
                         
                            <input type="submit" value=" Cập nhật " class="btn btn-primary pd-3xy">
                            <hr>
                            <button class="btn-cp pd-3xy"><a class="textdecor" href="pass.php?id=<?php echo session::get('id') ?>">Đổi mật khẩu</a></button>
                    </div>
                </form>
            </div>






            <div class="col-msd-6-1 col-msd-6-2 col-msd-4-3">
                <div class="pd-md-5s">
                    <h2 class="title-per">Danh sách hóa đơn</h2>
                    <div class="cart-list-user">
                    <table class="table">

                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>STT </th>
                                <th>ID </th>
                                <th>Ngày đặt</th>
                                <th>Tổng</th>
                                <th>Trạng thái</th>
                 
                            </tr>
                        </thead>
             
                    <?php
                        $show = $ct->show_thongtin($id);
                        if($show){
                        $i=0;
                        while($result = $show->fetch_assoc()){
                        $i++;
                    ?>

                        <tbody>
                            <tr class="text-center">
                                <td class="product-name">	<h3><?php echo $i ?></h3></td>

                 
                                <td class="product-name">
                     <a href="hopdong.php"><?php echo $result['sesis'] ?></a>
                                </td>
                 
                                <td class="price"><?php echo $result['dates']?></td>
                 
                                <td class="total">
                    <?php
                     
                        echo $fm->formatMoney($result['Sum(thanhtien)'])."VNĐ";
                     
                 
                    ?>
                                </td>
                                <td class="price"><?php  if($result['tinhtrang']==0){
                         echo "Chờ";
                        }elseif($result['tinhtrang']==1){
                        echo "Xong";
                        }
                    ?>  </td>
                            </tr><!-- END TR-->
                        </tbody>
                    <?php		
                     
                        }
                        }
                    ?>
                    </table>

                    </div>       
                </div>
            </div>
        </div>
    </div>
</div>







<?php
  include 'inc/footer.php';
  ?>