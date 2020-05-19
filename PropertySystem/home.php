
<!-- 业主界面 -->
<?php
header("Content-type: text/html; charset=utf-8");
  /**************************************/
  /*		文件名：main_forum.php		*/
  /*		功能：用户主页面			*/
  /**************************************/
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/home.css">
<link rel="stylesheet" href="css/head.css" />
<link rel="stylesheet" href="css/ps.css">
 <link rel="stylesheet" href="css/style.css">
<title>用户主页面</title>
</head>
<body>
 <form action="/user/sign/in/action" method="post" autocomplete="off">

                    <div class="row">
                        <div>
                            <label> <i class="fa fa-user-o"></i> </label>
                            <span> <input type="text" name="loginName" placeholder="请输入登录名称" value="$!{loginName}"> </span>
                        </div>
                        <p> $!{loginNameError} </p>
                    </div>

                    <div class="row">
                        <div>
                            <label> <i class="fa fa-key"></i> </label>
                            <span> <input type="password" name="password" placeholder="请输入密码">  </span>
                        </div>
                        <p> $!{passwordError} </p>
                    </div>

                    <div class="captcha-row">
                        <div>
                            <span>  <input type="text" name="captcha" placeholder="请输入验证码">  </span>
                            <span>  <img src="/captcha/produce" >  </span>
                        </div>
                        <p>$!{captchaError}</p>
                    </div>

                    <div class="buttons">
                        <input type="reset" value="重置" >
                        <input type="submit" value="登录" >
                    </div>
                </form>
<?php
require('head.php');
?>
<?php
  $username=$_SESSION['username'];
  //echo $username;
  if (!$_SESSION['username']) {
	ExitMessage("请<b>登录</b>后执行该请求。", "login.html");
  }
  require('conn.php');
  $sql_id="select * from user_info where
    		     user_name='$username'";
  $rs_id=$pdo->query($sql_id);
  $result_id=$rs_id->fetch(PDO::FETCH_ASSOC);
  $user_id=$result_id['user_id'];
  $sql_fee="select * from fee_info where
                    fee_user_id='$user_id'";
  $rs_fee=$pdo->query($sql_fee);
  $result_fee=$rs_fee->fetch(PDO::FETCH_ASSOC);
  if(!$result_fee){?><h2 style="color:red;">用户，你好，你还没有管理费缴费明细账单,请联系管理员添加。</h2><?php
  }

?>
<div class="list">
<h2>物业管理费缴费明细</h2>

<table width="88%"  align="center"
	cellpadding="3" cellspacing="0" >
<tr bgcolor="#cc9">
<td width="8%" align="center" style="border:0;">缴费id</td>
<td width="8%" align="center" style="border:0;">用户名</td>
<td width="8%" align="center" style="border:0;">每个月的物业费</td>
<td width="8%" align="center" style="border:0;">交了几个月</td>
<td width="8%" align="center" style="border:0;">总物业费</td>
<td width="8%" align="center" style="border:0;">收费时间</td>
<td width="8%" align="center" style="border:0;">到期时间</td>
<td width="20%" align="center" style="border:0;">备注</td>
<td width="20%" align="center" style="border:0;">操作</td>
</tr>
<?php
  //循环输出输出记录列表
  //while($rows=mysql_fetch_array($result_fee))
  foreach ($pdo->query($sql_fee) as $value)
  {
?>
<tr bgcolor="#ffc">
    <td align="center">
       <?php
          echo $value['fee_id'];  //物业费
         ?>
    </td>

     <td align="center">
        <?php
            echo $username;  //用户名
            ?>
     </td>

     <td align="center">
           <?php
              echo $value['fee_cost'];  //物业费
                ?>
     </td>

     <td align="center">
         <?php
             echo $value['fee_times'];  //月份
               ?>
     <td align="center">
         <?php
             echo $value['fee_totalcost'];  //总的物业费
                ?>
     </td>

     <td align="center">
         <?php
             echo $value['fee_chargetime'];  //收费时间
          ?>
     </td>

      <td align="center">
        <?php
          echo $value['fee_duetime'];  //到期费时间
              ?>
           </td>
    <td align="center">
          <?php
             echo $value['fee_note'];  //备注
                 ?>
        </td>
    <td align="center"><a href="fee_useredit.php?id=<?=$value['fee_id']?>">修改</a>
    <a href="fee_del.php?id=<?=$value['fee_id']?>" onclick="return del_comfirm();">删除</a></td>
                </tr>

     <?php
       } //退出while循环
      ?>

       </table>
        </div>

<script>
function del_comfirm(){
                    if (confirm('是否确认删除？')) {
                        return true;
                    }else{
                        return false;
                    }
                }</script>


<?php
require('foot.php');
?>
