<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="products.php"> <img src="images/images.jpg" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Iphone</h2>
						<p>Các mẫu sản phẩm mới nhất hiện nay.</p>
						<div class="button"><span><a href="products.php">Chi tiết</a></span></div>
				   </div>
			   </div>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="products.php"><img src="images/tivi.jpg" alt="" / ></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Panasonic</h2>
						  <p>Đa dạng mẫu mã, tính năng nổi bật, giá cả ưu đãi .</p>
						  <div class="button"><span><a href="products.php">Chi tiết</a></span></div>
					</div>
				</div>
			</div>
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="products.php"> <img src="images/acer.jpg" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Acer</h2>
						<p>Hiệu suất cao, thoải mái chơi game hết mức.</p>
						<div class="button"><span><a href="products.php">Chi tiết</a></span></div>
				   </div>
			   </div>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="products.php"><img src="images/sony.jpg" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Sony</h2>
						  <p>Chất lượng hình ảnh siêu mượt, giá cả phù hợp.</p>
						  <div class="button"><span><a href="products.php">Chi tiết</a></span></div>
					</div>
				</div>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<?php
						$getslider = $product->show_slider_on();
						if($getslider){
							while($result = $getslider->fetch_assoc()){

						?>
						<li><img src="admin/uploads/<?php echo $result['sliderImage'];?>" alt=""/></li>
						<?php
							}
						}
						?>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	