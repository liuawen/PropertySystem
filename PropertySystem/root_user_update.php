<?php
require('check_login.php');

header('Content-type:text/html;charset=utf-8');
$username=trim($_POST['username']);
echo $username;
$password=trim($_POST['password']);
#echo $password;
$gender=trim($_POST['gender']);
$phonenumber=trim($_POST['phonenumber']);
echo $phonenumber;
$address=trim($_POST['address']);
$id=$_POST['id'];
echo $id;
require('conn.php');
$pdo->query('set names utf8');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

#$sql="select * from user_info where user_name='{$username}' and user_id!={$id}";
$sql="select * from user_info where user_name='{$username}' and  user_id!={$id}";
$rs=$pdo->query($sql);
$result=$rs->fetch(PDO::FETCH_ASSOC);
//if ($result) {
//    echo '<script>alert("用户名已存在");history.back();</script>';
//    exit();
//}
$sql="update user_info set user_name='{$username}',user_password='{$password}',
                                user_gender='{$gender}',user_address='${address}',
                                user_phonenumber='{$phonenumber}'
                                where user_id={$id}";
    if($pdo -> exec($sql)){ 
    echo "业主信息修改成功！";
    echo $pdo -> lastinsertid(); 
     header('Location:list.php');
    } 
    else{
         echo "您没有修改数据！"; 
          header('Location:list.php');
    }


?>