<?php 
    header("Content-type: text/html; charset=utf-8");
     $username=trim($_POST['username']);//用户名
    $pwd=trim($_POST['password']);//用户密码
    echo $username;
    echo $pwd;
     require('conn.php');
     $sql="select * from admin_info where admin_name='{$username}' and admin_password='{$pwd}'";
    $rs=$pdo->query($sql);
    $result=$rs->fetch(PDO::FETCH_ASSOC);
    if ($result) {
    echo '登录成功！欢迎管理员，'.$result['admin_name'];
     session_start();
    $_SESSION['username']=$username;
    // $_SESSION['nickname']=$result['nickname'];
    header('Location:list.php');
    }else{
     echo '<script>alert("用户名或密码错误");history.back()</script>';
        exit();
    }



 ?>