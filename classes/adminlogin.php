<?php
    include '../lib/session.php';
    Session::checkLogin();
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helper/format.php');
    // include '../lib/database.php';
    // include '../helper/format.php';

?>

<?php
    class adminlogin{
        private $db;
        private $fm;

        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function login_admin($adminUser, $adminPass){
            $adminUser = $this->fm->validation($adminUser);
            $adminPass = $this->fm->validation($adminPass);

            $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
            $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

            if(empty($adminUser) || empty($adminPass)) {
                $alert = "Tên người dùng và Mật khẩu không được để trống!";
                return $alert;
            }else{
                $query = "SELECT * FROM tbl_admin WHERE adminUser='$adminUser' AND adminPass='$adminPass' LIMIT 1";
                $result = $this->db->select($query);
                if($result != false){
                    $value = $result->fetch_assoc();    
                    Session::set('login',true);
                    Session::set('adminId', $value['adminId']);
                    Session::set('adminUser', $value['adminUser']);
                    Session::set('adminName', $value['adminName']);
                    Session::set('adminPass', $value['adminPass']);
                    header('Location: index.php');

                }else{
                    $alert = "Tên người dùng hoặc mật khẩu không chính xác!";
                    return $alert;
                }

            }
        }

        
    }

    
?>