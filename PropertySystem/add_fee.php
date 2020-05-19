<!-- 注册处理 -->
<?php
header("Content-type: text/html; charset=utf-8");
   /**********************************/
    /*	   文件名：add_fee.php		*/
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
<title>创建缴费处理</title>
</head>
<body>
<?php
require('head.php');
?>
<?php
  //取得提交的数据，并做清理
  //用户名
  require('conn.php');
  $id=trim($_POST['id']);//用户ID
  $cost=$_POST['cost'];
  $chargetime=$_POST['date'];
  $times=$_POST['times'];
  $note=$_POST['note'];
  $total=$cost * $times;

  //echo $note;
  $sql="insert into fee_info (fee_user_id,fee_cost,fee_times,fee_chargetime,fee_note,fee_totalcost) values ('{$id}','{$cost}','{$times}','{$chargetime}','{$note}','{$total}')";
    if($pdo -> exec($sql)){
     
    echo "缴费信息添加成功";
    //echo $pdo -> lastinsertid();
    $fee_id = $pdo -> lastinsertid();
    $sql = "update fee_info  set fee_duetime=date_add(fee_chargetime, interval {$times} MONTH) where fee_id= '{$fee_id}' ";
    $result = $pdo->exec($sql);//返回影响了多少行数据
   //echo $result;
    if($result){
            header('Location:list.php?');
    } else {
  //ExitMessage("记录不存在！");
    echo '<script>alert("添加失败");history.back();</script>';
                exit();
  }
}
    //$sql_id = "select max(fee_id) from fee_info";
     //$fee_id=$pdo->query($sql_id);
     //echo  fee_id; 
     //$result_id=$rs_id->fetch(PDO::FETCH_ASSOC);
     //echo $result_id;
     //$fee_id = $result_id['fee_id'];
    //echo fee_id;
    //header('Location:list.php?');
    

?>
