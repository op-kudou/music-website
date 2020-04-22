<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <title>登录</title>
</head>
<body>
   <div class="login">
     <div class="login-top">
         登录
     </div>
     <form action="" method="POST" name="form1">
         <label>用户名：</label>
         <input name="username" type="text" id="username" maxlength="8"><br>
         <label>密码：</label>
         <input name="pwd" type="password" id="pwd" maxlength="16"><br>
         <div class="btn-group">
            <button name="button" type="submit">登录</button>
            <input type="reset" value="取消">            
         </div>        
     </form>
     <a href="register.html">注册</a>
   </div> 
</body>
</html>
<?php
	session_start();
	error_reporting(0);
	if(isset($_POST['button']))
	{
		$u_name=$_POST['username'];
		$u_pwd=$_POST['pwd'];
		$con=mysql_connect('localhost','root','root');
		mysql_select_db("music",$con);
		$sql=mysql_query("select u_id from user where u_name='$u_name' and u_pwd='$u_pwd'",$con);
		$sql1=mysql_query("select m_id from manager where m_name='$u_name' and m_pwd='$u_pwd'",$con);
		$_SESSION['name']=$u_name;
		if(mysql_fetch_array($sql))
		{
			header('Location:http://localhost/musics/music/index.php');
			exit;
		}
		else if(mysql_fetch_array($sql1))
		{
			header('Location:http://localhost/musics/music/manage.php');
			exit;
		}
		else
		{
			echo "<script>alert('用户名或密码错误，登录失败');history.go(-1);</script>";
		}
	}
?>