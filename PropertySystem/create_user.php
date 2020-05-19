<!-- 注册 -->
<?php
header("Content-type: text/html; charset=utf-8");
  /**************************************/
  /*		文件名：create_user.php		*/
  /*		功能：生成用户注册页面		*/
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
<title>用户注册</title>
</head>
<body>
<?php
require('head.php');
?>

<div class="createUser">
<h2>注册</h2>

<fieldset style="background:url()" >
<legend>Register</legend>
<form id="Register" method="post" action="add_user.php" onsubmit="return check();" name="myform">
<table width="800" >
  <tr>
	<td width="100" ><label for="username">用户名:</label></td>
	<td><input name="username" type="text" id="username"></td>
  </tr>
  <tr>
    <td width="100"><label for="password">密 码:</label></td>
    <td><input type="password" name="pwd" id="pwd"></td>
  </tr>
  <tr>
    <td width="100"><label for="password">确认密码:</label></td>
    <td><input type="password" name="repwd" id="repwd" ></td>
    </tr>
</table>
<section class="button">
<input type="submit" name="Submit" value="提交注册" class="button"/>
<input type="reset" name="Submit2" value="清空" class="button"/>
</section>
</form>
</fieldset>
</div>
 <script>
      function check() {
            var username=myform.username.value;
             var pwd=myform.pwd.value;
             var repwd=myform.repwd.value;


            if(username.length==0)
             {
                alert("用户名不能为空!");
               myform.username.focus();

                return false;
             }

             if(username.length<1||username.length>12)
             {
                alert("用户名必须大于3个字符，小于12个字符");
                myform.username.focus();myform.username.select();
                return false;
             }

              if(!checkUsrname(username))
              {
                     alert("用户名不能有特殊字符");
                    return false;
             }

          if(pwd.length==0)
             {
                alert("密码不能为空!");
                myform.pwd.focus();
                return false;
             }

        /*if(!checkPwd(pwd))
              {
                      alert("密码必须包括字母和数字");
                      return false;
             }*/

         if(repwd.length==0)
             {
                alert("确认密码不能为空!");
               myform.repwd.focus();
                return false;
             }

        if(!(pwd==repwd))
            {
                alert("密码和确认密码必须一致");
                return false;
             }


   }
        //验证用户名中是否有非法字符
    function checkUsrname(username)
    {
             var str="_*#$&";
            var ch;
           for (var i =0 ; i <=username.length - 1; i++)
            {
                ch=username.charAt(i);
                if(str.indexOf(ch) >  0)
                {
                    return false;
                }
            }
                return true;
    }
        //验证输入的密码是否含有字母和数字
     function checkPwd(pwd)
     {
             var ref=/^[0-9]+$/;
             var reg=/^[A-Za-z]+$/;
             var shuzi=false;
             var zinv=false;
             var ch;
             for(var i=0;i<pwd.length;i++)
             {
                    ch=pwd.charAt(i);
                    if(ref.test(ch))
                    {
                    shuzi=true;
                    }
                   if (reg.test(ch))
                   {
                    zinv=true;
                   }
                   if(shuzi&&zinv)
                   {
                       return true;
                   }
             }
                return false;
     }
  </script>
</body>
</html>
<?php
//公用尾部页面
require('foot.php');
?>