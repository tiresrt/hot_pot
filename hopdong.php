<?php
include 'inc/header.php';


?>
<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
 
	$time = $_POST['timebook'];
	$date=$_POST['datebook'];
	$khach=$_POST['khach'];
	$noidung=$_POST['noidung'];
	$insert_order = $ct->insert_order($userid,$time,$date,$khach,$noidung);
   $del_cart = $ct->del_all_cart();
   header('location: success.php');
  }
  $date = getdate();
  $userid= session_id();
  $get_cart = $ct->show_thongtinid($userid);
  $result=$get_cart->fetch_assoc();


?>
<style>
h1,
h2,
h3,
h4,
h5,
h6 {
    text-align: center;
    padding: 10 10 10 10;
}

label {
    font-weight: bold;   
    position: relative;
}

table {
    width: 50rem !important;


}
.text{
    padding-left: 10rem;
}
.text1{
    color: red;

}
</style>

<section class="section-bill"></section>

<h1><label> Hot Pot ICT</h1>


<h5>Ngày <?php echo $date['mday'] ?> Tháng <?php echo $date['mon'] ?> Năm <?php echo $date['year'] ?></h5>


<h4><label>Chủ quán: </label> ……Nguyễn Việt Quân……<label>ĐT:</label> ………033974654………. </h4>
<h4><label>Người đặt bàn:</label> ………………<label class="text1"> <?php echo session::get('name') ?></label>……………SĐT:………………<label class="text1"> <?php echo session::get('sdt') ?></label>……… </h4>
<h4><label>Nội dung:</label> ………<label class="text1"><?php echo $result['noidung'] ?></label></h4>
<h4><label>khu vực đặt: </label> ……………<label>Sảnh</label>……Loại bàn (tròn hoặc dài):
    ………<label>bàn.dài</label>... </h4>
<h4><label>Thời gian:</label>……………<label class="text1"><?php echo $result['tg'] ?>……Ngày: <?php echo $result['dates'] ?></label> </h4>
<hr>

<h2><label>THỰC ĐƠN </label></h2>
<section>
    <div class="container-bill">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                           
                           
                                <th>Món ăn</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <?php
					
                    $userid= session_id();
                    $get_cart = $ct->show_thongtinid($userid);
                        $subtotal=0;
                        while($result=$get_cart->fetch_assoc()){
                            
                            
                    ?>

                        <tbody>
                            <tr class="text-center">
                       
                                <td class="product-name">
                                    <h3><?php echo $result['name_mon'] ?></h3>
                                </td>

                                <td class="price"><?php echo $fm->formatMoney($result['gia'])."VNĐ" ?></td>

                                    
                                 
                                        
                                    <td class="product-name">
                                    <h3><?php echo $result['soluong'] ?></h3>
                                </td>
                                      
                                  
                                    </div>
                                </td>

                                <td class="total">
                                    <?php
									$total = $result['soluong']* $result['gia'];
									echo $fm->formatMoney($total)."VNĐ";
									$subtotal += $total;
								
									?>
                                </td>
                            </tr><!-- END TR-->
                            <tr></tr>
                        </tbody>
                        <?php		
									
						}
							
                            ?>
                         
                    </table>
                    <h4><label>Tổng: <?php echo $fm->formatMoney( $subtotal) ?> VNĐ</label> </h4>

                </div>
            </div>
        </div>
    </div>
</section>

<label class="text">1.Trong thời gian đặt bàn, nêu bên Quý Khách đơn phương hủy vì bắt cứ lí do gì hoặc không đến đúng thời gian và
ngày đặt bàn thì coi như Quý Khách đã hủy bàn.</label>
<br>
<br>
<label class="text">2. Trong thời gian đặt bàn, nêu có thay đổi về món ăn và thức uống Quý Khách phải liên hệ quán ăn trước 24h đề quán kịp thời chuẩn bị.</label>
<hr>
<br>
<h1><a href="success.php"  class="btn btn-primary pd-3xy"> Xác Nhận </a></h1>
<br>
<br>
</section>
<?php
  include 'inc/footer.php';
  ?>