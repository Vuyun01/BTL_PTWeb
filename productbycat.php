<?php
	require 'inc/header.php';
	// require 'inc/slider.php';
?>
<?php
	// $cate = new category();
    if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
        echo "<script>window.location = '404.php'</script>";  
    }else{
        
        $id = $_GET['catid'];
    }

    // if($_SERVER['REQUEST_METHOD'] === 'POST'){
	// 	$catName = $_POST['catName'];

    //     $updateCat  = $cate->update_category($catName, $id);
	// }

?>
<style>
	.not_available{
		color: #f00;
		font-size: 30px;
		font-weight: bold;
		text-align: center;
	}
</style>
 <div class="main">
    <div class="content">
    	<div class="content_top">
			<?php
			$get_products_cate = $cat->getnameprodbycat($id); 
			if($get_products_cate){
				while($result_prods = $get_products_cate->fetch_assoc()){

			?>
    		<div class="heading">
    		<h3>Danh mục sản phẩm: <?php echo $result_prods['catName']?></h3>
    		</div>
			<?php
				}
			}
			?>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
				<?php
				$cate_products = $cat->getprodbycat($id); 
				if($cate_products){
					while($result_prod_cate = $cate_products->fetch_assoc()){

				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?productid=<?php echo $result_prod_cate['productId']?>"><img src="admin/uploads/<?php echo $result_prod_cate['image']?>" width="120px" alt="" /></a>
					 <h2><?php echo $result_prod_cate['productName']?> </h2>
					 <p><?php echo $fm->textShorten($result_prod_cate['description'],60)?></p>
					 <p><span class="price"><?php echo $result_prod_cate['price']." "."Đ"?></span></p>
				     <div class="button"><span><a href="preview.php?productid=<?php echo $result_prod_cate['productId']?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php
					}
				}else{
					echo "<h3 class='not_available'>Không tìm thấy sản phẩm!</h3>";
				}
				?>
			</div>

	
	
    </div>
 </div>
 
 <?php
	require 'inc/footer.php';
 ?>

