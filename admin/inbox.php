<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/inbox.php';?>
<?php include_once '../helper/format.php';?>

<?php
	$fm = new Format();
	$inbox = new inbox();
	if(isset($_GET['delid'])){
		$id = $_GET['delid'];
		$delInbox  = $inbox->del_inbox($id);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Hòm thư</h2>
                <div class="block">   
				<?php
                    if(isset($delInbox)){
                        echo $delInbox;
                    }
                
                ?>      
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên</th>
							<th>Email</th>
							<th>Nội dung</th>
							<th>Tùy chỉnh</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$showInbox = $inbox->show_inbox();
							if($showInbox){
								$i = 0;
								while($result = $showInbox->fetch_assoc()){

							
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['name']?></td>
							<td><?php echo $result['email']?></td>
							<td><?php echo $fm->textShorten($result['content'], 100)?></td>
							<td><a href="?delid=<?php echo $result['Id']?>">Xóa</a></td>
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
