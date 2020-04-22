<?php
	error_reporting(0);
	$song_name=$_POST['u_name'];
	$con=mysql_connect('localhost','root','root');
	mysql_select_db("music",$con);
	$sql="select * from song where song_name like '%$song_name%'";
	$alert='';
	if(isset($_POST['submit']))
	{
		$result=mysql_query($sql,$con);
		if($row=mysql_fetch_array($result))
		{
			$song_id=$row['song_id'];
			$song_name=$row['song_name'];
			$song_pic=$row['song_pic'];
			$song_file=$row['song_file'];
			$lyric=$row['lyric'];
		}
		else
		$alert='没有找到该歌曲，请重新输入';
}
    $new_pic=$_POST['pic'];
    $new_lyric=$_POST['lyric'];
	if(isset($_POST['update']))
	{
		$upd = "update song set song_pic='$new_pic',lyric='$new_lyric' where song_name='$song_name'";
		if(mysql_query($upd,$con))
		{
			$alert="修改成功";
		}
		else 
            $alert="修改失败";		
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
    <title>歌曲修改</title>
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
            <li><a href="manage2.php">歌手管理</a></li>
            <li><a href="#" class="active">歌曲管理</a></li>
            </ul>            
        </nav>
    </header>
    <div class="nav-top">
    <ul class="nav-top-ul">
      <li><a href="manage3.php">删除</a></li>
      <li><a class="nav-top-active" href="#">修改</a></li>
      <li><a href="manageSongInsert.php">添加</a></li>
    </ul>
   </div>
    <div class="content">
        <form action="" method="post" class="form">
            <input id="u_name" name="u_name" type='text' placeholder="请输入歌曲名" value="<?php echo $song_name;?>">
            <input id='submit' name="submit" type="submit" value="搜索">
            <table id="t1" border=1 cellspacing=0>
                <tr>
                    <td width=200px>编号</td>
                    <td width=200px name='no'><?php if($song_id)echo $song_id;else echo '';?></td>
                </tr>
                <tr>
                    <td>歌名</td>
                    <td><?php echo $song_name;?></td> 
                </tr>
                <tr>
                    <td>图片</td>
                    <td><input name='pic' type="text" placeholder='可修改项'
                    value="<?php
                        echo $song_pic;
                    ?>"
                    ></td>
                </tr>
                <tr>
                    <td>资源</td>
                    <td><?php echo $song_file;?></td>
                </tr>
                <tr>
                    <td>歌词</td>
                    <td><textarea name='lyric' rows=5 cols=40  placeholder='可修改项'><?php echo $lyric;?>
                    </textarea></td>
                </tr>
            </table>
            <br>
            <button id='update' name="update">修改</button><br>
            <label id='lab' style="color:red"><?php if($alert!='')echo $alert;?></label>
        </form>
    </div>
    <script>
        var upd = document.getElementById('update');
        var lab = document.getElementById('lab');
        var table = document.getElementById('t1');
        if(lab.innerHTML=='修改成功')
        {
            table.style.display='none';
            upd.style.display='none';
        }
    </script>
      <div class="clear"></div>
      <div class="bottom">
        版权所有&copy;吴蕾-1821010127
      </div>
</body>
</html>
