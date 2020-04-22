<?php
    session_start();
    error_reporting(0);
    $singer_name = $_SESSION['singer_name'];
    if($_GET['singer_name']!="")
    {
      $singer_name=$_GET['singer_name'];
    }
    $con=mysql_connect('localhost','root','root');
    mysql_select_db("music",$con);
    $sql="select song_name from song where song_id in(
      select song_id from singing where s_id=(
        select s_id from singer where s_name='$singer_name'
      )
    )";
    $result=mysql_query($sql,$con);
    $count = 0;
    
    $sql1="select * from singer where s_name = '$singer_name'";
    while($row1 = mysql_fetch_array($sql1))
  {
      $s_pic=$row1['s_pic'];
  		$introduce = $row1['introduce'];
  }
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>海风音乐</title>
<link rel="stylesheet" href="css/css.css">
<link rel="stylesheet" href="css/singer-message.css">
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
          <a href="index.php">发现音乐</a>
        </li>
        <li><a href="#">我的音乐</a></li>
        <li><a href="#">朋友</a></li>
        <li><a href="#">音乐人</a></li>
        <li><a href="#">下载客户端</a></li>
      </ul>
      
    </nav>
  </header>
  <div class="nav-top">
    <ul class="nav-top-ul">
      <li><a>推荐</a></li>
      <li><a href="rank-list.html">排行榜</a></li>
      <li><a href="nav-singer.html">歌手</a></li>
    </ul>
  </div>
  <div class="content">
      <div class="container">
            <div class="singer-pic">
                <span class="name">
                  <?php
                    echo $singer_name;
                  ?>
                </span>
                <img src="
                <?php
$con=mysql_connect('localhost','root','root');
	mysql_select_db("music",$con);
	$sql3="select * from singer where s_name='$singer_name'";
	$result3=mysql_query($sql3,$con);

	while($row3 = mysql_fetch_array($result3))
  {
  		echo $row3['s_pic'];
 }
              ?>
                " alt="" width="100%">
            </div>
            <div class="singer-nav">
                <div class="production">
                <span>所有作品</span>
                </div>
            </div>           
            <div class="clear"></div>
            <div class="song-table">
                <table cellspacing="0">
                  <?php
                    $song_name="";
                    while($row=mysql_fetch_array($result))
                    {
                      $count++;
                      $song_name=$row['song_name'];
                        echo "<tr>";
                        echo "<td width='100px'>" . $count. "</td>";
                        echo "<td width='400px'><a href='song.php?song_name=$song_name'>" . $song_name . "</a></td>";
                        echo "</tr>";
                        $_SESSION['song_name']=$song_name;
                    }                    
                  ?>
                </table>
            </div>
            <div class="singer-nav">
                <div class="production">
                <span>歌手介绍</span>
                </div>
            </div> 
            <div class="introduce">
            <?php
$con=mysql_connect('localhost','root','root');
	mysql_select_db("music",$con);
	$sql="select * from singer where s_name='$singer_name'";
	$result=mysql_query($sql,$con);

	while($row = mysql_fetch_array($result))
  {
  		echo $row['introduce'];
 }
              ?>
            </div>
      </div>       
  </div>
  
  <div class="clear"></div>
  <div class="bottom">
    版权所有&copy;吴蕾-1821010127
  </div>
  <a class="top" href="#">
    TOP
  </a> 
</body>
</html>
