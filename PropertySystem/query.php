
<!-- 查询界面 -->
<?php
header("Content-type: text/html; charset=utf-8");
  /**************************************/
  /*		文件名：query.php		*/
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
<title>查询</title>
</head>
<body style="background:url(images/bg.jpg) no-repeat; ">
<h1 align="center">查询结果<a href="list.php" style="font-size:40px; color:blue;">返回</a></h1>
<?php
//$sql="select * from fee_info";
//$rs_fee=$pdo->query($sql_fee);
  //$result_fee=$rs_fee->fetch(PDO::FETCH_ASSOC);




  //$username=$_SESSION['username'];
  //echo $username;
  //if (!$_SESSION['username']) {
	//ExitMessage("请<b>登录</b>后执行该请求。", "login.html");
  //}


  //$sql_id="select * from user_info where
   //user_name='$username'";
  //echo $sql_id;
  //$rs_id=$pdo->query($sql_id);
  //$result_id=$rs_id->fetch(PDO::FETCH_ASSOC);
  //$user_id=$result_id['user_id'];
  require('conn.php');
  $keyword=trim($_GET['keyword']);
  $sel=$_GET['sel'];

  //echo $sel;
 // $user_id = $sel;
 //   $user_id = $keyword;
    //echo $user_id;
  //echo   $user_id;
  /*
  <select name="sel">
              <option value="user_id">业主ID</option>
              <option value="user_name">业主姓名</option>
              <option value="fee_id">缴费ID</option>
              <option value="user_address">用户地址</option>
              </select>
  */
  $flag = false;
  if($sel=="user_id"){
  $flag = true;
  $user_id=$keyword;
  $sql="select * from fee_info where fee_user_id='{$user_id}'";
  }
  elseif($sel=="fee_id"){
  $flag = true;
  $fee_id=$keyword;
  $sql="select * from fee_info where fee_id='{$fee_id}'";
  }
  elseif($sel=="user_name"){
  $user_name=$keyword;
    $sql="select * from user_info where user_name like '%{$user_name}%'";
  }
  else{
  $user_address =$keyword;
      $sql="select * from user_info where user_address like '%{$user_address}%'";
  }

  //$fee_id=$result_fee['fee_id'];
    //echo $fee_id;
  if($flag=="true"){
  $rs=$pdo->query($sql);
    $result=$rs->fetch(PDO::FETCH_ASSOC);
        if(!$result){?>
        <h2 style="color:red;">用户，你好，没有找到管理费缴费明细账单，请重新查询。</h2>
        <?php } ?>
        <div class="list">
            <h2>物业管理费缴费明细</h2>


            <table width="96%"  align="center"
                cellpadding="3" cellspacing="0" >
            <tr bgcolor="#cc9">
            <td width="8%" align="center" style="border:0;">缴费id</td>
            <td width="8%" align="center" style="border:0;">用户id</td>
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
              foreach ($pdo->query($sql) as $value)
              {
            ?>
            <tr bgcolor="#ffc">
                                  <td align="center">
                                                          <?php
                                                            echo $value['fee_id'];
                                                          ?>
                                                        </td>

                 <td align="center">
                <?php
                                        echo $value['fee_user_id'];  //id
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
                             <td align="center"><a href="root_fee_edit.php?id=<?=$value['fee_id']?>">修改</a>
                             <a href="root_fee_del.php?id=<?=$value['fee_id']?>" onclick="return del_comfirm();">删除</a></td>
                                </tr>

                                <?php
                                  } //退出while循环
                                ?>
                        </table>

                 </table>
                            </div>


  <?php }
  else{
  $rs=$pdo->query($sql);
      $result=$rs->fetch(PDO::FETCH_ASSOC);
if(!$result){?>
   <h2 style="color:red;">用户，你好，没有找到您输入的业主信息，请重新查询。</h2>
<?php } ?>
        <div class="list">
                 <h2>业主信息</h2>


                 <table width="80%"  align="center"
                     cellpadding="3" cellspacing="0" >
                 <tr bgcolor="#cc9">
                 <td width="8%" align="center" style="border:0;">业主id</td>
                 <td width="8%" align="center" style="border:0;">业主姓名</td>
                 <td width="8%" align="center" style="border:0;">账号密码</td>
                 <td width="8%" align="center" style="border:0;">性别</td>
                 <td width="8%" align="center" style="border:0;">联系电话</td>
                 <td width="20%" align="center" style="border:0;">住房地址</td>

                 <td width="20%" align="center" style="border:0;">操作</td>
                 </tr>
                 <?php
                   //循环输出输出记录列表
                   //while($rows=mysql_fetch_array($result_fee))
                   foreach ($pdo->query($sql) as $value)
                   {
                 ?>
                 <tr bgcolor="#ffc">
                 <td align="center">
                     <?php
                          echo $value['user_id'];
                       ?>
                 </td>

                      <td align="center">
                     <?php
                                             echo $value['user_name'];  //id
                                           ?>
                                       </td>
                                       <td align="center">
                                         <?php
                                         echo $value['user_password'];
                                         ?>
                                       </td>
                                        <td align="center">
                                         <?php
                                         echo $value['user_gender'];  //用户性别
                                         ?>
                                       <td align="center">
                                         <?php
                                         echo $value['user_phonenumber'];  //用户电话
                                         ?>
                                       </td>
                                       <td align="center">
                                           <?php
                                             echo $value['user_address'];  //住房地址
                                           ?>
                                       </td>
                                  <td align="center"><a href="root_user_edit.php?id=<?=$value['user_id']?>">修改</a>
                                  <a href="root_user_del.php?id=<?=$value['user_id']?>" onclick="return del_comfirm();">删除</a></td>
                                     </tr>

                                     <?php
                                       } //退出while循环
                                     ?>
                             </table>

                      </table>
                                 </div>
                                 <?php

  }
  ?>
<script>
function del_comfirm(){
                    if (confirm('是否确认删除？')) {
                        return true;
                    }else{
                        return false;
                    }
                }
                </script>

</body>
</html>