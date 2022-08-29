<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helper/format.php');
    // include_once '../lib/database.php';
    // include_once '../helper/format.php';

?>

<?php
    class product{
        private $db;
        private $fm;

        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_product($data, $files){
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $description = mysqli_real_escape_string($this->db->link, $data['description']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            
            $permitted = array('jpg', 'jpeg', 'png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;


            if($productName == "" || $brand == "" || $category == "" || $description == "" || $price == "" || $type == "" || $file_name == "" ) {
                $alert = "<span class='error'>Các trường không được để trống!</span>";
                return $alert;
            }else{
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "INSERT INTO tbl_product (productName, catId, brandID, description, type, price, image) 
                            VALUES ('$productName', '$category', '$brand', '$description', '$type', '$price', '$unique_image')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Thêm sản phẩm thành công!</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Lỗi không thể thêm sản phẩm! :(</span>";
                    return $alert;
                }

            }
        }

        public function show_product(){


            $query ="
            SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
            FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
            INNER JOIN tbl_brand ON tbl_product.brandID = tbl_brand.brandID
            ORDER BY tbl_product.productId desc
            ";
            $result = $this->db->select($query);
            
            // $query = "SELECT * FROM tbl_product ORDER BY productId DESC";
            return $result;
            
        }

        public function getprodbyid($id){
            $query = "SELECT * FROM tbl_product WHERE productId = '$id' ORDER BY catId DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_product($data,$files,$id){
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $description = mysqli_real_escape_string($this->db->link, $data['description']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            
            $permitted = array('jpg', 'jpeg', 'png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;



            if($productName == "" || $brand == "" || $category == "" || $description == "" || $price == "" || $type == "") {
                $alert = "<span class='error'>Các trường không được để trống!</span>";
                return $alert;
            }else{
                if(!empty($file_name)){
                    //Neu chon anh
                    if($file_size > 2048000){
                        $alert= "<span class='error'>Kích thước ảnh phải nhỏ hơn 2MB!</span>";
                        return $alert;
                    }else if(in_array($file_ext, $permitted) === false){
                        $alert= "<span class='error'>Chỉ có thể tải ảnh lên ở dạng: -".implode(', ',$permitted)."</span>";
                        return $alert;
                    }
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "UPDATE tbl_product SET
                        productName = '$productName',
                        catId = '$category',
                        brandID = '$brand',
                        price = '$price',
                        type = '$type',
                        description = '$description',
                        image = '$unique_image'

                        WHERE productId = '$id'
                    ";


                }else{
                    //Neu k chon anh
                    $query = "UPDATE tbl_product SET
                        productName = '$productName',
                        catId = '$category',
                        brandID = '$brand',
                        price = '$price',
                        type = '$type',
                        description = '$description'

                        WHERE productId = '$id'
                    ";
                }

                $result = $this->db->update($query);
                if($result){
                    $alert = "<span class='success'>Cập nhật sản phẩm thành công!</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Lỗi không thể cập nhật sản phẩm! :(</span>";
                    return $alert;
                }
            }   
        }

        public function del_product($id){
            
            $query = "DELETE FROM tbl_product WHERE productId='$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Xóa sản phẩm thành công!</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Lỗi không thể xóa sản phẩm! :(</span>";
                return $alert;
            }

        }
        //---------------------------------------------------------------------------
        public function getprodbyfeatured(){
            $query = "SELECT * FROM tbl_product WHERE type='0' ORDER BY productId DESC LIMIT 4";
            $result = $this->db->select($query);
            return $result;
        }

        public function getprodbynew(){
            $query = "SELECT * FROM tbl_product ORDER BY productId DESC LIMIT 4";
            $result = $this->db->select($query);
            return $result;
        }

        public function getprodbydetails($id){
            $query ="
            SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
            FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
            INNER JOIN tbl_brand ON tbl_product.brandID = tbl_brand.brandID
            WHERE tbl_product.productId = '$id'
            
            ";
            $result = $this->db->select($query);
            return $result;
        }

        public function getprodbybrand($brandName){
            $query ="
            SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
            FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
            INNER JOIN tbl_brand ON tbl_product.brandID = tbl_brand.brandID
            WHERE tbl_brand.brandName = '$brandName'
            ORDER BY productId DESC LIMIT 4
            ";
            $result = $this->db->select($query);
            return $result;
        }

        public function insert_slider($data, $file){
            $sliderName = mysqli_real_escape_string($this->db->link, $data['slidername']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            
            $permitted = array('jpg', 'jpeg', 'png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;



            if($sliderName == "" || $type == "") {
                $alert = "<span class='error'>Các trường không được để trống!</span>";
                return $alert;
            }else{
                if(!empty($file_name)){
                    //Neu chon anh
                    if($file_size > 2048000){
                        $alert= "<span class='error'>Kích thước ảnh phải nhỏ hơn 2MB!</span>";
                        return $alert;
                    }else if(in_array($file_ext, $permitted) === false){
                        $alert= "<span class='error'>You can upload only: -".implode(', ',$permitted)."</span>";
                        return $alert;
                    }

                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "
                        INSERT INTO tbl_slider (sliderName, sliderImage, type) 
                        VALUES ('$sliderName', '$unique_image', '$type')
                    ";

                    $result = $this->db->insert($query);
                    if($result){
                        $alert = "<span class='success'>Thêm slider thành công!</span>";
                        return $alert;
                    }else{
                        $alert = "<span class='error'>Lỗi không thể thêm slider! :(</span>";
                        return $alert;
                    }
                    
                }

            }   
        }  

        public function show_slider_on(){
           
            $query = "SELECT * FROM tbl_slider WHERE type='1' ORDER BY sliderId DESC";
            $result = $this->db->select($query);
            
            return $result;
        }

        public function show_slider(){
           
            $query = "SELECT * FROM tbl_slider ";
            $result = $this->db->select($query);
            
            return $result;
        }

        public function update_slider($id,$type){
            $type = mysqli_real_escape_string($this->db->link, $type);

            $query = "UPDATE tbl_slider SET type='$type' WHERE sliderId='$id'";
            $result = $this->db->update($query);
            return $result;
            
        }

        public function del_slider($id){
            
            $query = "DELETE FROM tbl_slider WHERE sliderId='$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Xóa slider thành công!</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Lỗi không thể xóa slider! :(</span>";
                return $alert;
            }
    
            
        }
    }

    
?>