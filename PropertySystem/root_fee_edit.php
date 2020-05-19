<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/home.css">
<link rel="stylesheet" href="css/head.css" />
<link rel="stylesheet" href="css/ps.css">
    <link rel="stylesheet" href="css/style.css">
<title>更新用户个人信息</title>
</head>
<?php

header("Content-type: text/html; charset=utf-8");
?>

<?php
/******************************************/
  /*		文件名：root_fee_edit .php		*/
  /*		功能：缴费修改页面		    */
  /******************************************/


 //用户名
  session_start();

$username = $_SESSION['username'];
//如果用户没有登录
  if (!$_SESSION['username']) {
	ExitMessage("请<b>登录</b>后执行该请求。", "logon.html");
  }
?>
<body style="background:url(images/bg.jpg) no-repeat;>

<div class="editUser">

<h2>编辑缴费信息</h2>
 <?php
    $id=$_GET['id'];
    require('conn.php');

    $sql="select * from fee_info where fee_id='{$id}'";
    $rs=$pdo->query($sql);
    $result=$rs->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<script>alert("没找到fee_id");history.back();</script>';
        exit();
    }
    $user_id=$result['fee_user_id'];
      //echo   $user_id;
    $sql_user="select * from user_info where
                        user_id='$user_id'";
    $rs_user=$pdo->query($sql_user);
      $result_user=$rs_user->fetch(PDO::FETCH_ASSOC);
    ?>


<fieldset>
	<legend>缴费信息</legend>
<form method="post" action="root_fee_update.php">
<table>
  <div>
  <tr>
    <td>缴费ID：</td>
    <td><b><?php echo $result['fee_id']; ?></b></td>
     <input name="id" type="hidden"  value="<?php echo $result['fee_id']; ?>">
  </tr>
  </div>
  <div>
  <tr>
      <td>用户名：</td>
      <td><b><?php echo $result_user['user_name']; ?></b></td>
    </tr>
  </div>

  <tr>
      <td>每月物业费:</td>
      <td><input name="cost" type="text"
           value="<?php echo $result['fee_cost'];?>"></td>
    </tr>

  <tr>
    <td>收费时间：</td>
    <td>
     <input name="date" type="date"  value="<?php echo $result['fee_chargetime']; ?>">
     </td>

  </tr>
  <tr>
    <td>缴费月数:</td>
      <td><input name="times" type="text"
            value="<?php echo $result['fee_times']; ?>" /></td>
  
  </tr>
  


  <tr>
	<td>备注:</td>
	<td><input name="note" style="width:400px"  type="text"
			value="<?php echo $result['fee_note']; ?>"></td>
  </tr>

</table>
<br><br>
<section class="button">
<input type="submit" name="submit" value="提交" class="button">
</section>
</form>
</fieldset>
</div>
</body>
</html>
