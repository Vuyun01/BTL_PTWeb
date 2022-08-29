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
 <div class="main">
    <div class="content">
    	<div class="section group">
            <div class="content_top">
                <div class="heading">
                    <h3>Thông tin khách hàng</h3>
                </div>
                <div class="clear"></div>
            </div>
            <table class="tblone">
                <?php
                    $id = Session::get('customer_id');
                    $get_cus = $cus->show_customer($id);
                    if($get_cus){
                        while($result = $get_cus->fetch_assoc()){

                ?>
                <tr>
                    <td>Tên</td>
                    <td><?php echo $result['name']?></td>
                </tr>
                
                <tr>
                    <td>Email</td>
                    <td><?php echo $result['email']?></td>
                </tr>
                
                <tr>
                    <td>Số điện thoại</td>
                    <td><?php echo $result['phone']?></td>
                </tr>
                
                <tr>
                    <td>Thành phố</td>
                    <td><?php echo $result['city']?></td>
                </tr>

                <tr>
                    <td>Địa chỉ</td>
                    <td><?php echo $result['address']?></td>
                </tr>

                <tr>
                    <td>Zipcode</td>
                    <td><?php echo $result['zipcode']?></td>
                </tr>
                
                <tr>
                    <td colspan="1"><a href="editprofile.php">Cập nhật thông tin</a></td>
                </tr>

                <?php
                        }
                    }
                ?>
            </table>
        </div>
	</div>
</div>

<?php
	require 'inc/footer.php';
?>