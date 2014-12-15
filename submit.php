<!DOCTYPE html>
<html lang="en" class="no-js">
 <head> 
  <meta charset="UTF-8" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1" /> 
  <title>题单发布</title> 
  <!--[if IE]>
<script src="js/html5.js"></script>
<![endif]--> 
  <link href="dist/css/bootstrap.min.css" rel="stylesheet" /> 
 </head> 
 <body> 
  <div class="container-fluid" style="background:url(background.png) repeat;min-height:583px;"> 
   <div class="row-fluid"> 
    <div class="col-md-12"> 
     <div class="page-header"> 
      <h1 id="test"> QA 社交问答<small>和你的小伙伴更亲近</small> </h1> 
      <div style="position:absolute;right:0px;top:10px;"> 
       <a href="#">微博入口</a> 
      </div> 
     </div> 
     <ul class="nav nav-tabs"> 
      <!--style="background:#333;border-radius: 4px;"--> 
      <li> <a id="myList" href="MyList.html">&nbsp;&nbsp;<i class="glyphicon glyphicon-list"></i>&nbsp;我的题单&nbsp;&nbsp;&nbsp;</a> </li> 
      <li> <a id="rankList" href="mylist_rank_chosen.html">&nbsp;&nbsp;<i class="glyphicon glyphicon-sort-by-order"></i>&nbsp;排行榜&nbsp;&nbsp;</a> </li> 
      <li> <a id="atMe" href="atme.html">&nbsp;&nbsp;<i class="glyphicon glyphicon-tasks"></i>&nbsp;@我的&nbsp;&nbsp;&nbsp;</a> </li> 
      <li class="active"> <a id="establishNewList" class="disabled">&nbsp;&nbsp;<i class="glyphicon glyphicon-plus"></i>&nbsp;发布新题单&nbsp;&nbsp;&nbsp;</a> </li> 
     </ul> 
     <div class="row-fluid"> 
      <div class="col-md-1"> 
      </div> 
      <div class="col-md-10" style="text-align:center;"> 
      <?php
		$n=1;
		while(1){
			$choose="no answer";
			if(isset($_GET[$n.""])){
				$s=$_GET[$n.""];
				switch($s){
					case "choose":
						echo "question".$n.":".$_GET[$n."question"]."<br />";
						echo "A.".$_GET[$n."answerA"]."<br />";
						echo "B.".$_GET[$n."answerB"]."<br />";
						echo "C.".$_GET[$n."answerC"]."<br />";
						echo "D.".$_GET[$n."answerD"]."<br />";
						for($i=0;$i<4;$i++){
							if(isset($_GET[(string)$n.(string)$i])){
								switch($i){
									case 0:
										$choose="A";
										break;
									case 1:
										$choose="B";
										break;
									case 2:
										$choose="C";
										break;
									case 3:
										$choose="D";
										break;
								}
								break;//该句选择 单选题多选时 保留最后的还是最先的 去掉该句保留最后 否则保留最前
							}
						}
						echo "choose:".$choose."<br />";
						break;
					case "fillblank":
						echo "question".$n.":     ".$_GET[$n."question"]."<br />";
						echo "answer:       ".$_GET[$n."answer"]."<br />";
						break;
					case "answer":
						echo "question".$n.":     ".$_GET[$n."question"]."<br />";
						echo "answer:     ".$_GET[$n."answer"]."<br />";
						break;
				}
				$n++;
			}
			else{
				break;
			}
		}
		?>
      </div> 
     </div> 
     <div class="row-fluid"> 
      <div class="col-md-1"> 
      </div> 
     </div> 
    </div> 
   </div> 
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
   <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script> 
   <!-- Include all compiled plugins (below), or include individual files as needed --> 
   <script src="dist/js/bootstrap.min.js"></script> 
  </div>  
 </body>
</html>