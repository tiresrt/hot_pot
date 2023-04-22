<?php
include 'inc/header.php';
?>

<style>
       input[type=search] {
    border: solid 1px #ccc;
    padding: 9px 10px 9px 32px;
    width: 20rem;
 
    -webkit-border-radius: 10em;
    -moz-border-radius: 10em;
    border-radius: 10em;

    
  
}
button{
    border: solid 1px #ccc;
    padding-left: 10px ;
    width: 5rem;
    -webkit-border-radius: 10em;
    -moz-border-radius: 10em;
    border-radius: 10em;

    
}
    </style>


        <section class="menu-section">
            <div class="container-menu mg-rf-8">
                <div class="search-section">
                    <form action="menu.php" method="post">
                        <input type="search" name="key" placeholder="Tìm kiếm">
                        <button type="submit">Tìm kiếm</button>
                    </form>
                    <div class="menu-row">
                        <div class="list-type mb-2">
                            <div class="type-dish nav-pills" id="pills-tab" role="tablist" aria-orientation="vertical">
                            <?php
                    $show_loai = $loaimon->show_loaimenu();
                    if($show_loai){

                                while($result = $show_loai->fetch_assoc()){
                    	
                             ?>
                             <a class="flex-nav-dish" id="pills-tab-1" 
                            href="?id_loai=<?php echo $result['id_loai']?>"
                            role="tab"><?php echo $result['name_loai']?></a>

                                <?php
                                 }
                                 } 
                            ?>
                            </div>
                        </div>    
                        
                        <div class="list-dish pd-rf-15">
                            
                                <div class="tab-content mt-2" id="pills-tabContent">

                                    <div class="tab-dish" id="pills-tab" role="tabpane1" aria-labelledby="day-1-tab">
                                        <div class="row-list-dish d-flex">
                                        <?php 
    							            $key =isset($_POST['key'])?$_POST['key']:'';
    							            $id= isset($_GET['id_loai'])?$_GET['id_loai']:'1';
    							            $listmon= $mon->getmonbyloai($id);
    							            $monkey=$mon->getmonkey($key);
							            ?>
           					            <?php
           						            if(empty($key)){
               					            if($listmon){
                				            while($result_mon = $listmon->fetch_assoc()){
            				            ?>
   
                                            <div class="list-flex-dish d-flex align-self-stretch">
                                                <div class="menus-flex align-self-stretch">
                                                    <div class="menu-img" 
                                                        style="background-image: url(assets/img/food/<?php echo $result_mon['images']?>);"></div>
                                                    <div class="text-inf d-flex">
                                                        <div>
                                                            <div class="flex-box-d">
                                                                <div class="one-half">
                                                                    <h3>  <?php echo $result_mon['name_mon'] ?></h3>
                                                                </div>
                                                                <div class="one-forth">
                                                                    <span class="price"><?php echo $fm->formatMoney($result_mon['gia_mon'])?></span>
                                                                </div>
                                                            </div>
                                                        
                                                        <?php echo $result_mon['ghichu_mon'] ?> 
                                                        <p><a href="detail.php?monid=<?php echo $result_mon['id_mon'] ?>" class="btn btn-primary">Đặt Ngay</a></p>
                                                        </div>
                                                    </div>
                                            
                                                </div>
                                            

                                                
                                            </div>






                                            <?php
            					            }
       						                }
            			                    } else{
                			if($monkey){
                    			while($result_mon = $monkey->fetch_assoc()){
           						 ?>
                                <div class="list-flex-dish d-flex align-self-stretch">
                                                <div class="menus-flex d-flex align-self-stretch">
                                                    <div class="menu-img" 
                                                        style="background-image: url(assets/img/food/<?php echo $result_mon['images']?>);"></div>
                                                        
                                                    <div class="text-inf d-flex">
                                                        <div>
                                                            <div class="one-half">
                                                                <h3>  <?php echo $result_mon['name_mon'] ?></h3>
                                                            </div>
                                                            <div class="one-forth">
                                                                <span class="price"><?php echo $fm->formatMoney($result_mon['gia_mon'])?></span>
                                                            </div>
                                                        </div>
                                                        <?php echo $result_mon['ghichu_mon'] ?> 
                                                        <p><a href="detail.php?monid=<?php echo $result_mon['id_mon'] ?>" class="btn btn-primary">Đặt Ngay</a></p>
                                                    </div>
                                                </div>
                                            

                                                
                                </div>


          




                        <?php
                   					 }
               					 }
           					                }
            			                    ?>


                                        </div>
                                    </div>
                                </div>
                        </div>

                    </div>
                </div>

            </div>





        </section>

        




       
        <?php
  include 'inc/footer.php';
    ?>