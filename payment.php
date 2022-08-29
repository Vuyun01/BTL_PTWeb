<?php
	require 'inc/header.php';
	// require 'inc/slider.php';
?>

<style>
    h3.payment {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    text-decoration: underline;
    }
    .wrapper_method {
    text-align: center;
    width: 550px;
    margin: 20px auto;
    border: 1px solid #666;
    padding: 20px;
    /* margin: 20px; */
    background: cornsilk;
    }
    .wrapper_method a {
    padding: 10px;
    background: red;
    color: #fff;
    
    }
    .wrapper_method h3 {
     margin-bottom: 20px;
    }
    .wrapper_method a:hover{
        opacity: 0.6;
    }
    .wrapper_method .back{
        background-color: #666;
        
    }

</style>


<?php

    // $login_check = Session::get('customer_login');
    // if(!$login_check){
    //     header('Location: login.php');
    // }

?>
 <div class="main">
    <div class="content">
    	<div class="section group">
            <div class="content_top">
                <div class="heading">
                    <h3>Thanh toán sản phẩm</h3>
                </div>
                <div class="clear"></div>
                <div class="wrapper_method">
                    <h3 class="payment">Chọn phương thức thanh toán</h3>
                    <a href="offlinepayment.php">Thanh toán trực tiếp</a>
                    <a href="onlinepayment.php">Thanh toán trực tuyến</a><br><br><br> 
                    <a href="cart.php" class="back">< Trở lại</a>
                </div>
            </div>
            
        </div>
	</div>
</div>

<?php
	require 'inc/footer.php';
?>