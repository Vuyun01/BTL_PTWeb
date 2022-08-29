<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/user.php'?>

<?php
    $changepass = new user();
    $id = Session::get('adminId');
    $pass = Session::get('adminPass');

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
        $updatePass  = $changepass->update_pass($_POST, $pass, $id);
	}
?>

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Đổi mật khẩu</h2>
        <div class="block">     
        <?php
            if(isset($updatePass)){
                echo $updatePass;
            }
        ?>          
         <form action="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <label>Mật khẩu cũ</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Nhập mật khẩu CŨ..."  name="oldpass" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Mật khẩu mới</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Nhập mật khẩu MỚI..." name="newpass" class="medium" />
                    </td>
                </tr>
				 
				
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Cập nhật" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>