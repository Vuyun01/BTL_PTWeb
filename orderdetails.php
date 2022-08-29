<?php
	require 'inc/header.php';
	// require 'inc/slider.php';
?>
<?php
    $cus_id = Session::get('customer_id');
    if(!$cus_id){
        header('Location: login.php');
    }

    if(isset($_GET['receiveId'])){
		$id = $_GET['receiveId'];
		$changeStatus  = $cart->update_status_process($id);
        
	}

?>
<style>
    .box_left{
        width: 100%;
        border: 1px solid #000;
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

    <div class="main">
        <div class="content">
            <div class="section group">
                <div class="heading">
                    <h3>Thông tin hóa đơn</h3>
                </div>
                <div class="clear"></div>
                <?php
                    // $cus_id = Session::get('customer_id');
                    
                    $check_order_details = $cart->check_order($cus_id);
                    if(!$check_order_details){
                        header('Location: emptyOrderDetails.php');
                    }else{
                ?>
                <div class="box_left">
                    <div class="cartpage">
                    
                            <table class="tblone">
                                <tr>
                                    <th width="5%">STT</th>
                                    <th width="20%">Tên</th>
                                    <th width="10%">Mục ảnh</th>
                                    <th width="10%">Số lượng</th>
                                    <th width="20%">Giá</th>
                                    <th width="20%">Ngày đặt hàng</th>
                                    <th width="15%">Trạng thái</th>

                                </tr>
                                <?php
                                $cus_id = Session::get("customer_id");
                                $get_cart_order = $cart->getOrderdetails($cus_id);
                                if($get_cart_order){
                                    $i=0;
                                    while($result = $get_cart_order->fetch_assoc()){
                                        $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i?></td>
                                    <td><?php echo $result['productName']?></td>
                                    <td><img src="admin/uploads/<?php echo $result['image']?>"></td>
                                    <td><?php echo $result['price']." Đ"?></td>
                                    <td><?php echo $result['quantity']?></td>
                                    <td><?php echo $fm->formatDate($result['date']) ?></td>
                                    <td>
                                        <?php
                                        $status = $result['status'];
                                        if($status == 0){
                                            echo "Đang xử lý";
                                        }else if($status == 1){    
                                        ?>
                                            <a href="?receiveId=<?php echo $result['Id']?>">Đang giao hàng</a>
                                        <?php
                                        }else{
                                            echo "Đã nhận hàng";
                                        }
                                        ?>

                                    </td>
                                </tr>
                                <?php
                                    
                                    }
                                }
                                ?>
                                
                            </table> 
                        </div>
                    </div>
                
                <?php
                }
                ?>
            </div>	
            
        </div>
        
    </div>

<?php
	require 'inc/footer.php';
 ?>