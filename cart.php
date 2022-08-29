<?php
	require 'inc/header.php';
	// require 'inc/slider.php';
?>

<?php
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
		$id = $_POST['Id'];
		$quantities = $_POST['quantities'];
        $update_quantity = $cart->update_quantity($quantities, $id);
	}

	if(isset($_GET['cartid'])){
		$id = $_GET['cartid'];
		// $sessionId = $_GET['sessId'];
		$deProdCart = $cart->del_cart($id);
	}
?>
<?php
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
	}

?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Giỏ hàng</h2>
					<?php
						if(isset($update_quantity)){
							echo $update_quantity;
						}
					?>
						<table class="tblone">
							<tr>
								<th width="20%">Tên</th>
								<th width="10%">Mục ảnh</th>
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Tổng giá</th>
								<th width="10%">Tùy chỉnh</th>
							</tr>
							<?php
								$get_cart = $cart->getProdCart();
								if($get_cart){
									$subtotal = 0;
									$num_products = 0;
									while($result = $get_cart->fetch_assoc()){
										
							?>
							<tr>
								<td><?php echo $result['productName']?></td>
								<td><img src="admin/uploads/<?php echo $result['image']?>" alt=""/></td>
								<td><?php echo $result['price']." Đ"?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="Id" value="<?php echo $result['Id']?>"/>
										<input type="number" name="quantities" min="1" value="<?php echo $result['quantity']?>"/>
										<input type="submit" name="submit" value="Cập nhật"/>
									</form>
								</td>
								<td>
								<?php 
									//total price
									$total = ($result['price'] * $result['quantity']);
									echo $total." Đ";
									

								?>
								</td>
								
								<td><a onclick="return confirm('Bạn muốn xóa mục này?')" href="?cartid=<?php echo $result['Id']?>">Xóa</a></td>
							</tr>
							<?php
								$subtotal += $total;
								$num_products += $result['quantity'];
									}
								}
							?>
							
						</table>
						<?php
							$check_cart = $cart->check_cart();
							if($check_cart){
								
						?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Tổng phụ: </th>
								<td>
									<?php 
									echo $subtotal." Đ";
									
									?>
									
								</td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Số lượng : </th>
								<td>
									<?php 
									echo $num_products;
									Session::set('quantity_prod',$num_products);
									?>
								</td>
							</tr>
							<tr>
								<th>Tổng:</th>
								<td><?php
									$vat = $subtotal * 0.1;
									$grandtotal = $subtotal + $vat;
									echo $grandtotal." Đ";
								?> </td>
							</tr>
					   </table>

						<?php
							}else{
								header('Location: emptyCart.php');
							}
						?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<?php
							$check_login_cus = Session::get('customer_login');
							if($check_login_cus){

						?>
							<div class="shopright">
								<a href="payment.php"> <img src="images/check.png" alt="" /></a>
							</div>
						<?php
							}else{

						?>
							<div class="shopright">
								<a href="login.php"> <img src="images/check.png" alt="" /></a>
							</div>
						<?php
							}
						?>
						
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 
 <?php
	require 'inc/footer.php';
 ?>

