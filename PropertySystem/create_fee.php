<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/home.css">
<link rel="stylesheet" href="css/head.css" />
<link rel="stylesheet" href="css/ps.css">
    <link rel="stylesheet" href="css/style.css">
<title>创建缴费页面	</title>
</head>
<?php

header("Content-type: text/html; charset=utf-8");
?>




<body style="background:url(images/bg.jpg) no-repeat;">
<div class="editUser">
<h2>创建缴费信息</h2>
<fieldset>
	<legend>缴费信息</legend>
<form method="post" action="add_fee.php">
<table>
  <div>
  </div>
  <div>
  <tr>
      <td>用户ID:</td>
          	<td><input name="id" type="text"
          			 value=""></td>
    </tr>
  </div>
  <tr>
    	<td>每月物业费:</td>
    	<td><input name="cost" type="text"
    			 value=""></td>
  </tr>
  <tr>
      <td>缴费时间:</td>
      <td><input name="date" type="date"
            /></td>
  </tr>

  <tr>
      <td>缴费月数:</td>
      <td><input name="times" type="text"
            /></td>
  </tr>

  <tr>
  
	<td>备注:</td>
	<td><input name="note" style="width:400px"  type="text"
			value=""></td>
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
