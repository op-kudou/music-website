<?php 
error_reporting(0);
	$s_name=$_POST['songname'];
	$con=mysql_connect('localhost','root','root');
	mysql_select_db("music",$con);
// 	$creat = "create table singsing(
// 	s_id int not null,
// 	song_id int not null,
// 	constraint pk1 primary key(s_id,song_id),
// 	constraint fk1 foreign key(s_id) references singer(s_id),
// 	constraint fk2 foreign key(song_id) references song(song_id)		
// 	)";

	$sql=mysql_query("select song_name from song where song_name like'%$s_name%'");
	$row=mysql_num_rows($sql);
	for($i=0;$i<$row;$i++)
	{
		$arr=mysql_fetch_assoc($sql);
		$song_name=$arr['song_name'];
	}
	$sql1=mysql_query("select s_name from singer where s_id =(
	select s_id from singing where song_id=(
	select song_id from song where song_name='$song_name'))",$con);
	$row1=mysql_num_rows($sql1);
	for($i=0;$i<$row1;$i++)
	{
		$arr1=mysql_fetch_assoc($sql1);
		$singer_name=$arr1['s_name'];
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>歌曲搜索</title>
    <link href="css/css.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/search.css">
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
                    <a href="index.html">发现音乐</a>
                </li>
                <li><a href="#">我的音乐</a></li>
                <li><a href="#">朋友</a></li>
                <li><a href="#">音乐人</a></li>
                <li><a href="#">下载客户端</a></li>
            </ul>
            <form action="../music/php/search.php" class="nav-form" method="POST">
                <input type="text" class="search" id="songname" name="songname" value="<?php echo $_POST['songname'];?>">
                <script>
                    var songname = document.getElementById("songname");
                    function fun() {
                        if (songname == 1)
                            window.location.href = 'rank-list.html';
                    }         
                </script>
                <button class="btn" onclick="fun()">搜索</button>
            </form>
        </nav>
    </header>
    <div class="table">
        <form action="">
            <input type="text" class="s_box" value="<?php echo $_POST['songname'];?>"><input type="submit" value="搜索" class="s_box1">
            <table cellspacing="0">
                <tr>
                    <th width=200>歌名</th>
                    <th>歌手</th>
                </tr>
                <tr>
                    <td><?php echo "<a href='song.html'>$song_name</a>";?></td>
                    <td><?php echo $singer_name;?></td>
                </tr>
                <tr>
                    <td><?php echo $song_name;?></td>
                    <td></td>
                </tr>
                <tr>
                    <td><?php echo $song_name;?></td>
                    <td></td>
                </tr>
                <tr>
                    <td><?php echo $song_name;?></td>
                    <td></td>
                </tr>
                <tr>
                    <td><?php echo $song_name;?></td>
                    <td></td>
                </tr>
                <tr>
                    <td><?php echo $song_name;?></td>
                    <td></td>
                </tr> 
            </table>
        </form>
    </div>
    </div>
    </div>
    <div class="clear"></div>
    <div class="bottom">
        版权所有&copy;吴蕾-1821010127
    </div>
</body>

</html>