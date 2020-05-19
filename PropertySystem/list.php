
\<!-- 管理员管理 -->
<?php
header("Content-type: text/html; charset=utf-8");
?>
<?php
//防跳墙，需要在登录后的每个页面上包含
require('check_login.php');
#echo "<p>{$_SESSION['username']}，你好！<a href='logout.php'>注销</a></p>"
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/head.css" />
<!--<link rel="stylesheet" href="css/ps.css">-->
 <link rel="stylesheet" href="css/style.css">
     <title>用户列表和物业费管理表</title>
     <style>
         table{
             width:80%;
             border-collapse: collapse;
         }
         table,th,td{
 			border: black solid;
 			font-weight: bolder;
 			color: black;
         }
 		body{
 			background-image: url();
 			background-size: 100%;

 		}
 		table{
            text-align: center;
            font-size: 25px;
 			/*text-align: center;
 			font-size: 25px;
 			position: relative;
 			left: 280px;*/
             		}
 		.guanli{
 			position: relative;
 			left: 500px;
 			align:auto;
 			/*left:450px;*/
 		}
     </style>
</head>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/home.css">
<link rel="stylesheet" href="css/head.css" />
<link rel="stylesheet" href="css/ps.css">
 <link rel="stylesheet" href="css/style.css">
<title>管理员页面</title>
</head>
<body style="background:url(images/bg.jpg) no-repeat; ">
	 <p class ="p1" style=" font-size: 25px;  text-align: center;"><?=$_SESSION['username']?>管理员，你好！<a href='logout.php' style=" text-decoration: none; text-align: center; font-size: 22px; color:blue">注销</a></p>

	<div class="guanli">
		<input type="button" value="业主信息管理" onclick="user()" style="font-size: 20px;font-weight:bolder">
		<input type="button" value="缴费信息管理" onclick="fee()" style="font-size: 20px;font-weight:bolder">
    	<input type="button" value="管理员信息管理" onclick="admin()" style="font-size: 20px;font-weight: bolder">
	</div>

<div class="user" id="user">
<?php
    require('conn.php');
    // 按用户ID   小到大  升序
    $sql_user="select * from user_info Order By user_id asc";
    //按修改的时间倒序排列
    $sql_fee="select * from fee_info Order By fee_id desc";
    $sql_admin="select * from admin_info";
?>

    <table>
     <div style="text-align:center; font-size: 25px;" >
                        <form action="query.php"  method="get">
                        <div style="border:1px solid gray;backgroud:#eee;padding:4px;" >
                        查询用户情况：请输入关键字   <input type="text" name="keyword">
                        <select name="sel">

                        <option value="user_name">业主姓名</option>

                        <option value="user_address">用户地址</option>
                        </select>
                        <input type="submit" value="搜索">
                        </div>
                        </form>
                    </div>
        <div style="text-align:center;font-weight: bolder;"><h2>业主列表</h2><a href="create_user.php" style="color: blue;">添加用户</a></div>

        <thead>
            <tr>
                <th>业主id</th>
                <th>业主姓名</th>
                <th>账号密码</th>
                <th>性别</th>
                <th>联系电话</th>
               <!-- <th>入住时间</th>-->
                <th>住房地址</th>
                <th colspan="2" >操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pdo->query($sql_user) as $value) {?>
            <tr>
                <td><?=$value['user_id']?></td>
                <td><?=$value['user_name']?></td>
                <td><?=$value['user_password']?></td>
                <td><?=$value['user_gender']?></td>
               <td><?=$value['user_phonenumber']?></td>
              <!-- <td><?=$value['user_checkintime']?></td> -->
               <td><?=$value['user_address']?> </td>
                <td width="60px"><a href="root_user_edit.php?id=<?=$value['user_id']?>">修改</a></td>
                <td width="60px"> <a href="root_user_del.php?id=<?=$value['user_id']?>" onclick="return del_comfirm();">删除</a></td>
            </tr>
            <?php } ?>
        </tbody>
        </table>
    </div>

<div class="fee" id="fee" style="display: none;" >
       

<!--<div class="list"> -->
<div style="text-align:center; font-size: 25px;" >
            <form action="query.php"  method="get">
            <div style="border:1px solid gray;backgroud:#eee;padding:4px;" >
            查询缴费情况：请输入关键字   <input type="text" name="keyword">
            <select name="sel">
            <option value="user_id">业主ID</option>

            <option value="fee_id">缴费ID</option>
            </select>
            <input type="submit" value="搜索">
            </div>
            </form>
        </div>
<div style="text-align:center;"><h2>物业管理费缴费明细</h2><a href="create_fee.php" style="color: blue;">添加缴费信息</a></div>

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
  foreach ($pdo->query($sql_fee) as $value)
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
<div class="admin" id="admin" style="display: none;" >
    <table>
        <caption>管理员列表</caption>
        <thead>
            <tr>
                <th>管理员名</th>
                <th>密码</th>

                 <th>操作</th>
            </tr>
        </thead>

         <tbody>
            <?php foreach ($pdo->query($sql_admin) as $value) {?>
            <tr>
                <td><?=$value['admin_name']?></td>
                <td><?=$value['admin_password']?></td>

                  <td><a href="root_admin_edit.php?id=<?=$value['admin_id']?>">修改</a>
                 <a href="root_admin_del.php?id=<?=$value['admin_id']?>" onclick="return del_comfirm();">删除</a></td>
            </tr>
            <?php } ?>
        </tbody>
        </table>
 </div>
    <script>
        function user()
        {
            document.getElementById('user').style.display='block';
            document.getElementById('admin').style.display='none';
            document.getElementById('fee').style.display='none';
        }
        function fee()
        {

                    document.getElementById('fee').style.display='block';
                    document.getElementById('user').style.display='none';
                    document.getElementById('admin').style.display='none';
        }

        function admin()
        {
            // alert("adsfasdf");
            document.getElementById('admin').style.display='block';
            document.getElementById('user').style.display='none';
             document.getElementById('fee').style.display='none';
        }


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