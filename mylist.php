<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Off-Canvas Menu Effects - Elastic</title>
<link rel="stylesheet" type="text/css" href="normalize.css" />
<link rel="stylesheet" type="text/css" href="demo.css" />
<script type="text/javascript" src="jquery.min.js"></script>
<!--��Ҫ��ʽ-->
<link rel="stylesheet" type="text/css" href="font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="menu_elastic.css" />
<script src="snap.svg-min.js"></script>
</head>
<body>
<div class="menu-wrap">
  <nav class="menu">
    <div class="icon-list"> <a href="mylist.php"><i class="fa fa-fw fa-file-text"></i><span>我的题单</span></a> <a href="establishmylist.php"><i class="fa fa-fw fa-bell-o"></i><span>发布题单</span></a> <a href="answerlist.php"><i class="fa fa-fw fa-envelope-o"></i><span>回答题单</span></a>  <a href="rank.html"><i class="fa fa-fw fa-bar-chart-o"></i><span>排行榜</span></a> <a href="#"><i class="fa fa-fw fa-comment-o"></i><span><?php echo $_COOKIE["user"]; ?></span></a><a href="index.php"><i class="fa fa-fw fa-newspaper-o"></i><span>注销</span></a> </div>
  </nav>
  <button class="close-button" id="close-button">Close Menu</button>
  <div class="morph-shape" id="morph-shape" data-morph-open="M-1,0h101c0,0,0-1,0,395c0,404,0,405,0,405H-1V0z"> <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 100 800" preserveAspectRatio="none">
    <path d="M-1,0h101c0,0-97.833,153.603-97.833,396.167C2.167,627.579,100,800,100,800H-1V0z"/>
    </svg> </div>
</div>
<button class="menu-button" id="open-button">Open Menu</button>
 
<div class="content-wrap">
  <div class="content"> 
    <!--<div class="topbar" id="topbar">--> 
    <!--<h1>sads</h1>--> 
    <!--<a href="#" class="current-demo">首页</a>
            <a href="#">发布题单</a>
            <a href="#">回答题单</a>
            <a href="#">我的···</a>
            <a href="#">排行榜</a>
            <a href="#">登出</a>
            </div>--> 
    <!-- ******************************************编辑区*************************************************-->
    <div class="block" style="height:100%;width:100%;z-index:1000;margin:0em 0 0;"> <br />
      <br />
	  <h1>我的题单</h1>
      <hr />
    </div>
	<div class="block" style="height:100%;width:100%;z-index:1000;margin:0em 0 0;"> <br />
      <br />
	<h2>
	<?php
	$con = mysql_connect("localhost","root","");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("ques", $con);
	$user=$_COOKIE["user"];
	$result = mysql_query("SELECT * FROM ques WHERE author='$user'");
	echo "<center><table border='1'>
	<tr>
<th>Name</th>
<th>Author</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td><a href = 'watchlist.php?qname=".$row['qname']."&author=".$row['author']."'>" . $row['qname'] . "</td>";
  echo "<td>" . $row['author'] . "</td>";
  echo "</tr>";
  }
echo "</table></center>";

$result = mysql_query("SELECT * FROM at WHERE player='$user' and answered='1'");
echo "<center><table border='1'>
	<tr>
<th>Name</th>
<th>Author</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td><a href = 'watchansweredlist.php?qname=".$row['qname']."&author=".$row['author']."'>" . $row['qname'] . "</td>";
  echo "<td>" . $row['author'] . "</td>";
  echo "</tr>";
  }
echo "</table></center>";
mysql_close($con);
?>
</h2>
      <hr />
    </div>
    </div>
  </div>
</div>
<script src="classie.js"></script> 
<script src="main3.js"></script>
</body>
</html>