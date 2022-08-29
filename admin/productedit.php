<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/product.php';?>

<?php
    $prod = new product();
    if(!isset($_GET['productid']) || $_GET['productid'] == NULL){
        echo "<script>window.location = 'productlist.php'</script>";  //back to productlist page
    }else{
        $id = $_GET['productid'];
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
        $updateProduct  = $prod->update_product($_POST, $_FILES, $id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa sản phẩm </h2>
        <div class="block">    
        <?php
            if(isset($updateProduct)){
                echo $updateProduct;
            }
        ?>     
        
        <?php
            $get_product_by_id = $prod->getprodbyid($id); 
            if($get_product_by_id){
                while($resultprod = $get_product_by_id->fetch_assoc()){

        ?>


         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $resultprod['productName'] ;?>"name="productName" placeholder="Nhập tên sản phẩm..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Danh mục</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>Chọn danh mục</option>
                            <?php
                            $cat = new category();
                            $catlist = $cat->show_category();
                            if($catlist){
                                while($result = $catlist->fetch_assoc()){

                            ?>
                                <option 
                                <?php
                                if($result['catId'] == $resultprod['catId']){
                                    echo 'selected';
                                }
                                ?>
                                value="<?php echo $result['catId'];?>"><?php echo $result['catName'];?></option>
                            <?php
                                }
                            }
                        ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Thương hiệu</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>Chọn thương hiệu</option>
                            <?php
                            $brand = new brand();
                            $brandlist = $brand->show_brand();
                            if($brandlist){
                                while($result = $brandlist->fetch_assoc()){

                            ?>
                            <option 
                            <?php
                                if($result['brandID'] == $resultprod['brandID']){
                                    echo 'selected';
                                }
                                ?>
                            value="<?php echo $result['brandID'];?>"><?php echo $result['brandName'];?></option>
                            <?php
                                }
                            }
                        ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả</label>
                    </td>
                    <td>
                        <textarea name="description" class="tinymce"><?php echo $resultprod['description']; ?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input value="<?php echo $resultprod['price']; ?>" type="text" name="price" placeholder="Nhập giá..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Tải ảnh lên</label>
                    </td>
                    <td>
                    <img src="uploads/<?php echo $resultprod['image'];?>" width="80px"><br>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Loại sản phẩm</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Chọn loại sản phẩm</option>
                            <?php
                            if($resultprod['type'] == 0){
                            ?>
                            <option selected value="0">Nổi bật</option>
                            <option value="1">Phổ thông</option>
                            <?php
                            }else{
                            ?>
                            <option value="0">Nổi bật</option>
                            <option selected value="1">Phổ thông</option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Cập nhật" />
                    </td>
                </tr>
            </table>
            </form>
        <?php
            }
        }
        ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>
