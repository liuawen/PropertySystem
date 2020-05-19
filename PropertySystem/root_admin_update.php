<?php
require('check_login.php');

header('Content-type:text/html;charset=utf-8');
$username=trim($_POST['username']);
$id=$_POST['id'];
$password=trim($_POST['username']);
require('conn.php');
$pdo->query('set names utf8');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

$sql="select * from admin_info where admin_name='{$username}' ";
$rs=$pdo->query($sql);
$result=$rs->fetch(PDO::FETCH_ASSOC);
if ($result) {
    echo '<script>alert("用户名已存在");history.back();</script>';
    exit();
}
$sql="update admin_info set admin_name='{$username}',admin_password='{$password}' where admin_id={$id}";
    if($pdo -> exec($sql)){ 
    echo "管理员信息修改成功！";
    echo $pdo -> lastinsertid(); 
     header('Location:list.php');
    } else{
         echo "您没有修改数据！"; 
          header('Location:list.php');
    }


?>