<?php
require('check_login.php');
//echo "<p>{$_SESSION['username']}，你好！<a href='logout.php'>注销</a></p>"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>业主信息修改</title>
	<style>
		.biao{
			position: relative;
			left: 550px;
			font-size: 20px;
			font-weight: bold;
		}
		body{
			background-image: url();
			background-size: 100%;
			/*color:white;*/
		}
		.user{
			margin-left: 20px;
		}
		.gender{
			margin-left: 40px;
		}
		.iphone{
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
	 <p class ="p1" style=" font-size: 25px;  text-align: center;"><?=$_SESSION['username']?>，你好！<a href='logout.php' style=" text-decoration: none; text-align: center; font-size: 22px; color:blue">注销</a></p>

    <h3 style="text-align: center; font-size: 30px;margin-left: -120px">用户信息修改</h3>
    <?php
    $id=$_GET['id'];
    require('conn.php');
    
    $sql="select * from user_info where user_id='{$id}'";
    $rs=$pdo->query($sql);
    $result=$rs->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<script>alert("没找到业主");history.back();</script>';
        exit();
    }
    ?>
	<div class="biao">
    <form action="root_user_update.php" method="post">

        <p>
            <input type="hidden" name="id" value="<?=$result['user_id']?>" />
            <label for="username">用户名</label>
            <input type="text" name="username" placeholder="用户名" value="<?=$result['user_name']?>" class="user">
        </p>
        <p>
                    <label for="password">密码</label>
                    <input type="text" name="password" placeholder="业主密码" value="<?=$result['user_password']?>" class="gender">
                </p>
        <p>
            <label for="gender">性别</label>
            <input type="text" name="gender" placeholder="性别" value="<?=$result['user_gender']?>" class="gender">
        </p>
        <p>
            <label for="user_phonenumber">电话号码</label>
            <input type="text" name="phonenumber" value="<?=$result['user_phonenumber']?>">

        </p>
        <p>
                    <label for="user_address">住房入住地址</label>
                    <input width="400px" ;type="text" name="address" value="<?=$result['user_address']?>">

        </p>
			 <button type="submit" class="update">修改</button>
    </form>
	</div>
</body>
</html>