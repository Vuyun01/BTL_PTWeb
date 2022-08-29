<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php'?>
<?php
    $cate = new category();
    if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
        echo "<script>window.location = 'catlist.php'</script>";  //back to catlist page
    }else{
        
        $id = $_GET['catid'];
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$catName = $_POST['catName'];

        $updateCat  = $cate->update_category($catName, $id);
	}
	
?>

        <div class="grid_10">   
            <div class="box round first grid">
                <h2>Thêm danh mục</h2>
               <div class="block copyblock"> 
                
                <?php
                    if(isset($updateCat)){
                        echo $updateCat;
                    }
                
                ?>
                <?php 
                    $get_cate_name = $cate->getcatbyid($id);
                    if($get_cate_name){
                        while($result = $get_cate_name->fetch_assoc()){

                     
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['catName']?>" name="catName" placeholder="Sửa tên danh mục..." class="medium" />
                            </td>
                        </tr>
						<tr> 
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
<?php include 'inc/footer.php';?>