<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/product.php';?>
<?php include_once '../helper/format.php';?>

<?php 
	$pd = new product();
	$fm = new Format();
	if(isset($_GET['delid'])){
        $id = $_GET['delid'];
		$delProd  = $pd->del_product($id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách sản phẩm</h2>
        <div class="block">  
			<?php
			if(isset($delProd)){
				echo $delProd;
			}
			?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên</th>
					<th>Ảnh sản phẩm</th>
					<th>Giá</th>
					<th>Danh mục</th>
					<th>Thương hiệu</th>
					<th>Mô tả</th>
					<th>Kiểu</th>
					<th>Tùy chỉnh</th>
				</tr>
			</thead>
			<tbody>
				<?php
					
				$pdlist = $pd->show_product();
				if($pdlist){
					$i = 0;
					while($result = $pdlist->fetch_assoc()){
						$i++;
					
				?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['productName'];?></td>
					<td><img src="uploads/<?php echo $result['image'];?>" width="60px"></td>
					<td><?php echo $result['price'];?></td>
					<td><?php echo $result['catName'];?></td>
					<td><?php echo $result['brandName'];?></td>
					<td><?php echo $fm->textShorten($result['description'], 20);?></td>
					<td><?php 
						if($result['type'] == 0){
							echo "Nổi Bật";
						}else{
							echo "Phổ thông";
						}
					?></td>
					<td><a href="productedit.php?productid=<?php echo $result['productId'];?>">Sửa</a> || <a onclick="return confirm('Bạn muốn xóa mục này?')" href="?delid=<?php echo $result['productId']?>">Xóa</a></td>
				</tr>
				<?php
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
