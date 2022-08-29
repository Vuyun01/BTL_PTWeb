<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/cart.php';?>
<?php include_once '../helper/format.php';?>

<?php
	$fm = new Format();
	$cart = new cart();

	if(isset($_GET['deleteid'])){
		$id = $_GET['deleteid'];
		$changeStatus  = $cart->update_status_del($id);
	}
	if(isset($_GET['orderid'])){
		$id = $_GET['orderid'];
		$changeStatus  = $cart->update_status($id);
	}
	
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Quản lý đơn hàng</h2>
                <div class="block">   
				    
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Ngày đặt hàng</th>
							<th>Mục ảnh</th>
							<th>Sản phẩm</th>
							<th>Số lượng</th>
							<th>Tổng giá</th>
							<th>Trạng thái</th>

						</tr>
					</thead>
					<tbody>
						<?php
							$showOrder = $cart->getAllOrder();
							if($showOrder){
								$i = 0;
								while($result_order = $showOrder->fetch_assoc()){

							
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $fm->formatDate($result_order['date'])?></td>
							<td><img src="uploads/<?php echo $result_order['image']?>" width="40px" height="40px"></td>
							<td><?php echo $result_order['productName']?></td>
							<td><?php echo $result_order['quantity'] ?></td>
							<td><?php echo $result_order['price']." Đ" ?></td>
							<td>
                                <?php
                                if($result_order['status']==0){
                                ?>
                                    <a href="?orderid=<?php echo $result_order['Id']?>">
									Đang xử lý</a>
                                <?php
                                }else if($result_order['status']==1){
									echo "Đã xác nhận";
								}else{
								?>
									<a href="?deleteid=<?php echo $result_order['Id']?>">Xóa</a>
								<?php
								}
								?>
                            </td>
							
						</tr>
						<?php
							$i++;
							}
						}
						?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
