<?php
	require 'inc/header.php';
	// require 'inc/slider.php';
?>
<?php
	
    $login_check = Session::get('customer_login');
    if(!$login_check){
        header('Location: login.php');
    }
?>

<?php
    $id = Session::get('customer_id');
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])){
        $updateProfile  = $cus->update_profile($_POST, $id);
	}
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
            <div class="content_top">
            
                <div class="heading">
                    <h3>Thông tin khách hàng</h3>
                </div>
                <div class="clear"></div>
            </div>
            <form action="" method="post">
                <table class="tblone">
                    <?php
                        $get_cus = $cus->show_customer($id);
                        if($get_cus){
                            while($result = $get_cus->fetch_assoc()){

                    ?>
                    <tr>
                        <td>Tên</td>
                        <td><input type="text" name="name" value="<?php echo $result['name']?>"></td>
                        
                    </tr>
                    
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email" value="<?php echo $result['email']?>"></td>
                    </tr>
                    
                    <tr>
                        <td>Số điện thoại</td>
                        <td><input type="text" name="phone" value="<?php echo $result['phone']?>"></td>
                    </tr>
                    
                    <tr>
                        <td>Thành phố</td>
                        <td><input type="text" name="city" value="<?php echo $result['city']?>"></td>
                    </tr>

                    <tr>
                        <td>Địa chỉ</td>
                        <td><input type="text" name="address" value="<?php echo $result['address']?>"></td>
                    </tr>

                    <tr>
                        <td>Zipcode</td>
                        <td><input type="text" name="zipcode" value="<?php echo $result['zipcode']?>"></td>
                    </tr>
                    
                    <tr>
                    <!-- <input type="submit" name="save" value="  Save  " class="grey"> -->
                        <td colspan="1"><button name="save">Lưu Thông Tin</button></td>
                    </tr>
                

                    <?php
                            }
                        }
                    ?>

                </table>
            </form>
            <?php
            if(isset($updateProfile)){
                echo $updateProfile;
                    
            }
            
            ?>
        </div>
	</div>
</div>

<?php
	require 'inc/footer.php';
?>