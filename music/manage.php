<?php
session_start();
	error_reporting(0);
	$user_name=$_POST['u_name'];
	$con=mysql_connect('localhost','root','root');
    mysql_select_db("music",$con);
    $alert='';
	if(isset($user_name)){
        if($user_name=='')
        {
            $alert='不可为空';
        }
        else
        {
            $sql="select * from user where u_name='$user_name'";
            $result=mysql_query($sql,$con);
            if($row=mysql_fetch_array($result))
            {
                $u_id=$row['u_id'];
                $u_name=$row['u_name'];
                $u_pic=$row['u_pic'];
                $u_sex=$row['u_sex'];
                
            }
            else
                $alert="没有该用户，请重新输入";	
        }
		
	}
	$del=$_POST['delete'];
	if(isset($del))
	{
		$del = "delete from user where u_name='$u_name'";
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
    <title>管理员</title>
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
                <a href="#" class="active">用户管理</a>
            </li>
            <li><a href="manage2.php">歌手管理</a></li>
            <li><a href="manage3.php">歌曲管理</a></li>
            </ul>            
        </nav>
    </header>
    <div class="content">
        <form action="" style="height:500px" method="post" class="form">
            <input style="vertical-align:top" id="u_name" name="u_name" type='text' placeholder="请输入用户名" value="<?php echo $u_name;?>">
            <input style="vertical-align:top" id='submit' type="submit" value="搜索">
            <table border=1 cellspacing=0>
                <tr>
                    <td>编号</td>
                    <td><?php echo $u_id;?></td>
                </tr>
                <tr>
                    <td>姓名</td>
                    <td><?php echo $u_name;?></td>
                </tr>
                <tr>
                    <td>性别</td>
                    <td><?php
                    if($u_sex !='') echo $u_sex;
                    else echo "";?></td>
                </tr>
                <tr>
                    <td>头像</td>
                    <td><?php if($u_sex !='')echo "<img width=100px height=100px src='$u_pic'>";
                    else echo "";?></td>
                </tr>
            </table>
            <button name="delete">注销</button>
            <label id='lab' style="color:red"><?php if($alert!='')echo $alert;?></label>
        </form>
    </div>
    
      <div class="clear"></div>
      <div class="bottom">
        版权所有&copy;吴蕾-1821010127
      </div>
</body>
</html>
