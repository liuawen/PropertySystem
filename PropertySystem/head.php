<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>
    <script type="text/javascript">
	//退出确认框

	function confirm_logout() {
	    var msg = "您确定要退出登录吗？";
	    if (confirm(msg)==true){
	    return true;
	    }else{
	    return false;
	    }
	}
	</script>
</head>

<body style="background:url(images/bg.jpg) no-repeat; ">
<div class="header" >
    <div class="status-container">
        <div class="status">
        <?php
             session_start();
             if(isset($_SESSION['username']))
             {
                echo $_SESSION['username'];?>
                ,你好！欢迎来到「业主信息系统」
                <?php
                }
                else{?>
                你好！欢迎来到「业主信息系统」
                     <?php }?>
        </div>

        <div class="operations">
        <?php

            if(isset($_SESSION['username']))
            { ?>
                <a href="logout.php" onclick="javascript:return confirm_logout()">用户退出</a>
                <a href="edit_profile.php">用户信息修改</a>
                <i></i>
                <a href="edit_password.php">修改密码</a>
         <?php
            }
            else{?>
            <a href="login.html">登录</a>
                   <i></i>
                   <a href="create_user.php">注册</a>
            <?php }?>
           <i></i>
           <a href="home.php">用户主页</a>
        </div>
    </div>
</div>
