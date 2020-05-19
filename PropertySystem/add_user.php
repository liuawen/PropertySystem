<!-- 注册处理 -->
<?php
header("Content-type: text/html; charset=utf-8");
   /**********************************/
    /*	   文件名：add_user.php		*/
    /*	   功能：添加注册用户记录	*/
    /**********************************/
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="css/head.css" />
<link rel="stylesheet" href="css/ps.css">
 <link rel="stylesheet" href="css/style.css">
<title>注册处理</title>
</head>
<body>
<?php
require('head.php');
?>
<?php
  //取得提交的数据，并做清理
  //用户名
  require('conn.php');
  $username=trim($_POST['username']);//用户名
  $pwd=trim($_POST['pwd']);//用户密码
  echo $pwd;
  $sql="select * from user_info where user_name='{$username}'";
    $rs=$pdo->query($sql);
    $result=$rs->fetch(PDO::FETCH_ASSOC);
    if ($result) {
    echo '<script>alert("用户名已存在");history.back();</script>';
    exit();
    }
    $sql="insert into user_info (user_name,user_password) values ('{$username}','{$pwd}')";
    if($pdo -> exec($sql)){
    echo "业主信息注册成功";
    echo $pdo -> lastinsertid();
    header('Location:login.html?');
    }

?>
