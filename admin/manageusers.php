<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/user.php';?>

<?php $user = new user();?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Quản lý người dùng</h2>
                <div class="block">   
				     
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên</th>
							<th>Email</th>
							<th>Số điện thoại</th>
							<th>Địa chỉ</th>
							<th>Thành phố</th>

						</tr>
					</thead>
					<tbody>
						<?php
							$showuser = $user->show_user();
							if($showuser){
								$i = 0;
								while($result = $showuser->fetch_assoc()){

							
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['name']?></td>
							<td><?php echo $result['email']?></td>
							<td><?php echo $result['phone']?></td>
							<td><?php echo $result['address']?></td>
							<td><?php echo $result['city']?></td>
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
