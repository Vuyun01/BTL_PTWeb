<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helper/format.php');
    // include_once '../lib/database.php';
    // include_once '../helper/format.php';

?>

<?php
    class cart{
        private $db;
        private $fm;

        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function addToCart($quantity, $id){
            $quantity = $this->fm->validation($quantity);
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $id = mysqli_real_escape_string($this->db->link, $id);
            $sessId = session_id();

            $query = "SELECT * FROM tbl_product WHERE productId='$id'";
            $result = $this->db->select($query)->fetch_assoc();
            
            $productName = $result['productName'];
            $image = $result['image'];
            $price = $result['price'];

            //check cart
            $check_cart = "SELECT * FROM tbl_cart WHERE productId='$id' AND sessionId='$sessId'";
            $result_check = $this->db->select($check_cart);
            if($result_check){
                $result_new_check = $result_check->fetch_assoc();
                $cart_quantity = $result_new_check['quantity'];
                $new_quantity = $quantity + $cart_quantity;
                $query = "UPDATE tbl_cart SET quantity='$new_quantity' 
                WHERE productId='$id' AND sessionId='$sessId'";
                $result_cart = $this->db->update($query);
                if($result_cart){
                    header('Location: cart.php');
                    
                }else{
                    header('Location: 404.php');
                }
            }else{
                $query_cart = "INSERT INTO tbl_cart (productId, sessionId, productName, price, quantity, image) 
                                VALUES ('$id', '$sessId', '$productName', '$price', '$quantity', '$image')";
                $result_cart = $this->db->insert($query_cart);
                if($result_cart){
                    header('Location: cart.php');
                    
                }else{
                    header('Location: 404.php');
                }
            }


            

            
        }

        public function getProdCart(){
            $sessId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sessionId='$sessId'";
            $result = $this->db->select($query);
            return $result;
        }

        public function del_cart($id){
            $id = mysqli_real_escape_string($this->db->link, $id);
            $query = "DELETE FROM tbl_cart WHERE Id='$id'";
            $result = $this->db->delete($query);
            if($result){
                header('Location: cart.php');
            }else{
                $alert = "<span class='error'>Lỗi không thể xóa sản phẩm</span>";
            }
        }

        public function update_quantity($quantities, $id){
            $quantities = mysqli_real_escape_string($this->db->link, $quantities);
            $id = mysqli_real_escape_string($this->db->link, $id);

            $query = "UPDATE tbl_cart SET quantity='$quantities' WHERE Id='$id'";
            $result_quantity = $this->db->update($query);
            if($result_quantity){
                header('Location: cart.php');
            }else{
                $alert = "<span class='error'>Lỗi không cập nhật được số lượng!</span>";
                return $alert;
            }
        }

        public function check_cart(){
            $sessId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sessionId='$sessId'";
            $result = $this->db->select($query);
            return $result;
        }

        public function delAllcart(){
            $sessId = session_id();
            $query = "DELETE FROM tbl_cart WHERE sessionId='$sessId'";
            $result = $this->db->delete($query);
            return $result;
        }

        public function insert_order($cus_id){
            $sessId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sessionId='$sessId'";
            $get_prod = $this->db->select($query);
            if($get_prod){
                while($result=$get_prod->fetch_assoc()){
                    $productId = $result['productId'];
                    $productName = $result['productName'];
                    $quantity = $result['quantity'];
                    $price = $result['price'] * $quantity;
                    $image = $result['image'];
                    $customerId = $cus_id;

                    $query_order = "INSERT INTO tbl_order (productId, productName, price, quantity, image, cusId) 
                    VALUES ('$productId', '$productName', '$price', '$quantity', '$image','$customerId')";
                    $result_order = $this->db->insert($query_order);
                   
                }
            }
        }

        public function getOrderdetails($cus_id){
            $query = "SELECT * FROM tbl_order WHERE cusId='$cus_id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function check_order($cus_id){
            $query = "SELECT * FROM tbl_order WHERE cusId='$cus_id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function getAllOrder(){
            $query = "SELECT * FROM tbl_order";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_status($id){
            $id = mysqli_real_escape_string($this->db->link, $id);

            $query = "UPDATE tbl_order SET status= 1 WHERE Id='$id'";
            $result_status = $this->db->update($query);
            return $result_status;
        }

        public function update_status_process($id){
            $id = mysqli_real_escape_string($this->db->link, $id);

            $query = "UPDATE tbl_order SET status= 2 WHERE Id='$id'";
            $result_status = $this->db->update($query);
            return $result_status;
        }

        public function update_status_del($id){
            $id = mysqli_real_escape_string($this->db->link, $id);

            $query = "DELETE FROM tbl_order WHERE Id='$id'";
            $result_status = $this->db->delete($query);
            return $result_status;
        }

        
        

    }

    
?>