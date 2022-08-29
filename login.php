<?php
	require 'inc/header.php';
	// require 'inc/slider.php';
?>


<?php
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
		$insertCustomer  = $cus->insert_customer($_POST);
	}
?>

<?php
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])){
		$loginCustomer  = $cus->login_customer($_POST);
		
	}
?>

<?php
	$login_check = Session::get('customer_login');
	if($login_check){
		header('Location: cart.php');

	}
?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Khách hàng đã đăng kí tài khoản</h3>
        	<p>Điền thông tin vào form để đăng nhập.</p>
			<?php
				if(isset($loginCustomer)){
					echo $loginCustomer;
				}
			?>
        	<form action="" method="post">
                	<input name="email" type="text" class="field" placeholder="Email">
                    <input name="password" type="password" class="field" placeholder="Mật khẩu">
					<p class="note">Nếu bạn quên mật khẩu thì bấm vào <a href="#">ĐÂY</a> để lấy lại mật khẩu</p>
                    <div class="buttons"><div><button class="grey" name="login">Đăng Nhập</button></div></div>
				</div>
			</form>
    	<div class="register_account">
    		<h3>Đăng kí tài khoản</h3>
			<?php
				if(isset($insertCustomer)){
					echo $insertCustomer;
				}
			?>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name"  placeholder="Tên">
							</div>
							
							<div>
							   <input type="text" name="city"  placeholder="Thành phố">
							</div>
							
							<div>
								<input type="text" name="zipcode" placeholder="Zipcode">
							</div>
							<div>
								<input type="text" name="email" placeholder="Email">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Địa chỉ">
						</div>
		    		<div>
						<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
							<option value="null">Chọn một quốc gia</option>         
							<option value="US">USA</option>
							<option value="AR">Argentina</option>
							<option value="EN">England</option>
							<option value="AU">Australia</option>
							<option value="VN">VietNam</option>
							<option value="CN">China</option>
							<option value="JP">Japan</option>
							<option value="KR">Korean</option>

		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone"  placeholder="Số diện thoại">
		          </div>
				  
				  <div>
					<input type="text" name="password"  placeholder="Mật khẩu">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey" name="submit">Tạo tài khoản</button></div></div>
		    <p class="terms">Ấn 'tạo tài khoản' có nghĩa bạn đồng ý với <a href="#">các điều khoản &amp; điều kiện </a>của chúng tôi.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 
 <?php
	require 'inc/footer.php';
 ?>

