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
  /*		文件名：edit_profile.php		*/
  /*		功能：业主资料修改页面		    */
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

<h2>编辑个人资料</h2>

<?php
    require('conn.php');
  //查询用户资料
  $sql="SELECT * FROM user_info WHERE user_name = '$username'";
  //$result=mysql_query($sql);
  //$rows=mysql_fetch_array($result);

  $rs=$pdo->query($sql);
  $result=$rs->fetch(PDO::FETCH_ASSOC);
?>

<fieldset>
	<legend>个人资料</legend>
<form method="post" action="update_profile.php">

<table>
  <div>
  <tr>
    <td>用户ID：</td>
    <td><b><?php echo $result['user_id']; ?></b></td>
  </tr>
  </div>
  <div>
  <tr>
  	<td>用户名称:</td>
  	<td><input name="username" type="text"
  			 value="<?php echo $result['user_name']; ?>"></td>
  </tr>
  </div>

  <?php    if($result['user_gender']=='男'){
    ?> <tr>
       <td>性&nbsp;&nbsp;&nbsp;别：</td>
       <td><input name="gender" type="radio" value="男" checked>男
       <input name="gender" type="radio" value="女" >女
       </td>
        </tr>
 <?php } else{  ?> <tr>
                    <td>性&nbsp;&nbsp;&nbsp;别：</td>
                    <td><input name="gender" type="radio" value="男" >男
                    <input name="gender" type="radio" value="女" checked>女
                    </td>
                     </tr>
          <?php } ?>



  <tr>
	<td>联系电话:</td>
	<td><input name="phone" type="text"
			value="<?php echo $result['user_phonenumber']; ?>"></td>
  </tr>
  <tr>
	<td>住房地址:</td>
	<td><input name="address" type="text"  style="width:300px"
			 value="<?php echo $result['user_address']; ?>"></td>
  </tr>
</table>
<br><br>
<section class="button">
<input type="submit" name="submit" value="提交" class="button">
</section>
</form>
</fieldset>
</div>
<?php
require('foot.php');
?><?php require('foot.php'); ?>
