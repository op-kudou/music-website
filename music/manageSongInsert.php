<?php
	error_reporting(0);
	
	$alert='';
	if(isset($_POST['add']))
	{
        $song_name=$_POST['song_name'];
        $song_pic=$_POST['song_pic'];
        $song_file=$_POST['song_file'];
        $lyric=$_POST['lyric'];
        $con=mysql_connect('localhost','root','root');
        mysql_select_db("music",$con);
        $sql="insert into song(song_name,song_pic,song_file,lyric) values('$song_name','$song_pic','$song_file','$lyric')";
		if(mysql_query($sql,$con))
		{
            $alert='添加成功';
		}
		else
		    $alert='添加失败';
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
    <title>歌曲添加</title>
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
      <li><a href="manageSongUpdate.php">修改</a></li>
      <li><a class="nav-top-active" href="#">添加</a></li>
    </ul>
   </div>
    <div class="content">
        <form action="" method="post" class="form">
        <div class="box">
            歌名：<input name='song_name' type="text"><br>
            图片：<input name='song_pic' type="text"><br>
            资源：<input name='song_file' type="text"><br>
            歌词：<textarea name="lyric" id="lyric" cols="40" rows="10"></textarea><br>
        </div>    
        <input name="add" class="add" type="submit" value="添加">    
        <label style="color:red"><?php if($alert!='')echo $alert;?></label>
        </form>
        <script>
            var lab = document.getElementsByTagName('lable')[0];
            if(lab.innerHtml =='添加成功')
            alert('添加成功');
        </script>
    </div>
      <div class="clear"></div>
      <div class="bottom">
        版权所有&copy;吴蕾-1821010127
      </div>
</body>
</html>
