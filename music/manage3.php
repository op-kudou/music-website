<?php
	error_reporting(0);
	$song_name=$_POST['u_name'];
	$con=mysql_connect('localhost','root','root');
	mysql_select_db("music",$con);
	$sql="select * from song where song_name='$song_name'";
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
//             echo "<script>alert('没有找到该歌曲')</script>";
		$alert='没有找到该歌曲，请重新输入';
}
	if(isset($_POST['delete']))
	{
		$del = "delete from singer where s_name='$singer_name'";
		if(mysql_query($del,$con))
		{
			echo "删除成功";
		}
		else 
			echo "删除失败";		
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
    <title>歌曲删除</title>
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
      <li><a class="nav-top-active" href="#">删除</a></li>
      <li><a href="manageSongUpdate.php">修改</a></li>
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
                    <td width=200px id='no'><?php echo $song_id;?></td>
                </tr>
                <tr>
                    <td>歌名</td>
                    <td id='name'><input id='ipt' type="text" value="<?php echo $song_name;?>"></td>
                </tr>
                <tr>
                    <td>图片</td>
                    <td id='pic' name='pic'><?php
                    if($song_pic !='') echo "<img width=100px height=100px src='$song_pic'>";
                    else echo "该音乐没有图片";?></td>
                </tr>
                <tr>
                    <td>资源</td>
                    <td id="resource" name='resource'><input type="text" value="<?php if($song_file !='')echo $song_file;
                    else echo '空';?>"></td>
                </tr>
                <tr>
                    <td>歌词</td>
                    <td id='lyric' name='lyric'><textarea rows=5 cols=40><?php
                    if($lyric !='') echo $lyric;
                    else echo '空';?></textarea></td>
                </tr>
            </table>
            <br>
            <button id='delete' name="delete">删除</button><br>
            <label style="color:red"><?php if($alert!='')echo $alert;?></label>
<!--             <input type='submit' id='update' name='update' value='修改'> -->
<!--             <button id="update" name="update">修改</button> -->
<!--             <button name="insert">添加</button>            -->
        </form>
    </div>
    <script>
        var no = document.getElementById('no');
        var del = document.getElementById('delete');
        var table = document.getElementById('t1');
        if(no.innerHTML=='')
        {
            table.style.display='none';
            del.style.display='none';
        }
    </script>
      <div class="clear"></div>
      <div class="bottom">
        版权所有&copy;吴蕾-1821010127
      </div>
</body>
</html>
