<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';?>
<?php
	$product = new product();
	if(isset($_GET['modeid']) && isset($_GET['type'])){
		$id = $_GET['modeid'];
		$type = $_GET['type'];
		$update_slider = $product->update_slider($id, $type);
	}

	if(isset($_GET['delid']) ){
		$id = $_GET['delid'];
		$delSlider = $product->del_slider($id);
	}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách Slider</h2>
        <div class="block">  
			<?php
				if(isset($delSlider)){
					echo $delSlider;
				}
			?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tiêu đề</th>
					<th>Mục ảnh</th>
					<th>Trạng thái</th>
					<th>Tùy chỉnh</th>
				</tr>
			</thead>
			<tbody>
			<?php
			
				$getslider = $product->show_slider();
				if($getslider){
					$i = 0;
					while($result = $getslider->fetch_assoc()){

			?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['sliderName']?></td>
					<td><img src="uploads/<?php echo $result['sliderImage']?>" height="120px" width="300px"/></td>	
					<td>
						<?php
						if($result['type'] == 1){
						?>
							<a href="?modeid=<?php echo $result['sliderId']?>&type=0" >On</a>
						<?php
						}else{
						?>
							<a href="?modeid=<?php echo $result['sliderId']?>&type=1" >Off</a>
						<?php
						}
						
						?>
					</td>
					<td>
						<a href="?delid=<?php echo $result['sliderId']?>" onclick="return confirm('Bạn muốn xóa mục này?');">Xóa</a>
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
