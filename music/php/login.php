<meta charset="UTF-8">
<?php
	session_start();
	error_reporting(0);
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
		echo "<script>alert('用户名或密码出错');history.go(-1);</script>";
	}
	
?>