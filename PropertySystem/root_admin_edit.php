<?php
require('check_login.php');
// echo "<p>{$_SESSION['username']}，你好！<a href='logout.php'>注销</a></p>"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户信息修改</title>
	<style>
		body{
            background-image: url();
            background-size: 100%;

        }
		.biao{
			position: relative;
			left: 550px;
			font-size: 20px;
			font-weight: bold;
		}
		.user{
			margin-left: 20px;
		}
		.psssoword{
		margin-left: 40px;
		}

		.update{
			font-size: 20px;
			margin-left: 110px;
			font-weight: bold;
		}


	</style>
</head>
<body style="background:url(images/bg.jpg) no-repeat;>
     <p class ="p1" style=" font-size: 25px; color:balck; text-align: center;"><?=$_SESSION['username']?>，你好！<a href='logout.php' style=" text-decoration: none; text-align: center; font-size: 22px; ">注销</a></p>
    <h3 style="text-align: center;font-size: 30px;margin-left: -120px">管理员信息修改</h3>
    <?php
    $id=$_GET['id'];
    require('conn.php');
    
    $sql="select * from admin_info where admin_id='{$id}'";
    $rs=$pdo->query($sql);
    $result=$rs->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<script>alert("没找到用户");history.back();</script>';
        exit();
    }
    ?>
	<div class="biao">
    <form action="root_admin_update.php" method="post">

      <p>
                  <label for="id">管理员ID:</label>
                  &nbsp<b><?php echo $result['admin_id']; ?></b>


        <p>
            <label for="username">用户名</label>
            <input type="hidden" name="id" value="<?=$result['admin_id']?>">
            <input type="text" name="username" placeholder="管理员名" value="<?=$result['admin_name']?>" class="user">
        </p>
         <p>
           <label for="password">密码</label>

           <input type="text" name="password" placeholder="密码" value="<?=$result['admin_password']?>" class="password">
         </p>

			<button type="submit" class="update">修改</button>
    </form>
	</div>
</body>
</html>