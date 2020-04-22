<?php 
	session_start();
  $name = $_SESSION['name'];
	$con=mysql_connect('localhost','root','root');
	mysql_select_db("music",$con);
	$sql="select * from user where u_name='$name'";
  $result=mysql_query($sql,$con);
  $aler="";
	if($row=mysql_fetch_array($result))
	{
    $u_id=$row['u_id'];
    $u_pic=$row['u_pic'];
    $u_pwd=$row['u_pwd'];
    $u_sex=$row['u_sex'];
    $u_name=$row['u_name'];
    $introduce=$row['introduce'];
  }
  $sex="";
  $pwd=""; 
 
  if(isset($_POST['submit']))
  {
    $name=$_POST['u_name'];
    $sex=$_POST['u_sex'];
    $pwd=$_POST['u_pwd'];
    $introduce=$_POST['introduce'];
    $upd="update user set u_sex='$sex',introduce='$introduce' where u_id=$u_id";
    if(mysql_query("$upd",$con))
    {
      $aler = "保存成功";
    }
    else
    $aler = "保存失败";
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>歌手用户</title>
<link rel="stylesheet" href="css/user.css">
<link href="css/css.css" rel="stylesheet" type="text/css" />
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

  <div class="content">
    <form action="" method="post">
      <div class="person">个人设置</div>
      <div class="box">
      <div class="img">
          <img src="<?php 
          if($u_pic!="")
            echo $u_pic;
          else
            echo "images/cd_default.png";
          ?>" alt="头像">
        </div>
        <div class="box_group">
        昵称：<input type="text" name="u_name" id="u_name" value="<?php
            echo $u_name;
        ?>">
        </div>
        <div class="box_group">
        密码：<input type="password" name="u_pwd" id="u_pwd"  value="<?php
          echo $u_pwd;
        ?>">
        </div>
        <div class="box_group">
        性别：<input type="radio" name="u_sex" id="u_sex" value="男" <?php
        if($sex !="")
        {
          if($sex == "男" || $sex =="")
          echo "checked='checked'";
        }
        else
        {
          if($u_sex == "男")
          echo "checked='checked'";
        }
        ?>">男
        <input type="radio" name="u_sex" id="u_sex" value="女" <?php
        if($sex!="")
        {
          if($sex == "女")
          echo "checked='checked'";
        }
        else
        {
          if($u_sex == "女")
          echo "checked='checked'";
        }
        ?>">女
        </div>
        <div class="box_group">
        介绍：
        <textarea name="introduce" id="introduce" cols="30" rows="5" placeholder="请输入25字以内"><?php
          if($introduce != "")
            echo "$introduce";
          else
            echo "";
        ?>
        </textarea>
        </div>
        <div class="box_group">
          <input name="submit" type="submit" value="保存">
          <label id="aler" name="aler"><?php echo $aler;?></label>
        </div>
      </div>
      
    </form>
    <form  action="./php/SongInsert.php" method="post">
      <div class="person">上传歌曲</div>
      <div class="box_group">
        <label for="">歌曲名：</label>
        <input type="text" name="song_name" id="song_name">
      <div class="box_group">
        <label for="">歌曲文件：</label>
        <input type="text" name="song_file" id="song_file">
      </div>
      <div class="box_group">
        <label for="">歌曲图片：</label>
        <input type="text" name="song_pic" id="song_pic">
      </div>
      <div class="box_group">
        <label for="">歌词：</label>
        <input type="text" name="lyric" id="lyric">
      </div>
      <div class="box_group">
        <input name="sub" type="submit" value="提交">
        <!-- <label id="aler" name="aler"><?php echo $aler;?></label> -->
      </div>
    </form>
  </div>
  <div class="clear"></div>
  <div class="bottom">
    版权所有&copy;吴蕾-1821010127
  </div>
  <div class="top" style="display:none">
    TOP
  </div> 
  <script>
    var top = document.getElementsByClassName('top')[0];
    // 点击快速返回顶部
    window.onscroll = function()
    {
      top.style.display = 'block';
      top.onclick = function(e)
    {
      if(document.documentElement) //谷歌
      {
        document.documentElement.scrollTop = 0;
      }
      else //IE
      {
        document.body.scrollTop = 0;
      }
    }
    }

  </script>
</body>
</html>
