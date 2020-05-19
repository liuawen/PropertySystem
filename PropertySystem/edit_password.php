<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/home.css">
<link rel="stylesheet" href="css/head.css" />
<link rel="stylesheet" href="css/ps.css">
    <link rel="stylesheet" href="css/style.css">
<title>更新用户个人密码</title>
</head>
<?php

header("Content-type: text/html; charset=utf-8");
?>

<?php
/******************************************/
  /*		文件名：edit_password.php		*/
  /*		功能：用户密码修改页面		    */
  /******************************************/
require('head.php');

 //用户名
$username = $_SESSION['username'];
//如果用户没有登录
  if (!$_SESSION['username']) {
	ExitMessage("请<b>登录</b>后执行该请求。", "logon.html");
  }
?>


<div class="editUser">

<h2>更新密码</h2>

<?php
    require('conn.php');
  //查询用户资料
  $sql="SELECT * FROM user_info WHERE user_name = '$username'";
  //$result=mysql_query($sql);
  //$rows=mysql_fetch_array($result);

  $rs=$pdo->query($sql);
  $result=$rs->fetch(PDO::FETCH_ASSOC);
  //if($result){
  //echo "找到了";
  //}
?>
<fieldset>
	<legend>个人资料</legend>
<form method="post" action="update_password.php">

<table>
  <div>
  <tr>
    <td>用户ID：</td>
    <td><b><?php echo $result['user_id']; ?></b></td>
  </tr>
  </div>
  <div>

  <tr>
      <td>用户名称：</td>
      <td><b><?php echo $result['user_name']; ?></b></td>
    </tr>
  </div>
  <tr>

	<td>更新密码:</td
	><td><input name="password" type="password">
	密码留空，将不被更新。</td>
  </tr>  
</table>
<br><br>
<section class="button">
<input type="submit" name="submit" value="提交" class="button">
</section>
</form>
</fieldset>
</div>
<?php include('foot.php'); ?>
