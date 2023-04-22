<?php
include 'inc/header.php';



?>
<?php
if(isset($_GET['idorder']) && $_GET['idorder']=='order'){
	$userid= session::get('id');

}
if($_SERVER['REQUEST_METHOD']==='POST'){
 
	$time = $_POST['timebook'];
	$date=$_POST['datebook'];
	$khach=$_POST['khach'];
	$noidung=$_POST['noidung'];
	$insert_order = $ct->insert_order($userid,$time,$date,$khach,$noidung);
   $del_cart = $ct->del_all_cart();
   header('location: success.php');
  }


?>

    
    
    
		
		<section class="success-section">
			<div class="container-success">
				<div class="row-success">
                <h1><img height="300" width="300" src="/assets/img/sucess.png"> </h1>
                <div>
                <br>
                <br>
                <br>
                <br>
                <h2> Cảm ơn bạn đã đặt bàn, chúng tôi sẽ liên lạc với bạn nếu có vấn đề gì xảy ra.</h2>
                <hr>
                <br>
                <h3> Hẹn gặp lại bạn tại Hot Pot ICT </h3>
                <hr>  

             </div>
			</div>
		</section>
		<?php
  include 'inc/footer.php';
  ?>