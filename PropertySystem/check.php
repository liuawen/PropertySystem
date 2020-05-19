<!-- 登陆检测页面PHP -->
<?php 
     header("Content-type: text/html; charset=utf-8");
     $username=trim($_POST['username']);//用户名
     $pwd=trim($_POST['password']);//用户密码
     //$identity=trim($_POST['identity']);//用户身份
     require('conn.php');
    
    //用户登陆检测
//if($identity==1)
//{
    $sql="select * from user_info where user_name='{$username}' and user_password='{$pwd}'";
    $rs=$pdo->query($sql);
    $result=$rs->fetch(PDO::FETCH_ASSOC);
    if ($result) {
    echo '登录成功！欢迎用户业主，'.$result['user_name'];
    session_start();
    $_SESSION['username']=$username;
    // $_SESSION['nickname']=$result['nickname'];
    header('Location:home.php');
    }else{
     echo '<script>alert("用户名或密码错误");history.back()</script>';
        exit();
    }

/* else if($identity==2)
{
        //管理员登陆检测
        $sql="select * from admin where admin_name='{$username}' and admin_password='{$pwd}'";
    $rs=$pdo->query($sql);
    $result=$rs->fetch(PDO::FETCH_ASSOC);
    if ($result) {
    echo '登录成功！欢迎管理员，'.$result['admin_name'];
     session_start();
     $_SESSION['username']=$username;
    header('Location:author_index.php');
    }else{
     echo '<script>alert("管理员名或密码错误");history.back()</script>';
        exit();
    }

}
 ?> */