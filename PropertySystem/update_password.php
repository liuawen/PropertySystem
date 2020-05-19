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

  $username=$_SESSION['username'];
  if (!$_SESSION['username']) {
	ExitMessage("请<b>登录</b>后执行该请求。", "logon.php");
  }





  require('conn.php');
  $sql_id="select * from user_info where
    		     user_name='$username'";
  //echo $sql_id;
  $rs_id=$pdo->query($sql_id);
  $result_id=$rs_id->fetch(PDO::FETCH_ASSOC);
  $id=$result_id['user_id'];
  //echo "id:" + $id;
  //用户名
  $username=$_SESSION['username'];
  //echo $username;
  //用户密码
  $password=$_POST['password'];
if (!$password)
  {
	//如果密码为空，则密码项不予更新
	echo '<script>alert("密码没更新");history.back();</script>';
                    exit();
	$sql="UPDATE forum user_info SET user_name = '$username' WHERE user_id = '$id'";
  } else {
	//如果输入了新的密码，则密码项也予以更新
	$password = $password;
	$sql="UPDATE user_info
			SET user_password = '$password',
                user_name = '$username'
		  WHERE user_id = '$id'";
  }

  //$result=mysql_query($sql);
   $result = $pdo->exec($sql);//返回影响了多少行数据
  if($result){
?>
<div class="updateUser">
<h2>个人密码更新成功</h2>
<p>
	你的密码已经被成功更新。
	请<a href="home.php">返回</a>用户主页。
</p>
</div>
<?php
  }
  else {
	//ExitMessage("记录不存在！");
	echo '<script>alert("传入数据不需要更新，或更新失败");history.back();</script>';
                exit();
  }
include ('foot.php');
?>


  //echo $sql;
  //$rs=$pdo->query($sql);
  //$result=$rs->fetch(PDO::FETCH_ASSOC);
   //$result=mysql_query($sql);

   //echo $result;




