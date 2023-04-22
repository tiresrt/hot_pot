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
   header('location: hopdong.php');
  }


?> 

        <div class="container-book pd-6">
            <div class="pd-tb-book pd-tb-6">
                    <div class="heading-section-book">
                        <span class="subheading-book">
                            Đặt Bàn
                        </span>
                    </div>
                    <form action="" method="post" >
                        <div class="row-book">
                            <div class="form-text col-flex pd-rf-6">
	                            <div class="form-col mb-2">
	                                <label for="">Họ và tên</label>
	                                <input type="text" class="form-control pd-form" value= "<?php echo session::get('name') ?>" >
	                            </div>
	                        </div>
	            
	                        <div class="form-text col-flex pd-rf-6">
	                            <div class="form-col mb-2">
	                                <label for="">Số điện thoại</label>
	                                <input type="text" class="form-control pd-form" value= "<?php echo session::get('sdt') ?>">
	                            </div>
	                        </div>
	                        <div class="form-text col-flex pd-rf-6">
	                            <div class="form-col mb-2">
	                                <label for="">Ngày</label>
	                                <input type="text" name="datebook" class="form-control pd-form" id=book_date  placeholder="Date">
	                            </div>
	                        </div>
	                        <div class="form-text col-flex pd-rf-6">
	                            <div class="form-col mb-2">
	                                <label for="">Thời gian</label>
	                                <input type="time" name="timebook" class="form-control pd-form"   placeholder="Time">
	                            </div>
	                        </div>
                            
				
	                        <div class="col-md-12">
	                            <div class="form-col">
	                                <input type="submit" value="Đặt chỗ" class="btn btn-primary">	
	                            </div>
	                        </div>
                        </div>          
                    </form>
            </div>
        </div>









       
<?php
  include 'inc/footer.php';
?>