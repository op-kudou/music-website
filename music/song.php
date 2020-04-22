<?php 
    error_reporting(0);
    session_start();
    $name = $_SESSION['name'];
    $s_name=$_POST['songname'];
    $alert="";
    if($_GET['song_name'])
    {
        $s_name=$_GET['song_name'];
    }
	$con=mysql_connect('localhost','root','root');
	mysql_select_db("music",$con);
	$sql="select * from song where song_name like '%$s_name%'";
	$result=mysql_query($sql,$con);
	if($row=mysql_fetch_array($result))
	{
		$song_name=$row['song_name'];
		$song_pic=$row['song_pic'];
		$song_file=$row['song_file'];
		$lyric=$row['lyric'];
	}
	else 
        {

        }
    $sql1="select s_name,s_pic from singer where s_id=(
        select s_id from singing where song_id=(
        select song_id from song where song_name='$song_name'))";
    $result1=mysql_query($sql1,$con);
    if($row1=mysql_fetch_array($result1))
    {
        $singer_name=$row1['s_name'];
        $singer_pic=$row1['s_pic'];
    }
    $_SESSION['singer_name'] = $singer_name;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>歌曲信息</title>
<link rel="stylesheet" href="css/song.css">
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
      <div class="user">
        <a href="user.php"><img style="margin-right:20px" src="<?php 
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
      <li><a href="#">推荐</a></li>
      <li><a href="rank-list.html">排行榜</a></li>
      <li><a href="nav-singer.html">歌手</a></li>
    </ul>
  </div>
  <div class="content">
        <div class="song-message">
            <div class="song-message-left">
                <img src="<?php 
                if($song_pic != '')
                    echo $song_pic;
                else {
                    if($singer_pic !="")
                    echo $singer_pic;
                else 
                    echo 'images/cd_default.PNG';
                }
                
                ?>">
            </div>
            <div class="song-message-right">
                <span class="song-name"><?php 
                if($song_name)
                    echo $song_name;
                else
                    echo "<font style='color:red;font-size:30px'>没有找到该歌曲</font>";?></span>
                <form id="song" action="">
                    <label for="">歌手：</label>
                    <a href="singer-message.php"><?php 
                        echo $singer_name;
                    ?></a>
                    <audio autoplay="autoplay" loop='loop' controls="controls" src="<?php echo $song_file; ?>">
</audio>
                    <label for="">歌词：</label><br>
                    <div class="lyric">
                    <div class="lyric_text1">  
<?php 
	echo $lyric;
