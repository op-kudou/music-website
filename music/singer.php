<meta charset="UTF-8">
<?php 
error_reporting(0);
	$s_name=$_POST['name'];
    // $s_pwd=$_POST['pwd'];
    $s_pic=$_POST['pic'];
	$s_type=$_POST['type'];
	$s_sex=$_POST['hid'];
	$con=mysql_connect('localhost','root','root');
	mysql_select_db("music",$con);
	$insert="insert into singer(s_name,s_sex) values('$s_name','$s_sex')";	
	echo $s_name.','.$s_sex;
	if(mysql_query($insert,$con))
	{
		header('Location:http://localhost/musics/music/index.php');
		exit;
	}
	else 
		echo 'fail';
?>