<?php
	require 'inc/header.php';
	// require 'inc/slider.php';
?>
<?php
	if(!isset($_GET['productid']) || $_GET['productid'] == NULL){
		// echo "<script>alert('404 PAGE NOT FOUND!')</script>";
		echo "<script>window.location = '404.php'</script>";  //back to 404 page
	}else{
		$id = $_GET['productid'];
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
		$quantity = $_POST['quantity'];
		$addtoCart = $cart->addToCart($quantity,$id);
	}

?>
 <div class="main">
    <div class="content">
    	<div class="section group">
			<?php
				$getprod_details = $product->getprodbydetails($id);
				if($getprod_details){
					while($result_details = $getprod_details->fetch_assoc()){
	
			?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $result_details['image']?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result_details['productName']?> </h2>
					<p><?php echo $fm->textShorten($result_details['description'], 200)?></p>					
					<div class="price">
						<p>Giá: <span><?php echo $result_details['price']." "."Đ"?></span></p>
						<p>Mục: <span><?php echo $result_details['catName']?></span></p>
						<p>Thương hiệu:<span><?php echo $result_details['brandName']?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Mua ngay"/>
					</form>				
				</div>
				</div>
			<div class="product-desc">
				<h2>Chi tiêt sản phẩm</h2>
				<p><?php echo $result_details['description']?></p>
				<p><?php echo $result_details['description']?></p>
	    	</div>
		</div>
		<?php
			}
		}
		?>
		
				<div class="rightsidebar span_3_of_1">
					<h2>Danh mục sản phẩm</h2>
					<ul>
						<?php
						$getcat = $cat->show_category();
						if($getcat){
							while($result_cate = $getcat->fetch_assoc()){

						?>
						<li><a href="productbycat.php?catid=<?php echo $result_cate['catId']?>"><?php echo $result_cate['catName']?></a></li>
						<?php
							}
						}
						?>
					</ul>
			
				</div>
	</div>
</div>

<?php
	require 'inc/footer.php';
 ?>