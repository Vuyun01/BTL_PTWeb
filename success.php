<?php
	require 'inc/header.php';
	// require 'inc/slider.php';
?>
<?php
	if(isset($_GET['orderid']) && $_GET['orderid'] != NULL){
		$cus_id = Session::get('customer_id');
        $insertOrder = $cart->insert_order($cus_id);
        $delCart = $cart->delAllcart();
        header('Location: success.php');
	}

	// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
	// 	$quantity = $_POST['quantity'];
	// 	$addtoCart = $cart->addToCart($quantity,$id);
	// }

?>
<style>
    .box_left{
        width: 60%;
        border: 1px solid #000;
        float: left;
        padding: 4px;
    }

    .box_right{
        width: 35%;
        border: 1px solid #000;
        float: right;
        padding: 4px;

    }

    a.order_product{
        padding: 15px 60px;
        background-color: red;
        font-size: 20px;
        color: #fff;
        cursor: pointer;
        border-radius: 10px;
        
    }
    .order_product:hover{
        opacity: 0.6;
    }

    h2.success{
        font-size: 40px;
        text-align: center;
        color: red;
    }
    p.text_inform{
        font-size: 20px;
        text-align: center;
        font-weight: bold;
    }
    .text_inform a:hover{
        opacity: 0.6;
    }

    .text_inform a{
        color: red;
    }

</style>
<form action="" method="post">
    <div class="main">
        <div class="content">
            <div class="section group">
                <h2 class="success">Đặt hàng thành công!</h2><br><br>
                <p class="text_inform">Chúng tôi sẽ liên hệ với bạn sớm nhất có thể. 
                    Bạn có thể kiểm tra hóa đơn của mình ở <a href="orderdetails.php">ĐÂY</a></p>
            </div>	
        </div>
        
    </div>
</form>
<?php
	require 'inc/footer.php';
 ?>