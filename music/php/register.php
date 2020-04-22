<meta charset="UTF-8">
<?php 
	$u_name=$_POST['username'];
	$u_pwd=$_POST['pwd'];
	$u_pwd2=$_POST['pwd2'];
	if($u_pwd==$u_pwd2)
	{
		$con=mysql_connect('localhost','root','root');
		mysql_select_db("music",$con);
		$insert="insert into user(u_name,u_pwd) values('$u_name','$u_pwd')";	
		if(mysql_query($insert,$con))
		{
			header('Location:http://localhost/musics/music/login.php');
			exit;
		}
		else 
			echo 'fail';
	}
	else
	{
		echo "<script>alert('两次密码不同');history.go(-1);</script>";
	}
?>