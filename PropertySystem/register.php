<!-- 注册信息检测PHP -->
<?php 
 header("Content-type: text/html; charset=utf-8");
$username=trim($_POST['username']);//用户名
$pwd=trim($_POST['pwd']);//用户密码
//$sex=trim($_POST['sex']);//用户性别
$idtype=trim($_POST['idtype']);//用户身份
//$phone=trim($_POST['phone']);//用户电话
#$intro=trim($_POST['intro']);//用户介绍
require('conn.php');
if($idtype=="admin")
{

    $sql="select * from admin_info where admin_name='{$username}'";
    $rs=$pdo->query($sql);
    $result=$rs->fetch(PDO::FETCH_ASSOC);

    if ($result) {
    echo '<script>alert("用户名已存在");history.back();</script>';
    exit();
    }

    $sql="insert into admin_info (admin_name,admin_password) values ('{$username}','{$pwd}')";

    if($pdo -> exec($sql)){ 
    echo "管理员注册成功！";
    echo $pdo -> lastinsertid();
    header('Location:login_root.html?');
    } 

}else if($idtype=="user"){
    
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
}

 ?>