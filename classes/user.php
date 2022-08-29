<?php
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helper/format.php');
    // include_once 'lib/database.php';
    // include_once 'helper/format.php';

?>

<?php
    class User{
        private $db;
        private $fm;

        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function show_user(){
            
            $query = "SELECT * FROM tbl_customer ORDER BY Id DESC";
            $result = $this->db->select($query);
            return $result;
            
        }

        public function update_pass($data,$pass,$id){
            $oldpass = mysqli_real_escape_string($this->db->link, md5($data['oldpass']));
            $newpass = mysqli_real_escape_string($this->db->link, md5($data['newpass']));

            if($oldpass =="" || $newpass == ""){
                $alert = "<span class='error'>Mật khẩu không được để trống!</span>";
                return $alert;
            }else{
                if($oldpass == $pass){
                    $query = "
                    UPDATE tbl_admin SET adminPass='$newpass'
                    WHERE adminId='$id'
                    ";
                    $result = $this->db->update($query);
                    if($result){
                        $alert = "<span class='success'>Cập nhật mật khẩu thành công!</span>";
                        return $alert;
                    }else{
                        $alert = "<span class='error'>Lỗi không thể cập nhật mật khẩu!</span>";
                        return $alert;
                    }
                }else{
                    $alert = "<span class='error'>Mật khẩu cũ không chính xác!</span>";
                    return $alert;
                }
            }
        }
    }
    ?>