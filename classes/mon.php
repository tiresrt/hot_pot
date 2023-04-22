<?php
$filepath= realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');

?>
<?php

class mon {
    private $db ;
    private $fm ;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format(); 
    }
    public function insert_mon($data,$files)   
    {
       

        $name_mon = mysqli_real_escape_string($this->db->link,$data['name_mon']);
        $loaimon = mysqli_real_escape_string($this->db->link,$data['loaimon']);
        $gia = mysqli_real_escape_string($this->db->link,$data['gia']);
        $ghichu = mysqli_real_escape_string($this->db->link,$data['ghichu']);
        $tinhtrang = mysqli_real_escape_string($this->db->link,$data['tinhtrang']);
        // $image = mysqli_real_escape_string($this->db->link,$data['name_mon']);
        //kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
        $permited = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image= substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "../images/food/".$unique_image;


        if($name_mon==""||$loaimon==""||$gia==""||$tinhtrang==""||$file_name==""){
            $alert ="Không đủ thông tin đã được nhập. ";
            return $alert ;
        }
        else{
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO monan(name_mon,id_loai,gia_mon,ghichu_mon,images,tinhtrang) VALUES('$name_mon','$loaimon','$gia','$ghichu','$unique_image','$tinhtrang')";
            $result = $this->db->insert($query);
            if($result){
                $alert ="<span class='succsess'> Thành công!</span>";
                return $alert ;
            }else{
                $alert ="<span class='succsess'> Lỗi!</span>";
                return $alert ;
            }

            }
    
    }
    public function show_mon(){
        $query = " SELECT monan.* ,loai_mon.name_loai 
        From monan INNER JOIN loai_mon ON monan.id_loai = loai_mon.id_loai order by monan.id_mon desc ";
        // $query = "SELECT * FROM monan order by id_mon desc" ;
        $result = $this->db->select($query);
        return $result;

    }
    public function show_monid($id){
        $query = " SELECT monan.* ,loai_mon.name_loai 
        From monan INNER JOIN loai_mon ON monan.id_loai = loai_mon.id_loai order by monan.id_mon desc where id ";
        // $query = "SELECT * FROM monan order by id_mon desc" ;
        $result = $this->db->select($query);
        return $result;

    }
    public function update_mon($data,$files,$id){
       
        
        $tinhtrang = mysqli_real_escape_string($this->db->link,$data['tinhtrang']);
        $gia = mysqli_real_escape_string($this->db->link,$data['gia']);
        $ghichu = mysqli_real_escape_string($this->db->link,$data['ghichu']);
        // $image = mysqli_real_escape_string($this->db->link,$data['name_mon']);
        //kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
        $permited = array('jpg','jpeg','png','gif'); // cho phép 
        $file_name = $_FILES['image']['name'];// 
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.',$file_name); // tách tên 
        $file_ext = strtolower(end($div)); // chuyển chữ hoa thành chữ thường   
        $unique_image= substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

      
             if(!empty($file_name)){
                 //nếu người dùng chọn ảnh
                 if($file_size> 2000000){
                     $alert="<span class='error' > Kích thước hình ảnh phải nhỏ hơn 2MB!</span> . echo $file_size ";
                     return $alert;
                 }
                 elseif(in_array($file_ext,$permited)==false){
                     $alert="<span class='error'> you can upload only : -".implode(',',$permited)."</span>";
                     return $alert;
                 }
                 $query ="  UPDATE monan SET 
                 gia_mon= '$gia',
                 ghichu_mon='$ghichu',
                 images ='$unique_image',
                 tinhtrang='$tinhtrang'
                 where id_mon='$id'";
             }else{
                 //nếu người dùng không chọn ảnh
                $query ="  UPDATE monan SET 
                gia_mon= '$gia',
                ghichu_mon='$ghichu',
                tinhtrang='$tinhtrang'
                where id_mon='$id'";
             }


            $result = $this->db->insert($query);
            if($result){
                $alert ="<span class='success'> Thành công!</span>";
                return $alert ;
            }else{
                $alert ="<span class='error'> Lỗi!</span>";
                return $alert ;
            }

        
    }
    public function del_mon($id){
        $query = "DELETE FROM  monan  Where id_mon='$id'" ;
            $result = $this->db->delete($query);
            if($result){
                $alert ="<span class='success'> Thành công !</span>";
                return $alert ;
            }else{
                $alert ="<span class='error'> Lỗi !</span>";
                return $alert ;
            }

    }
    public function getmonbyid($id){
        $query = "SELECT * FROM monan where id_mon='$id'" ;
        $result = $this->db->select($query);
        return $result;
    }
    public function getmonbyloai($id){
        $query = "SELECT * FROM monan where id_loai='$id' And tinhtrang=1" ;
        $result = $this->db->select($query);
        return $result;
    }
    public function getmonkey($key){
        $k= "'%".$key."%'";
        $k2= "'".$key."%'";
        $query = "SELECT * FROM monan where name_mon like  $k OR name_mon like $k2 And tinhtrang=1" ;
        $result = $this->db->select($query);
        return $result;
    }
    public function get_detail($id){
        $query = " SELECT monan.* ,loai_mon.name_loai 
        From monan INNER JOIN loai_mon ON monan.id_loai = loai_mon.id_loai  where monan.id_mon = '$id'  ";
        // $query = "SELECT * FROM monan order by id_mon desc" ;
        $result = $this->db->select($query);
        return $result;
    }
}

?>