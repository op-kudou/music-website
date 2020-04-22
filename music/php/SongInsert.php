<meta charset="UTF-8">
<?php
	// error_reporting(0);
    session_start();
    $name = $_SESSION['name'];
    $song_name=$_POST['song_name'];
    $song_pic=$_POST['song_pic'];
    $song_file=$_POST['song_file'];
    $lyric=$_POST['lyric'];
    $con=mysql_connect('localhost','root','root');
    mysql_select_db("music",$con);
    $sql="insert into song(song_name,song_pic,song_file,lyric) values('$song_name','$song_pic','$song_file','$lyric')";
    mysql_query($sql,$con);
    // 查询歌手id
    $sql1="select * from singer where s_name='$name'";
    $result1 = mysql_query($sql1,$con);
    if($row1=mysql_fetch_array($result1))
    {
        $s_id=$row1['s_id'];
    }
    // 查询歌曲id
    $sql2="select * from song where song_name='$song_name'";
    $result2 = mysql_query($sql2,$con);
    if($row2=mysql_fetch_array($result2))
    {
        $song_id=$row2['song_id'];
    }
    $sql3="insert into singing(s_id,song_id) values('$s_id','$song_id') ";
    if(mysql_query($sql3,$con))
    {
        echo "<script>alert('添加成功');</script>";
        header('Location:http://localhost/musics/music/user-singer.php');
		// exit;
    }
    else
    echo "<script>alert('用户名或密码出错');history.go(-1);</script>";
?>
