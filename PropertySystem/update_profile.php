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
require('head.php');
?>
<?php

  /**************************************/
  /*		文件名：update_profile.php	*/
  /*		功能：用户资料修改页面		*/
  /**************************************/
  //session_start();// Notice:  A session had already been started - ignoring session_start()

  $username1=$_SESSION['username'];
  if (!$_SESSION['username']) {
	ExitMessage("请<b>登录</b>后执行该请求。", "login.php");
  }

  require('conn.php');
  $sql_id="select * from user_info where
    		     user_name='$username1'";
  //echo $sql_id;
  $rs_id=$pdo->query($sql_id);
  $result_id=$rs_id->fetch(PDO::FETCH_ASSOC);
  $id=$result_id['user_id'];
  //echo "id:" + $id;
  //用户名
  $username=$_POST['username'];
  //echo $username;
  //联系电话

  $phone=$_POST["phone"];
  //echo $phone;
  //性别
  $gender=$_POST["gender"];
  //地址
  $address=$_POST["address"];
   ;
  $sql="UPDATE user_info
			SET
			user_phonenumber='$phone',user_name='$username',user_gender='$gender',user_address='$address'
		    WHERE user_id = '$id'";
  //echo $sql;
  //$rs=$pdo->query($sql);
  //$result=$rs->fetch(PDO::FETCH_ASSOC);
   //$result=mysql_query($sql);
   $result = $pdo->exec($sql);//返回影响了多少行数据
   echo $result;
if($result){
    if($username1 == $username){?>
<div class="updateUser">
<h2>个人资料更新成功</h2>
<p>
	您的个人资料已经被成功更新。
	请<a href="home.php">返回</a>用户主页。
</p>
</div>
<?php
} else{
?>
<div class="updateUser">
<h2>用户名称更新成功</h2>
<p>
	您的个人信息已经被成功更新。
	请<a href="login.html">返回</a>用户登录页面。
</p>
</div>
<?php  } ?>

<?php
  }
  else {
	//ExitMessage("记录不存在！");
	echo '<script>alert("传入数据不需要更新，或更新失败");history.back();</script>';
                exit();
  }
include ('foot.php');
?>
