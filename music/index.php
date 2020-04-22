<?php 
  session_start();
  error_reporting(0);
	$name = $_SESSION['name'];
	$con=mysql_connect('localhost','root','root');
	mysql_select_db("music",$con);
	$sql="select * from user where u_name='$name'";
	$result=mysql_query($sql,$con);
	if($row=mysql_fetch_array($result))
	{
		$u_pic=$row['u_pic'];	
  }
  $sql2 = "select * from singer where s_name='$name'";
  $result2=mysql_query($sql2,$con); 
  if($row2=mysql_fetch_array($result2))
	{
		$u_pic=$row2['s_pic'];	
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>海风音乐</title>
<link rel="stylesheet" href="css/index.css">
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
          <a href="#" class="active">发现音乐</a>
        </li>
        <li><a href="#">我的音乐</a></li>
        <li><a href="#">朋友</a></li>
        <li><a href="nav">音乐人</a></li>
        <li><a href="#">下载客户端</a></li>
      </ul>
      <form action="song.php" class="nav-form" method="POST">
        <input type="text" class="search" id="songname" name="songname" placeholder="恐怖">
        <input class="btn" type="submit" value="搜索"></input>
      </form>
      <div class="user">
        <a href='
        <?php
        if($result2)
          echo "user-singer.php";
        else
         echo "user.php";
        ?>'><img style="margin-right:20px" src="<?php 
         if($u_pic!='')
         	echo $u_pic;
         else 
         	echo "images/cd_default.png";
         ?>">
         <span style="display:none"><?php 
         echo $name;
         ?></span>
         </a>
      </div>
    </nav>
  </header>
  <div class="nav-top">
    <ul class="nav-top-ul">
      <li><a class="nav-top-active" href="#">推荐</a></li>
      <li><a href="rank-list.html">排行榜</a></li>
      <li><a href="nav-singer.html">歌手</a></li>
    </ul>
  </div>
  <div class="picture">
    <img class="p_img active" src="images/mv1.jpg" width="100%" height="350px">
    <img class="p_img" src="images/mv2.jpg" width="100%" height="350px">
    <img class="p_img" src="images/mv3.jpg" width="100%" height="350px">
    <img class="p_img" src="images/mv4.jpg" width="100%" height="350px">
    <img class="p_img" src="images/mv5.jpg" width="100%" height="350px">
    <div class="circle"></div>
    <div id='pre'><</div>
    <div id='next'>></div>
  </div>
  <script>
    var picture = document.getElementsByClassName('picture')[0];
    var circle = document.getElementsByClassName('circle')[0];
    var imgs = document.getElementsByClassName('p_img');
    var pre = document.getElementById('pre');
    var next = document.getElementById('next');
    var count = 0;

    // 自动轮播   
      function ChangeImg() {
        count++;
          if(count>=imgs.length) 
          {
            count=0;
          }
          for(var i=0;i<imgs.length;i++){
              imgs[i].style.display='none';
              spans[i].style.backgroundColor = 'rgba(196, 188, 188, 0.712)';
          }
          imgs[count].style.display='block';
          spans[count].style.backgroundColor = 'dodgerblue';
      }
      //设置定时器，每隔两秒切换一张图片
      setInterval(ChangeImg,2000);
      next.onclick = function(){
        for(var i=0;i<imgs.length;i++)
        {
            imgs[i].style.display = 'none';
            spans[count].style.backgroundColor = 'rgba(196, 188, 188, 0.712)';
        }
        ++count;       
        if(count >= imgs.length)
        {
            count = 0;
        }
        imgs[count].style.display = 'block';
        spans[count].style.backgroundColor = 'dodgerblue';
    };
    pre.onclick = function(){
        for(var i=0;i<imgs.length;i++)
        {
          imgs[i].style.display = 'none';
          spans[count].style.backgroundColor = 'rgba(196, 188, 188, 0.712)';
        }
        --count;       
        if(count == -1)
        {
            count = imgs.length-1;
        }
        imgs[count].style.display = 'block';
        spans[count].style.backgroundColor = 'dodgerblue';
    };

    // 加圆点
    var spans = [];
    for(var i=0;i<imgs.length;i++)
    {
        spans[i] = document.createElement('span');
        circle.insertBefore(spans[i],circle.child);       
        spans[0].className = 'active_circle';
    }
    for(var i=0;i<spans.length;i++)
    {       
        spans[i].i = i;
        spans[i].onclick = function(){
            for(var j=0;j<spans.length;j++)
            {
                spans[j].style.backgroundColor = 'rgba(196, 188, 188, 0.712)';
                imgs[j].style.display = 'none';
            }
            var index = this.i;
            count = index;
            // this.className = 'active_circle';
            this.style.backgroundColor = 'dodgerblue';
            imgs[index].style.display = 'block';
        }
    }

    // 获取用户名字
    // var user = document.querySelector('.user span');
    // console.log(user.innerHTML);
  </script>
  <div class="content">
    <div class="content-left">
      <div class="hot">
        <span>热门推荐</span>
        <a>更多</a>
      </div>
      <div class="mv">        
        <div class="mv-information">
        <a href="song.php?song_name=Lemon">
          <img src="images/mv01.jpg" width="100%">
          <br><br>
          Lemon
        </a>
        </div>
       
        <div class="mv-information">
        <a href="song.php?song_name=殿书">
          <img src="images/mv02.jpg" width="100%">
          <br><br>
          [华语速爆新歌]殿书
  </a>
        </div>
        <div class="mv-information">
        <a href="song.php?song_name=打上花火">
          <img src="images/mv03.jpg" width="100%">
          <br><br>
          打上花火
  </a>
        </div>
        <div class="mv-information">
        <a href="song.php?song_name=百万个吻">
          <img src="images/mv04.jpg" width="100%">
          <br><br>
          百万个吻
  </a>
        </div>
        <div class="mv-information">
        <a href="song.php?song_name=One Day">
          <img src="images/mv05.jpg" width="100%">
          <br><br>
          One Day
  </a>
        </div>
        <div class="mv-information">
          <img src="images/mv06.jpg" width="100%">
          <br><br>
          丧丧丧//沉默是最大的哭声我希望你能懂
        </div>
        <div class="mv-information">
          <img src="images/mv07.jpg" width="100%">
          <br><br>
          女人这一生，太累了……
        </div>
        <div class="mv-information">
          <img src="images/mv08.jpg" width="100%">
          <br><br>
          耳朵存在的理由，200首必听欧美歌曲
        </div>
      </div>
      <div class="hot">
        <span>新碟上架</span>
        <a>更多</a>
      </div>
      <div class="newCD">
        <div class="cd">
          <img src="images/cd1.PNG" width="100%">
          夜好<br>
          N.Flying
        </div>
        <div class="cd">
          <img src="images/cd2.PNG" width="100%">
          我和我的祖国<br>
          王菲
        </div>
        <div class="cd">
          <img src="images/cd3.PNG" width="100%">
          Walk On Water<br>
          邓紫棋
        </div>
        <div class="cd">
          <img src="images/cd4.PNG" width="100%">
          将故事写成我们<br>
          林俊杰
        </div>
        <div class="cd">
          <img src="images/cd5.PNG" width="100%">
          Lover<br>
          Taylor Swift
        </div>
      </div>
      <div class="hot">
        <span>榜单</span>
        <a href="rank-list.html">更多</a>
      </div>
      <table cellspacing="0">
        <tr>
          <th>海风音乐飙升榜</th>
          <th>海风音乐新歌榜</th>
          <th>海风音乐原创歌曲榜</th>
        </tr>
        <tr>
          <td><b><span class="color-blue">1</span></b> 那女孩对我说</td>
          <td><b><span class="color-blue">1</span></b> 大田後生仔</td>
          <td><b><span class="color-blue">1</span></b> 不摇滚</td>
        </tr>
        <tr>
          <td><b><span class="color-blue">2</span></b> 绿洲</td>
          <td><b><span class="color-blue">2</span></b> Love poem</td>
          <td><b><span class="color-blue">2</span></b> 卫星</td>
        </tr>
        <tr>
          <td><b><span class="color-blue">3</span></b> 给你</td>
          <td><b><span class="color-blue">3</span></b> 绿洲</td>
          <td><b><span class="color-blue">3</span></b> 海岸</td>
        </tr>
        <tr>
          <td>4 你的答案</td>
          <td>4 与火星的孩子对话</td>
          <td>4 All That</td>
        </tr>
        <tr>
          <td>5 不打搅你的星期几</td>
          <td>5 你的答案</td>
          <td>5 决定</td>
        </tr>
        <tr>
          <td>6 谁的青春不叛逆</td>
          <td>6 大田後生仔</td>
          <td>6 不打搅你的星期几</td>
        </tr>
      </table>
    </div>
    <div class="content-right">
       <div class="login">
         <a href='<?php
        if($result2)
          echo "user-singer.php";
        else
         echo "user.php";
        ?>'><img style="margin-right:20px" src="<?php 
         if($u_pic!='')
         	echo $u_pic;
         else 
         	echo "images/cd_default.png";
         ?>" width="90px" height="90px">
         </a>
         <span>
         <?php 
         echo $name;
         ?>
         </span>
       </div> 
       <div class="singer">
         <div class="singer-top">
          入驻歌手
          <div class="singer-box">
            
            <a href="singer-message.php?singer_name=米津玄师">
            <img src="images/singer-pic.PNG" height="100%">
            <div class="singer-name">
              米津玄师<br><br>
              <font>日本歌手</font>
            </div>  
            </a>         
          </div>
          <div class="singer-box">
            
            <a href="singer-message.php?singer_name=晴愔">
            <img src="images/song/mjx.jpg" height="100%">
              <div class="singer-name">
                晴愔<br><br>
                <font>古风歌手</font>
              </div>
            </a>   
          </div>
          <div class="singer-box">
            <a href="singer-message.php?singer_name=奇然">
              <img src="images/song/殿书.jpg" height="100%">
              <div class="singer-name">
                奇然<br><br>
                <font>古风歌手</font>
              </div>
            </a>   
          </div>
          <div class="singer-box">
          <a href="singer-message.php?singer_name=千菅春香">
            <img src="images/song/pary.jpg" height="100%">
            <div class="singer-name">
            千菅春香<br><br>
              <font>日本歌手</font>
            </div>
  </a>   
          </div>
          <div class="singer-box">
          <a href="singer-message.php?singer_name=锄禾">
            <img src="images/singer5.PNG" height="100%">
            <div class="singer-name">
              锄禾<br><br>
              <font>海风音乐人</font>
            </div>   
          </div>
          <a href="singer.html">
            <button class="apply">申请成为海风音乐人</button>
          </a>
         </div>
       </div>
    </div>
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
