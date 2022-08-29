<?php
	require 'inc/header.php';
	require 'inc/slider.php';
?>

 <div class="main">
    <div class="content">
		<?php
		$arr_brand = array("Apple","Sony", "Panasonic","Acer","Xiaomi", "Huawei", "Dell","Toshiba");
		$i = 0;
		// for($i = 0; $i < count($arr_brand); $i++) {
		while($i < count($arr_brand)){
		?>
			<div class="content_top">
				<div class="heading">
					<h3><?php echo $arr_brand[$i];?></h3>
				</div>
				<div class="clear"></div>
			</div>
			<div class="section group">
				<?php
					$product_brand = $product->getprodbybrand($arr_brand[$i]);
					if($product_brand){
						while($result = $product_brand->fetch_assoc()){

				?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="preview.php?productid=<?php echo $result['productId']?>"><img src="admin/uploads/<?php echo $result['image']?>" width="120px" alt="" /></a>
						<h2><?php echo $result['productName']?></h2>
						<p><?php echo $fm->textShorten($result['description'], 40)?></p>
						<p><span class="price"><?php echo $result['price']." "."Đ"?></span></p>
						<div class="button"><span><a href="preview.php?productid=<?php echo $result['productId']?>" class="details">Chi tiết</a></span></div>
					</div>
					<?php
						}
					}
					?>
					
				</div>
		<?php
			$i++;
		}
		?>
		
    </div>
 </div>
 <?php
	require 'inc/footer.php';
 ?>
