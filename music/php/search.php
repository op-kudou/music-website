<?php
	$s_name=$_POST['songname'];
	$con=mysql_connect('localhost','root','root');
	mysql_select_db("music",$con);
	$sql=mysql_query("select s_file from song where s_name like '%Fight%'",$con);
	$url=mysql_fetch_row($sql);
	if($sql)
	{?>
	<body>
	<table border=1 cellspacing=0>
	<tr><td>
	<?php
		echo "<a href='$url[0]'>Fight Together</a>";
	?>
	</td></tr>
	</table>
	</body>
	<?php 
	}
	else 
		echo "<script>alert('没有这首歌');history.go(-1);</script>";
?>