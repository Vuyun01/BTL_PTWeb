<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helper/format.php');
    // include_once '../lib/database.php';
    // include_once '../helper/format.php';

?>

<?php
    class category{
        private $db;
        private $fm;

        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_category($catName){
            $catName = $this->fm->validation($catName);
            $catName = mysqli_real_escape_string($this->db->link, $catName);
            

            if(empty($catName)) {
                $alert = "<span class='error'>Danh mục không được để trống!</span>";
                return $alert;
            }else{
                $query = "INSERT INTO tbl_category (catName) VALUES ('$catName')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Thêm danh mục thành công!</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Lỗi không thể thêm danh mục! :(</span>";
                    return $alert;
                }

            }
        }

        public function show_category(){
            
            $query = "SELECT * FROM tbl_category ORDER BY catId DESC";
            $result = $this->db->select($query);
            return $result;
            
        }

        public function getcatbyid($id){
            $query = "SELECT * FROM tbl_category WHERE catId = '$id' ORDER BY catId DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_category($catName,$id){
            $catName = $this->fm->validation($catName);
            $catName = mysqli_real_escape_string($this->db->link, $catName);
            $id = mysqli_real_escape_string($this->db->link, $id);


            if(empty($catName)) {
                $alert = "<span class='error'>Danh mục không được để trống!</span>";
                return $alert;
            }else{
                $query = "UPDATE tbl_category SET catName = '$catName' WHERE catId='$id'";
                $result = $this->db->update($query);
                if($result){
                    $alert = "<span class='success'>Cập nhật danh mục thành công!</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Lỗi không thể cập nhật danh mục! :(</span>";
                    return $alert;
                }

            }
        }

        public function del_category($id){
            
            $query = "DELETE FROM tbl_category WHERE catId='$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Xóa danh mục thành công!</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Lỗi không thể xóa danh mục! :(</span>";
                return $alert;
            }

        }
        public function getprodbycat($id){
            $query = "SELECT * FROM tbl_product WHERE catId = '$id' ORDER BY catId DESC LIMIT 8";
            $result = $this->db->select($query);
            return $result;
        }

        public function getnameprodbycat($id){
           
            $query = "
                SELECT tbl_product.*, tbl_category.catName, tbl_category.catId
                FROM tbl_category, tbl_product WHERE tbl_product.catId = tbl_category.catId 
                AND tbl_product.catId = '$id' LIMIT 1
            ";
            $result = $this->db->select($query);
            return $result;
        }

    }

    
?>