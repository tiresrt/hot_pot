
<?php
$filepath= realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php

class user {
    private $db ;
    private $fm ;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format(); 
    }
    public function login_user($sdt,$pass)   
    {
        $sdt=$this->fm->validation($sdt);
        $pass=$this->fm->validation($pass);

        $sdt = mysqli_real_escape_string($this->db->link,$sdt);
        $pass = mysqli_real_escape_string($this->db->link,$pass);

        if(empty($sdt)|| empty($pass)){
            $alert ="<span class='error'>Không nhập đủ thông tin! </span>";
            return $alert ;
        }
        else{
            $query = "SELECT * FROM khach_hang WHERE sodienthoai='$sdt' AND passwords='$pass' LIMIT 1" ;
            $result = $this->db->select($query);

            if($result != false){
                $value = $result->fetch_assoc();
                Session::set('userlogin',true);
                Session::set('id',$value['id']);
                Session::set('sdt',$value['sodienthoai']);
                Session::set('name',$value['ten']);
                header('Location:index.php');

            }else{
                $alert ="<span class='error'>Số điện thoại hoặc mật khẩu không chính xác! </span>";
                return $alert ;
            }
        }
    }
    public function test_phone($sdt1){
        $sdt1=$this->fm->validation($sdt1);
        $sdt1 = mysqli_real_escape_string($this->db->link,$sdt1);
        $query = "SELECT * FROM khach_hang WHERE sodienthoai='$sdt1'" ;
        $result = $this->db->select($query);
        return $result ;

    }
    public function test_pass($pass0){
        $pass0=$this->fm->validation($pass0);
        $pass0 = mysqli_real_escape_string($this->db->link,$pass0);
        $query = "SELECT * FROM khach_hang WHERE passwords ='$pass0'" ;
        $result = $this->db->select($query);
        return $result ;

    }
    public function insert_user($ten,$sdt1,$sex,$pass1,$repass)
    {   $a = $this->test_phone($sdt1);
        $ten=$this->fm->validation($ten);
        $sdt1=$this->fm->validation($sdt1);
        $sex=$this->fm->validation($sex);
        $pass1=$this->fm->validation($pass1);
        $repass=$this->fm->validation($repass);

        
        $ten = mysqli_real_escape_string($this->db->link,$ten);
        $sdt1 = mysqli_real_escape_string($this->db->link,$sdt1);
        $sex = mysqli_real_escape_string($this->db->link,$sex);
        $pass1 = mysqli_real_escape_string($this->db->link,$pass1);
        $repass = mysqli_real_escape_string($this->db->link,$repass);

        if(empty($ten)||empty($sdt1)||empty($pass1)){
            $alert ="<span class='error'>Không nhập đủ thông tin! </span>";
            return $alert ;
        }
        else
        {   
            if($a){
                $alert = "<span class='error'> Số điện thoại đã tồn tại! </span>";
                return $alert ;
            }else{
            if($pass1==$repass){
            $query = "INSERT INTO khach_hang(ten,sodienthoai,gioitinh,passwords) VALUES('$ten','$sdt1','$sex','$pass1')" ;
            $result = $this->db->insert($query);
            if($result){
                $alert ="<span class='success'> Đăng ký thành công !</span>";
                return $alert ;
                $query = "SELECT * FROM khach_hang WHERE sodienthoai='$sdt1' AND passwords='$pass1' LIMIT 1" ;
            $results = $this->db->select($query);

            if($results){
                $value = $results->fetch_assoc();
                Session::set('userlogin',true);
                Session::set('id',$value['id']);
                Session::set('sdt',$value['sodienthoai']);
                Session::set('name',$value['ten']);
                header('Location:index.php');

            }
            }else{
                $alert ="<span class='success'> Đăng ký không thành công!</span>";
                return $alert ;
                
                
            }
        }else
        $alert = "<span class='error'>Mật khẩu không khớp!</span>";
        return $alert;
    }
        }
    
    }
  
    public function show_thongtin($id){
        
        $query = "SELECT * FROM khach_hang Where id='$id'" ;
        $result = $this->db->select($query);
        return $result;

    }
    public function change_pass($id,$pass0,$pass1,$repass){
        $a = $this->test_pass($pass0);
        if($a){
            if($pass1==$repass){
                $query ="  UPDATE khach_hang SET 
                passwords='$pass1'
                wHERE id='$id'";
                $result = $this->db->insert($query);
                if($result){
                    $alert ="<span class='success'> Thay đổi mật khẩu thành công!</span>";
                    return $alert ;
                }else{
                    $alert ="<span class='success'> Thay đổi mật khẩu không thành công!</span>";
                    return $alert ;
                }

        }else{
            $alert ="<span class='error'> Mật khẩu không chính xác!</span>";
                    return $alert ;
        }

    }else {
        $alert ="<span class='error'> Nhập sai mật khẩu cũ!</span>";
        return $alert ;
    }
}
public function update_user($ten,$sdt1,$sex,$id){
    $ten=$this->fm->validation($ten);
    $sdt1=$this->fm->validation($sdt1);
    $sex=$this->fm->validation($sex);
    $ten = mysqli_real_escape_string($this->db->link,$ten);
    $sdt1 = mysqli_real_escape_string($this->db->link,$sdt1);
    $sex = mysqli_real_escape_string($this->db->link,$sex);

    $query ="  UPDATE khach_hang SET 
    ten= '$ten',
    sodienthoai='$sdt1',
    gioitinh ='$sex'

    wHERE id='$id'";
    $result = $this->db->insert($query);
    if($result){
        $alert ="<span class='success'> Cập nhật thành công !</span>";
        return $alert ;

    }else{
        $alert ="<span class='error'> Cập nhật thất bại !</span>";
        return $alert ;
    }


}
    // public function show_loaimenu(){
        
    //     $query = "SELECT * FROM loai_mon " ;
    //     $result = $this->db->select($query);
    //     return $result;

    // }
    // public function update_loai($tenloai,$ghichu,$id){
    //     $tenloai=$this->fm->validation($tenloai);
    //     $ghichu=$this->fm->validation($ghichu);

    //     $tenloai = mysqli_real_escape_string($this->db->link,$tenloai);
    //     $ghichu = mysqli_real_escape_string($this->db->link,$ghichu);
    //     $id = mysqli_real_escape_string($this->db->link,$id);

    //     if(empty($tenloai)){
    //         $alert ="chưa nhập tên loại món ";
    //         return $alert ;
    //     }
    //     else{
    //         $query = "UPDATE  loai_mon SET name_loai='$tenloai',ghichu='$ghichu' Where id_loai='$id'" ;
    //         $result = $this->db->insert($query);
    //         if($result){
    //             $alert ="<span class='succsess'> Sửa thành công</span>";
    //             return $alert ;
    //         }else{
    //             $alert ="<span class='succsess'> Sửa không thành công</span>";
    //             return $alert ;
    //         }

    //         }
    // }
}

?>