?>
        </div>
                    </div>
                    <script>
                        var audio = document.getElementsByTagName("audio")[0];
                        var pic = document.querySelector('.song-message-left img');
                        window.onload = function(){
                            audio.play();                           
                        }
                        

                        var lyric = document.getElementsByClassName('lyric_text1')[0];
                        var res = lyric.innerHTML;
                        lyric.innerHTML = '';
                        var newres = '';
                        for(var i=0;i<res.length;i++)
                        {                           
                            newres += res[i];
                            if((/\s/).test(res[i]))
                            {
                                var p = document.createElement('p');
                                p.innerHTML = newres;
                                p.style.textAlign = 'center';
                                p.style.fontSize = '18px';
                                p.style.display = 'block';
                                p.style.lineHeight = '40px';
                                lyric.appendChild(p,lyric.child);
                                newres = ' ';
                            }                               
                        }

                        audio.addEventListener("playing",function()
                        {
                            pic.className = 'rotate';
                            lyric.className="lyric_text1 lyric_text";
                        });
                        audio.addEventListener("pause",function()
                        {
                            pic.className = '';
                            lyric.className="lyric_text1 ";
                        });
                    </script>
                </form>
            </div>
        </div>
        <div class="comment">
            <div class="comment-top">
                评论
            </div>
            <textarea name="word" id="word" cols="100" rows="5" placeholder="期待你的评论..."></textarea>
            <button class="btn-comment">评论</button>
            <div class="clear"></div>
            <span>精彩评论</span>
            <ul class="comment_ul">
                <li>
                    <div class="user-name">
                        <span class="blue">名字取这么长也会重复</span>
                         : 全书最直的人穿一身基佬紫
                    </div>
                    <span class="content-left">
                            1月22日 19:42
                    </span>
                    <span class="content-right">
                        <span class='like'>❤</span>
                        <span class='like_count'>2451赞</span>
                    </span>
                    <div class="clear"></div>
                    <hr>
                </li>
                <li>
                    <div class="user-name">
                        <span class="blue">黑暗无边1904</span>
                        : 江厌离道：“你要跟我说什么事？” 魏无羡笑道：“没什么事呀。我就进来打个滚。” 
                        说着，真的在地上打了个滚，江厌离问道：“羡羡，你几岁呀？” 魏无羡道：“三岁啦。”
                    </div>
                    <span class="content-left">
                            1月22日 18:29
                    </span>
                    <span class="content-right">
                        <span class='like'>❤</span>
                        <span class='like_count'>964赞</span>
                    </span>
                    <div class="clear"></div>
                    <hr>
                </li>
                <li>
                    <div class="user-name">
                        <span class="blue">黑岩Hokai</span>
                        ：蓝二哥哥醉酒时wifi问：“江澄如何？”皱眉：“哼。”魏无羡：“温宁如何。”冷淡：“呵。”魏无羡笑眯眯指了指自己
                        ：“这个如何？”蓝忘机：“我的。”“……”蓝忘机盯着他，一字一顿，清晰无比地道：“我的。”
                    </div>
                    <span class="content-left">
                            1月24日 08:45
                    </span>
                    <span class="content-right">
                        <span class='like'>❤</span>
                        <span class='like_count'>742赞</span>
                    </span>
                    <div class="clear"></div>
                    <hr>
                </li>
                <li>
                    <div class="user-name">
                        <span class="blue">
                                枝垂萤-九</span>
                            : 全书死了那么多人，哪怕是晓星辰，也留下了几缕魂魄残存，但是，若是论灰飞烟灭
                            ，恐怕只有温情阿姐了吧。
                    </div>
                    <span class="content-left">
                            1月22日 19:42
                    </span>
                    <span class="content-right">
                        <span class='like'>❤</span>
                        <span class='like_count'>532赞</span>
                    </span>
                    <div class="clear"></div>
                    <hr>
                </li>
                <li>
                    <div class="user-name">
                        <span class="blue">黑暗无边1904</span>
                        : “是！蓝曦臣，我这一生，杀父杀兄杀妻杀子杀师杀友，什么坏事没
                        做过！”他倒吸了一口气，仿佛肺部被刺穿，“可我独独没有想过要害你……”心疼瑶妹QAQ
                    </div>
                    <span class="content-left">
                            1月22日 16:56
                    </span>
                    <span class="content-right">
                        <span class='like'>❤</span>
                        <span class='like_count'>213赞</span>
                    </span>
                    <div class="clear"></div>
                    <hr>
                </li>
                <li>
                    <div class="user-name">
                        <span class="blue">Mikido1703</span>
                            : 江澄做了一个很长很累的梦，梦里是年少时的往事，幸福而安稳。可在梦
                            的最后，魏婴突然站了起来向着站在远处的蓝湛的方向跑去，拉住了那人
                            的手，然后回头对自己笑了笑说：我们走了，别送了。#云梦双杰#
                    </div>
                    <span class="content-left">
                            1月22日 17:11
                    </span>
                    <span class="content-right">
                        <span class='like'>❤</span>
                        <span class='like_count'>124赞</span>
                    </span>
                    <div class="clear"></div>
                    <hr>
                </li>
                <li>
                    <div class="user-name">
                        <span class="blue">A-K-D-S</span>
                            : 魏无咸，里说过将来我做家具，里做我的虾须一辈子扶持我，永远
                            不背叛我不背叛江家，我吻你，这话都是辣个缩滴！里凭摩丝，凭摩丝不告森我！然而即使
                            这样还是爱舅舅
                    </div>
                    <span class="content-left">
                            1月23日 20:31
                    </span>
                    <span class="content-right">
                        <span class='like'>❤</span>
                        <span class='like_count'>100赞</span>
                    </span>
                    <div class="clear"></div>
                    <hr>
                </li>
                <li>
                    <div class="user-name">
                        <span class="blue">诵卷晓世</span>
                            : 我最喜欢 金凌 【三无】唱得这一句 眉间这点丹砂轮不着外人管教 仙中杜丹天生该
                            骄傲 无奈独来独往剩一柄长剑桀骜 阴错阳差恩怨何时能了....大爱
                    </div>
                    <span class="content-left">
                            1月22日 19:42
                    </span>
                    <span class="content-right">
                        <span class='like'>❤</span>
                        <span class='like_count'>98赞</span>
                    </span>
                    <div class="clear"></div>
                    <hr>
                </li>
            </ul>
        </div>
        <script>
            

            var comment = document.getElementsByClassName('comment')[0];
            var songName = document.getElementsByClassName('song-name')[0];
            if(songName.childElementCount)
            {
                comment.style.display = 'none';
            }
            var ul = document.getElementsByClassName('comment_ul')[0]
            var like = document.getElementsByClassName('like');
            var likeCount = document.getElementsByClassName('like_count');
            var flag = true;
            ul.addEventListener('click',function(e){
                var count = parseInt(e.target.nextElementSibling.innerHTML)
                if(e.target.className === 'like' && flag){
                    flag = false;
                    count++;
                    e.target.style.color = 'red';
                    e.target.nextElementSibling.innerHTML = count + '赞';
                }else{
                    if(count != 0){
                        flag = true;
                        count--;
                        e.target.style.color = 'lightblue';
                        e.target.nextElementSibling.innerHTML = count + '赞';
                    }
                 }
            });

            // 添加评论功能
            var comment = document.getElementsByClassName('btn-comment')[0];
            var word = document.getElementById('word');
            var user = document.querySelector('.user span');
            var data = new Date();
            userName = user.innerHTML;
            comment.onclick = function()
            {
                var month = data.getMonth()+1;
                var day = data.getDate();
                var hour = data.getHours();
                var minutes = data.getMinutes();
                var wordContent = word.value;

                var li = document.createElement('li');
                ul.insertBefore(li,ul.children[0]);

                var div = document.createElement('div');
                li.insertBefore(div,li.child);
                div.className = 'user-name';

                var span = document.createElement('span');
                div.insertBefore(span,div.child);
                span.className = 'blue';
                span.innerHTML = userName;
                
                var span2 = document.createElement('span');
                div.insertBefore(span2,div.child);
                span2.innerHTML = ": " + wordContent;

                var span3 = document.createElement('span');
                li.insertBefore(span3,li.child);
                span3.className = 'content-left';                
                span3.innerHTML = month + "月" + day + "日 " + hour + ":" + minutes;

                var span4 = document.createElement('span');
                li.insertBefore(span4,li.child);
                span4.className = 'content-right';  

                var span5 = document.createElement('span');
                span4.insertBefore(span5,span4.child);
                span5.className = 'like';  
                span5.innerHTML = "❤ ";

                var span6 = document.createElement('span');
                span4.insertBefore(span6,span4.child);
                span6.className = 'like_count';  
                span6.innerHTML = "0赞";

                var div2 = document.createElement('div');
                li.insertBefore(div2,li.child);
                div2.className = 'clear';

                var hr = document.createElement('hr');
                li.insertBefore(hr,li.child);   
            }

        </script>
  </div>
  <a class="top" href="#">
        TOP
      </a>
  <div class="clear"></div>
  <div class="bottom">
    版权所有&copy;吴蕾-1821010127
  </div>
</body>
</html>
                