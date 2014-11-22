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
<!--[if IE]>
<script src="js/html5.js"></script>
<![endif]-->
<!--<link href="red.css" rel="stylesheet">
<script src="icheck.js"></script>
<script>
$(document).ready(function(){
  $('input').each(function(){
    var self = $(this),
      label = self.next(),
      label_text = label.text();

    label.remove();
    self.iCheck({
      checkboxClass: 'icheckbox_line-red',
      radioClass: 'iradio_line-red',
      insert: '<div class="icheck_line-icon"></div>' + label_text
    });
  });
});
</script>-->
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
    <div class="block" style="height:300px;width:100%;z-index:1000;margin:0em 0 0;"> <br />
      <br />
	  <h1>发布我的题单</h1>
      <hr />
    </div>
    <div class="block" > <a href="#" class="radiobutton1 choose">选择题</a> <a href="#" class="radiobutton2">填空题</a> <a href="#" class="radiobutton3">主观题</a> 
      <!--   选择题  -->
      <form name="First" action="sub.php" method="post">
      <input type="hidden" name="type" value="a" />
        问题：
        <input name="Cho_nam" type="text">
        </input>
        <br />
        A.
        <input name="Ades">
        </input>
        <br />
        B.
        <input name="Bdes">
        </input>
        <br />
        C.
        <input name="Cdes">
        </input>
        <br />
        D.
        <input name="Ddes">
        </input>
        <br />
        正确选项：
        <select name="choice">
          <option value ="A">A</option>
          <option value ="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
        </select>
        <button type="submit">提交</button>
      </form>
	  
      <!--  选择题 --> 
      <!--</div> 
           <div class="block" >
            <a href="#" class="radiobutton1">选择题</a>
            <a href="#" class="radiobutton2 choose" >填空题</a>
            <a href="#" class="radiobutton3">主观题</a>--> 
      <!--   填空题  --> 
      <!--<form>
            问题：<input></input><br />
           	回答：<textarea></textarea>
            </form>--> 
      <!--  填空题 --> 
      <!--</div>
            <div class="block" >
            <a href="#" class="radiobutton1">选择题</a>
            <a href="#" class="radiobutton2">填空题</a>
            <a href="#" class="radiobutton3 choose">主观题</a>--> 
      <!--   主观题  --> 
      <!--<form>
            问题：<input></input><br />
           	回答：<textarea></textarea>
            </form>--> 
      <!--  主观题 --> 
    </div>
    <!--<ul>
            <li>题目：<input type="text"/>
            </li>
            </ul>--> 
    <!--<div class="block" >
            <a href="#" class="addbutton"><i class="fa fa-fw fa-plus-square-o"></i>新增题目</a>
            </div>--> 
    <!-- ******************************************编辑区*************************************************--> 
  </div>
</div>
<script >
$(document).ready(function(){
	for(var i=0;i<20;i++)
	{
		$(".gridtable").append("<tr><td>example</td><td>example</td><td>example</td><td>example</td><td>example</td><td>example</td></tr>");
		}
		<!--$("#topbar").smartFloat();-->
	 $("tr:even td").css("background-color","#dedede");
	/*$(".content").on("click",".addbutton",function(){
		 $(this).parent().before("<div class='block'>"+button1click+"</div>");
		 });*/
	$("body").on("click",".addbutton",function(){
		$(this).parent().prepend(newquestion);
		});
	$(".block").on("click",".radiobutton1",function(){
		//$(this).parent().empty().prepend(button1click);
		$(this).parent().empty().prepend(button1click);
		});
	$(".block").on("click",".radiobutton2",function(){
		$(this).parent().empty().prepend(button2click);
		});
	$(".block").on("click",".radiobutton3",function(){
		$(this).parent().empty().prepend(button3click);
		});
	//$(".radiobutton3").on("click",function (){
	//	$(".block:first").prepend("<h1>hqhqh</h1>");
	//	});
});
var newquestion = '<div class="block" ><a href="#" class="radiobutton1">选择题</a>&nbsp;<a href="#" class="radiobutton2">填空题</a>&nbsp;<a href="#" class="radiobutton3">主观题</a></div>';
var button1click = '<a href="#" class="radiobutton1 choose">选择题</a>&nbsp;<a href="#" class="radiobutton2">填空题</a>&nbsp;<a href="#" class="radiobutton3">主观题</a><form name="First" action="sub.php" method="post"><input type="hidden" name="type" value="a" />问题：<input name="Cho_nam" type="text"></input><br />A.<input></input><br />B.<input></input><br />C.<input></input><br />D.<input></input><br />正确选项：<select name="choice"><option value ="A">A</option><option value ="B">B</option><option value="C">C</option><option value="D">D</option></select><button type="submit">提交</button></form><!--  选择题 -->';
var button2click = '<a href="#" class="radiobutton1">选择题</a>&nbsp;<a href="#" class="radiobutton2 choose" >填空题</a>&nbsp;<a href="#" class="radiobutton3">主观题</a><form name="Second" action="sub.php" method="post"><input type="hidden" name="type" value="b" />问题：<input name="Bla_nam"></input><br />回答：<input name="Bla_text"></input><div><button type="submit">提交</button></div></form><!--  填空题 -->';
var button3click = '<a href="#" class="radiobutton1">选择题</a>&nbsp;<a href="#" class="radiobutton2">填空题</a>&nbsp;<a href="#" class="radiobutton3 choose">主观题</a><form name="Second" action="sub.php" method="post"><input type="hidden" name="type" value="c" />问题：<input name="Ans_nam"></input><br /><div><button type="submit">提交</button></div></form><!--  主观题 -->';
</script> 
<!--<script>
$.fn.smartFloat = function() {
 var position = function(element) {
  var top = element.position().top, pos = element.css("position");
  $(window).scroll(function() {
   var scrolls = $(this).scrollTop();
   if (scrolls > top) {
    if (window.XMLHttpRequest) {
     element.css({
      position: "fixed",
      top: 0
     }); 
    } else {
     element.css({
      top: scrolls
     }); 
    }
   }else {
    element.css({
     position: pos,
     top: top
    }); 
   }
  });
 };
 return $(this).each(function() {
  position($(this));      
 });
};
</script>--> 
<script src="classie.js"></script> 
<script src="main3.js"></script>
</body>
</html>