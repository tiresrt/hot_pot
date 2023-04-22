<?php
include 'inc/header.php';
?>
<?php
if(!isset($_GET['monid']) || $_GET['monid']==NULL){
    echo "<script>window.location = '404.php'</script>";
}else{
    $id= $_GET['monid'];
}



if($_SERVER['REQUEST_METHOD']=='POST'){
    $id_mon = $_POST['id_mon'];
	$soluong= $_POST['soluong'];
    $addcart = $ct->insert_cart($id,$soluong);
    
    header('location:cartt.php');

}
 
?>




<section class="detail-section">
    <div class="container-detail">
        <div class="row-detail">
            <?php
					$get_detail= $mon->get_detail($id);
					if($get_detail){
						while($result_detail= $get_detail->fetch_assoc()){

					
				?>
				
            <div class="col-detail mb-48">
				
			<form action="" method="POST" >
                <a href="images/menu-2.jpg" class="image-popup"><img
                        src="assets/img/food/<?php echo $result_detail['images'] ?>" class="img-fluid"
                        alt="Colorlib Template"></a>
            </div>
            <div class="col-detail pd-l-2">
                <h2><?php echo $result_detail['name_mon'] ?></h2>
                <h4>Loại món: <?php echo $result_detail['name_loai'] ; ?> </h4>
                <p class="price"><span><?php echo $fm->formatMoney($result_detail['gia_mon']) ?> VNĐ</span></p>

                <p>
                    <?php echo $result_detail['ghichu_mon'] ?>
                </p>
                <div class="row-detail mt-2">
                    <div class="col-md-6">
                        <div class="form-group d-flex">

                        </div>
					</div>
			
                    <div class="w-100"></div>
                    <div class="input-group col-md-6 d-flex mb-2">
							<div>
                            <input type="hidden" name="id_mon"  value="<?php echo $result_detail['id_mon'] ?>" >

                            <input type="Number" name="soluong" class="form-control-1 input-number" value="1" min="1"
								max="20">
							</div>
                            <input type="submit" name=submit value="Add to cart" class="btn btn-primary pd-3xy">
                        </form>
                    </div>
                </div>
				<?php
			  	}

			}
			?>

        
            </div>
        </div>
    </div>
</section>

<?php
include 'inc/footer.php';
?>