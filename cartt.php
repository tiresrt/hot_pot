<?php
include 'inc/header.php';

?>
<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $id_cart = $_POST['cartid'];
	$soluong= $_POST['soluong'];
	$updatecart = $ct->update_cart($soluong,$id_cart);
	header('location:cartt.php');

}
if(isset($_GET['delid'])){
	$id= $_GET['delid'];
	$delcart = $ct->del_loai($id);
	header('location:cartt.php');

}





?>


<section class="cart-section">
    <div class="container-cart">
        <div class="row-cart">
            <div class="col-cart">
                <div class="cart-list">
                    <table class="table">
                    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Món</th>
						        <th>Giá</th>
						        <th>Số lượng</th>
						        <th>Thành tiền</th>
						      </tr>
							</thead>
							<?php
							$get_cart = $ct->get_cart();
							if($get_cart){
								$subtotal=0;
								while($result=$get_cart->fetch_assoc()){
									
									
							?>

						    <tbody>
						      <tr class="text-center">
						        <td class="product-remove"><a onclick="return confirm('Do you want to remove the product from the cart?')" href="?delid=<?php echo $result['cart_id']?>">X</a></td>
						        
						        <td class="image-prod"><img width="100" height="50"  src="assets/img/food/<?php echo $result['images']?>" ></td>
						        
						        <td class="product-name">
						        	<h3><?php echo $result['name_mon'] ?></h3>
						        </td>
						        
						        <td class="price"><?php echo $fm->formatMoney($result['gia_mon'])."VNĐ" ?></td>
						        
						        <td class="quantity">
						        	<div class="input-group mb-3">
										<form action="" method=post >
									<input type="hidden" name="cartid" value="<?php echo $result['cart_id'] ?>" >
					             	<input type="Number" name="soluong" class=" form-control pd-3xy" value="<?php echo $result['soluong'] ?>" min="1" max="50">
									<input type="submit"  value="Cập Nhật" class="btn btn-primary pd-3xy">	
								</form>
								</div>
					          </td>
						        
						        <td class="total">
									<?php
									$total = $result['soluong']* $result['gia_mon'];
									echo $fm->formatMoney($total)."VNĐ";
									$subtotal += $total;
								
									?>
								</td>
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


        <div class="row-cart justify-content-end">
        <div class="col-cart-2 mt-48">
    				<div class="cart-total mb-2">
    					<h3>Tổng Số Tiền</h3>
    					<p class="d-flex">
    						<span> Tổng cộng :</span>
							<span><?php 
							if(isset($subtotal)){
							echo $fm->formatMoney($subtotal);}
							else{
								echo"0";
							}
							$sub = isset($subtotal)?$subtotal:'';
							session ::set('sum',$sub); 
							?> VNĐ</span>
    					</p>
    					<p class="d-flex">
    						<span>Giảm giá</span>
    						<span>: 0</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Tổng</span>
							<span>: <?php	if(isset($subtotal)){
							echo $fm->formatMoney($subtotal);}
							else{
								echo"0";
							}  ?> VNĐ</span>
    					</p>
    				</div>
    				<p class="text-start mt-48"><a href="book.php?idorder=order" class="btn btn-primary pd-3xy">Proceed to Checkout</a></p>
    			</div>
        </div>
    </div>
</section>






       
<?php
  include 'inc/footer.php';
?>