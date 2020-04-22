<?php
	error_reporting(0);
	$singer_name=$_POST['u_name'];
	$con=mysql_connect('localhost','root','root');
    mysql_select_db("music",$con);
    $alert="";
	if(isset($_POST['submit'])){
		$sql="select * from singer where s_name='$singer_name'";
		$result=mysql_query($sql,$con);
		if($row=mysql_fetch_array($result))
		{
			$s_id=$row['s_id'];
			$s_name=$row['s_name'];
			$s_pic=$row['s_pic'];
			$s_type=$row['s_type'];
		}
        else
        $alert="没有找到该歌手";	
	}
	$del=$_POST['delete'];
	if(isset($del))
	{
		$del = "delete from singer where s_name='$singer_name'";
		if(mysql_query($del,$con))
		{
			$alert="删除成功";
		}
		else 
			$alert="删除失败";
		
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/manage.css">
    <title>管理员-歌手管理</title>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
            </div>
            <div class="name">
            海风音乐
            </div>
            <ul class="nav-ul">
            <li>
                <a href="manage.php">用户管理</a>
            </li>
            <li><a href="#" class="active">歌手管理</a></li>
            <li><a href="manage3.php">歌曲管理</a></li>
            </ul>            
        </nav>
    </header>
    <div class="content">
        <form  style="height:500px" action="" method="post" class="form">
            <input id="u_name" name="u_name" type='text' placeholder="请输入歌手名" value="<?php echo $u_name;?>">
            <input id='submit'  name="submit" type="submit" value="搜索">
            <table border=1 cellspacing=0>
                <tr>
                    <td>编号</td>
                    <td id='no'><?php echo $s_id;?></td>
                </tr>
                <tr>
                    <td>姓名</td>
                    <td id='name'><?php echo $s_name;?></td>
                </tr>
                <tr>
                    <td>类型</td>
                    <td id='type'><?php
                    if($s_type !='') echo $s_type;
                    else echo "";?></td>
                </tr>
                <tr>
                    <td>头像</td>
                    <td id="pic"><?php if($s_pic !='')echo "<img width=100px height=100px src='$s_pic'>";
                    else echo "";?></td>
                </tr>
            </table>
            <button name="delete">删除</button>
            <label style="color:red" for=""><?php
            if($alert!='')
            echo $alert;
            ?></label>
        </form>
    </div>
    
      <div class="clear"></div>
      <div class="bottom">
        版权所有&copy;吴蕾-1821010127
      </div>
</body>
</html>
