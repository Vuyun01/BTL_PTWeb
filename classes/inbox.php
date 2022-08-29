<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helper/format.php');
    // include_once '../lib/database.php';
    // include_once '../helper/format.php';

?>

<?php
    class inbox{
        private $db;
        private $fm;

        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_inbox($data){
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            $content = mysqli_real_escape_string($this->db->link, $data['content']);
            
            
            if($name == "" || $email == "" || $phone == "") {
                $alert = "<span class='error'>Thông tin là bắt buộc!</span>";
                return $alert;
            }else{
                $query = "INSERT INTO tbl_inbox (name, email, phone, content) 
                        VALUES ('$name', '$email', '$phone', '$content')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Gửi thành công!</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Lỗi không thể gửi biểu mẫu! :(</span>";
                    return $alert;
                }

            }
        }

        public function show_inbox(){
            
            $query = "SELECT * FROM tbl_inbox ORDER BY Id DESC";
            $result = $this->db->select($query);
            return $result;
            
        }

        public function del_inbox($id){
            $query = "DELETE FROM tbl_inbox WHERE Id = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Xóa thành công!</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Lỗi không thể xóa mục này! :(</span>";
                return $alert;
            }
        }
    }
?>