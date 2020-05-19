<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/home.css">
<link rel="stylesheet" href="css/head.css" />
<link rel="stylesheet" href="css/ps.css">
 <link rel="stylesheet" href="css/style.css">
<title>用户更新缴费信息</title>
</head>
    <body style="background:url(images/bg.jpg) no-repeat;">
<?php

header('Content-type:text/html;charset=utf-8');
//$note=($_POST['note']);
//echo $note;
//$id=$_POST['id'];
//echo $id;
require('conn.php');
$id=trim($_POST['id']);//用户ID
$cost=$_POST['cost'];
$chargetime=$_POST['date'];
$times=$_POST['times'];
$note=$_POST['note'];
$total=$cost * $times;
#$sql="select * from user_info where user_name='{$username}' and user_id!={$id}";
/*$sql="select * from fee_info where fee_id={$id}";
$rs=$pdo->query($sql);
$result=$rs->fetch(PDO::FETCH_ASSOC);
if (!$result) {
    echo '<script>alert("fee_id没找到");history.back();</script>';
    exit();
}*/
$sql="update fee_info set fee_note='{$note}',fee_cost='{$cost}',fee_chargetime='{$chargetime}',fee_times='{$times}',fee_totalcost='{$total}'
                                where fee_id={$id}";
$result = $pdo->exec($sql);//返回影响了多少行数据
$sql1 = "update fee_info  set fee_duetime=date_add(fee_chargetime, interval {$times} MONTH) where fee_id= '{$id}' ";
$result1 = $pdo->exec($sql1);//返回影响了多少行数据
   //echo $result;
if($result){
?>
<div class="updateUser">
<h2>物业管理费信息更新成功</h2>
<p>
	您的物业管理费已经被成功更新。
	请<a href="list.php">返回</a>管理员添加。
</p>
</div>
<?php
  }
  else {
	//ExitMessage("记录不存在！");
	echo '<script>alert("传入数据不需要更新，或更新失败");history.back();</script>';
                exit();
  }
?>

