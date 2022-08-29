<?php
	require 'inc/header.php';
	require 'inc/slider.php';
?>


 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>SẢN PHẨM NỔI BẬT</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			 	<?php
			 	$product_featured = $product->getprodbyfeatured();
				if($product_featured){
					while($result = $product_featured->fetch_assoc()){		
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?productid=<?php echo $result['productId']?>"><img src="admin/uploads/<?php echo $result['image']?>" alt="" /></a>
					 <h2><?php echo $result['productName']?> </h2>
					 <p><?php echo $fm->textShorten($result['description'], 30)?></p>
					 <p><span class="price"><?php echo $result['price']." "."Đ"?></span></p>
				     <div class="button"><span><a href="preview.php?productid=<?php echo $result['productId']?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php
					}
				}
				?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>SẢN PHẨM MỚI</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php
				$new_product = $product->getprodbynew();
				if($new_product){
					while($result1 = $new_product->fetch_assoc()){

				
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?productid=<?php echo $result1['productId']?>"><img src="admin/uploads/<?php echo $result1['image']?>" width="120px" alt="" /></a>
					 <h2><?php echo $result1['productName']?> </h2>
					 <p><?php echo $fm->textShorten($result1['description'], 30)?></p>
					 <p><span class="price"><?php echo $result1['price']." "."Đ"?></span></p>
				     <div class="button"><span><a href="preview.php?productid=<?php echo $result1['productId']?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php
					}
				}
				?>
			</div>
    </div>
 </div>

 <?php
	require 'inc/footer.php';
 ?>
