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
</style>
<form action="" method="post">
    <div class="main">
        <div class="content">
            <div class="section group">
                <div class="heading">
                    <h3>Thanh toán trực tiếp</h3>
                </div>
                <div class="clear"></div>
                <div class="box_left">
                    <div class="cartpage">
                    
                            <table class="tblone">
                                <tr>
                                    <th width="5%">STT</th>
                                    <th width="20%">Tên</th>
                                    <th width="20%">Giá</th>
                                    <th width="15%">Số lượng</th>
                                    <th width="20%">Tổng giá</th>
                                </tr>
                                <?php
                                    $get_cart = $cart->getProdCart();
                                    if($get_cart){
                                        $subtotal = 0;
                                        $num_products = 0;
                                        $i=0;
                                        while($result = $get_cart->fetch_assoc()){
                                            $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i?></td>
                                    <td><?php echo $result['productName']?></td>
                                    <td><?php echo $result['price']." Đ"?></td>
                                    <td>
                                        <?php echo $result['quantity']?>
                                    </td>
                                    <td>
                                    <?php 
                                        //total price
                                        $total = ($result['price'] * $result['quantity']);
                                        echo $total." Đ";
                                        

                                    ?>
                                    
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
                            <table style="float:right;text-align:left;margin:40px 0 10px;" width="40%">
                                <tr>
                                    <th>Tổng phụ : </th>
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
                                    <th>Tổng :</th>
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
                    </div>
                <div class="box_right">
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
        <!-- <input type="submit" class="order_product" value="Order" name="order"> -->
        <a href="?orderid=order" class="order_product">Đặt hàng ngay</a><br><br><br>
    </div>
</form>
<?php
	require 'inc/footer.php';
 ?>