<?php
	require 'inc/header.php';
	require 'inc/slider.php';
?>


<?php
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
		$insertInfo  = $inbox->insert_inbox($_POST);
	}

?>
 <div class="main">
    <div class="content">
    	<div class="support">
  			<div class="support_desc">
  				<h3>Hỗ trợ trực tuyến</h3>
  				<p><span>24 giờ | 7 ngày một tuần | 365 ngày một năm &nbsp;&nbsp; Dịch vụ hỗ trợ kỹ thuật trực tuyến</span></p>
  				<p> Chúng tôi luôn đặt dịch vụ khách hàng lên hàng đầu. Nhằm cải thiện dịch vụ tốt hơn,
					   việc triển khai hỗ trợ kỹ thuật trực tuyến là điểu cần thiết,
					    giúp cho khách hàng yên tâm sử dụng sản phẩm của chúng tôi </p>
  			</div>
  				<img src="web/images/contact.png" alt="" />
  			<div class="clear"></div>
  		</div>
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Liên hệ với chúng tôi</h2>
					    <form action="" method="post">
					    	<div>
						    	<span><label>TÊN</label></span>
						    	<span><input name="name" type="text"></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input name="email" type="text" ></span>
						    </div>
						    <div>
						     	<span><label>SỐ ĐIỆN THOẠI</label></span>
						    	<span><input name="phone" type="text" ></span>
						    </div>
						    <div>
						    	<span><label>NỘI DUNG</label></span>
						    	<span><textarea name="content"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" name="submit" value="GỬI"></span>
						  </div>
					    </form>
						<?php
							if(isset($insertInfo)){
								echo $insertInfo;
							}
						?>
				  </div>
  				</div>
				<div class="col span_1_of_3">
      			<div class="company_address">
				     	<h2>Thông tin về công ty :</h2>
						    	<p>Địa chỉ 1: 132 Gia Trung, Mê Linh, Hà Nội</p>
						   		<p>Địa chỉ 2: 28 Quận 7, Tp.HCM</p>
				   		<p>SDT: (84) 222 666 444</p>
				   		<p>Fax: (29) 111 22 52 4</p>
				 	 	<p>Email: <span>info@mycompany.com</span></p>
				   		<p>Theo dõi trên: <span>Facebook</span>, <span>Twitter</span></p>
				   </div>
				 </div>
			  </div>    	
    </div>
 </div>
 <?php
	require 'inc/footer.php';
 ?>
