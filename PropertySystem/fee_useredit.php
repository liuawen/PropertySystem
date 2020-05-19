<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/home.css">
<link rel="stylesheet" href="css/head.css" />
<link rel="stylesheet" href="css/ps.css">
    <link rel="stylesheet" href="css/style.css">
<title>用户更新物业缴费信息</title>
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

<h2>编辑个人物业管理费明细</h2>

<?php
    //获取fee_id   GET
    $fee_id=$_GET['id'];
    //echo $id;
    require('conn.php');
    //echo $fee_id;

  //查询个人物业费资料

  $sql="SELECT * FROM fee_info WHERE fee_id = '$fee_id'";
  //$result=mysql_query($sql);
  //$rows=mysql_fetch_array($result);

  $rs=$pdo->query($sql);
  $result=$rs->fetch(PDO::FETCH_ASSOC);
?>

<fieldset>
	<legend>缴费资料</legend>
<form method="post" action="fee_userupdate.php">

<table>
  <div>
  <tr>
    <td>缴费ID：</td>
    <td><b><?php echo $result['fee_id']; ?></b></td>
    <input name="id" type="Hidden"  value="<?php echo $result['fee_id']; ?>">
  </tr>
  </div>
  <div>
  <tr>
  	<td>总的物业费:</td>
  	<td><b><?php echo $result['fee_totalcost']; ?></b></td>
  </tr>
  </div>


  <tr>
	<td>收费时间:</td>
	<td>
	    <b>
	        <?php echo $result['fee_chargetime']; ?>
	    </b>
    </td>
  </tr>
  <tr>
  <td>到期时间:</td>
  <td>
      <b>
          <?php echo $result['fee_duetime']; ?>
      </b>
    </td>
  </tr>
  <tr>
	<td>备注:</td>
	<td><input name="note" type="text"  style="width:300px"
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
<?php include('foot.php'); ?>
