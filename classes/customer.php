<?php
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helper/format.php');
    // include_once 'lib/database.php';
    // include_once 'helper/format.php';

?>

<?php
    class customer{
        private $db;
        private $fm;

        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_customer($data){
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $city = mysqli_real_escape_string($this->db->link, $data['city']);
            $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            $country = mysqli_real_escape_string($this->db->link, $data['country']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));

            if($name == "" || $city == "" || $zipcode == "" || $email == "" || $address == "" || $phone == "" || $country == "" || $password == ""  ) {
                $alert = "<span class='error'>Fields mustn't be empty!</span>";
                return $alert;
            }else{
                $check_email = "SELECT * FROM tbl_customer WHERE email='$email' limit 1";
                $result = $this->db->select($check_email);
                if($result){
                    $alert = "<span class='error'>Email existed already!</span>";
                    return $alert;
                }else{
                    $query = "INSERT INTO tbl_customer (name, address, city, country, zipcode, phone, email, password) 
                            VALUES ('$name', '$address', '$city', '$country', '$zipcode', '$phone', '$email', '$password')";
                    $result1 = $this->db->insert($query);
                    if($result1){
                        $alert = "<span class='success'>Register user account successfully!</span>";
                        return $alert;
                    }else{
                        $alert = "<span class='error'>Failed user account registration! :(</span>";
                        return $alert;
                    }
                }

            }

        }

        public function login_customer($data){
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));

            if($email == "" || $password == ""  ) {
                $alert = "<span class='error'>Email and Password mustn't be empty!</span>";
                return $alert;
            }else{
                $check_email = "SELECT * FROM tbl_customer WHERE email='$email' AND password='$password'";
                $result = $this->db->select($check_email);
                if($result){
                    $value = $result->fetch_assoc();
                    Session::set('customer_login',true);
                    Session::set('customer_id',$value['Id']);
                    Session::set('customer_name',$value['name']);
                    
                    

                }else{
                    $alert = "<span class='error'>Email or Password incorrect!</span>";
                    return $alert;
                }
            }
        }

        public function show_customer($id){
            $query = "SELECT * FROM tbl_customer WHERE Id='$id' LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_profile($data, $id){
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $city = mysqli_real_escape_string($this->db->link, $data['city']);
            $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            
            

            if($name == "" || $city == "" || $zipcode == "" || $email == "" || $address == "" || $phone == "" ) {
                $alert = "<span class='error'>Thông tin không được để trống!</span>";
                return $alert;
            }else{
                $query = "
                    UPDATE tbl_customer
                    SET name='$name', city='$city', zipcode='$zipcode', email='$email', address='$address', phone='$phone'
                    WHERE Id='$id'
                ";
                $result = $this->db->update($query);
                if($result){
                    $alert = "<span class='success'>Cập nhật thông tin thành công!</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Oop! Lỗi không thể cập nhật thông tin! :(</span>";
                    return $alert;
                }

            }
        }
    }
?>