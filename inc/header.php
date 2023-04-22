<?php
    require_once '/xampp/htdocs/hot_pot/lib/session.php';
    session::init();
include '/xampp/htdocs/hot_pot/lib/database.php';
include '/xampp/htdocs/hot_pot/helpers/format.php';
spl_autoload_register(function($class){
    include_once "/xampp/htdocs/hot_pot/classes/".$class.".php";});
        $db= new Database();
        $fm= new Format();
        $ct= new cart();
        $us = new user();
        $loaimon = new loaimon();
        $mon = new mon(); 

  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - HotPotICT</title>
    <link rel="stylesheet" href="./assets/fonts/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="icon" href="./favicon.ico">
</head>
<body>
        <div id="main">
            <div id="headerid" class="header">
                <div class="container-header">
                    
                        
                        <div class="menu-mbl">
                            <a href="index.php" class="logo-ict">HotPot ICT</a>
                            <div id="mobile-menus">
                                <i class="ti-menu"></i>
                            </div>
                            
                        </div>
                        <div class="menu-show">
                            <ul class="show-bar">
                                <li class="text-section"><a href="index.php">Trang chủ</a></li>
                                <li class="text-section"><a href="menu.php">Thực đơn</a></li>
                                <li class="text-section"><a href="sale.php">Ưu đãi</a></li>
                                <li class="text-section"><a href="address.php">Địa chỉ</a></li>
                                <li class="text-section"><a href="recruitment.php">Tuyển dụng</a></li>
                                <li class="hotline-contact text-section"><a href="book.php"><i class="ti-mobile"></i>0972 842 548</a></li>
                                <li class="text-section-it"><a href="cartt.php"><i class="ti-shopping-cart"></i>
                                <?php
			                    $check = $ct->check();
			                    if($check){
			                    $sum=session::get("sum"); 
			                    echo $fm->formatMoney($sum);
			                    }
			                    ?>
                                </a></li>
                                


                                
                                <li class="text-section-it"><a href="book.php" class="nav-link"><button class="btn-header">Đặt bàn</button></a></li>
			                     <?php
                                if(isset($_GET['action'])&& $_GET['action']=='logout'){
                                    Session::destroy();
                                }
							?>





                                <li class="text-section-it"> 
				  <?php if(!empty(session::get('name'))){ ?>
                                

					<a class="nav-link" href="userblog.php?id=<?php echo session::get('id') ?>"><button class="btn-header"><span><?php echo session::get('name') ?></span></button></a>
							<?php }else 
							
							{?>
							<a class="nav-link" href="https://www.facebook.com/yeh.eu.kunkun/"><button class="btn-header">Liên hệ</button></a>
							 	

							<?php }?></li>				



                                <li class="text-section-it">
                                <?php if(!empty(session::get('name'))){ ?>
                                
                                <a class="nav-link" href="?action=logout"><button class="btn-header">Đăng xuất</button></a>
							<?php }else 
							
							{?>
                                    <a href="login.php"><button class="btn-header">Đăng nhập</button></a>
                                    <?php }?>
                                </li>
                                
                            </ul>
                        </div>
                </div>        
                
            </div>

            <div class="slider">
                <img src="./assets/img/slidersection.png" alt="Slider">
            </div>
            