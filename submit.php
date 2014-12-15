<!DOCTYPE html>
<?php
include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );
$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
$str=$_COOKIE['weibojs_'.$o->client_id];
parse_str($str,$arr);
$p = new SaeTClientV2( WB_AKEY , WB_SKEY , $arr['access_token']);
$data = $p->show_user_by_id($_REQUEST['uid']);
?>
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
       <a href="#">欢迎，<?php echo $data['name']; ?></a> 
      </div> 
     </div> 
     <ul class="nav nav-tabs"> 
      <!--style="background:#333;border-radius: 4px;"--> 
      <li> <a id="myList" href="MyList.php?uid=<?php echo $_REQUEST['uid']; ?>">&nbsp;&nbsp;<i class="glyphicon glyphicon-list"></i>&nbsp;我的题单&nbsp;&nbsp;&nbsp;</a> </li> 
      <li> <a id="rankList" href="mylist_rank_chosen.php?uid=<?php echo $_REQUEST['uid']; ?>">&nbsp;&nbsp;<i class="glyphicon glyphicon-sort-by-order"></i>&nbsp;排行榜&nbsp;&nbsp;</a> </li> 
      <li> <a id="atMe" href="atme.php?uid=<?php echo $_REQUEST['uid']; ?>">&nbsp;&nbsp;<i class="glyphicon glyphicon-tasks"></i>&nbsp;@我的&nbsp;&nbsp;&nbsp;</a> </li> 
      <li class="active"> <a id="establishNewList" class="disabled">&nbsp;&nbsp;<i class="glyphicon glyphicon-plus"></i>&nbsp;发布新题单&nbsp;&nbsp;&nbsp;</a> </li> 
     </ul> 
     <div class="row-fluid"> 
      <div class="col-md-1"> 
      </div> 
      <div class="col-md-10" style="text-align:center;"> 
      <?php
	  $qname=$_POST["qname"];
	  $type1="";$name1="";$ansA1="";$ansB1="";$ansC1="";$ansD1="";$ans1="";
	  $type2="";$name2="";$ansA2="";$ansB2="";$ansC2="";$ansD2="";$ans2="";
	  $type3="";$name3="";$ansA3="";$ansB3="";$ansC3="";$ansD3="";$ans3="";
	  $type4="";$name4="";$ansA4="";$ansB4="";$ansC4="";$ansD4="";$ans4="";
	  $type5="";$name5="";$ansA5="";$ansB5="";$ansC5="";$ansD5="";$ans5="";
		$n=1;
		while(1){
			$choose="no answer";
			if(isset($_POST[$n.""])){
				$s=$_POST[$n.""];
				switch($s){
					case "choose":
						for($i=0;$i<4;$i++){
							if(isset($_POST[(string)$n.(string)$i])){
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
						if($n==1)
						{
							$type1=1;
							$name1=$_POST[$n."question"];
							$ansA1=$_POST[$n."answerA"];
							$ansB1=$_POST[$n."answerB"];
							$ansC1=$_POST[$n."answerC"];
							$ansD1=$_POST[$n."answerD"];
							$ans1=$choose;
						}
						else if($n==2)
						{
							$type2=1;
							$name2=$_POST[$n."question"];
							$ansA2=$_POST[$n."answerA"];
							$ansB2=$_POST[$n."answerB"];
							$ansC2=$_POST[$n."answerC"];
							$ansD2=$_POST[$n."answerD"];
							$ans2=$choose;
						}
						else if($n==3)
						{
							$type1=1;
							$name1=$_POST[$n."question"];
							$ansA1=$_POST[$n."answerA"];
							$ansB1=$_POST[$n."answerB"];
							$ansC1=$_POST[$n."answerC"];
							$ansD1=$_POST[$n."answerD"];
							$ans1=$choose;
						}
						else if($n==4)
						{
							$type1=1;
							$name1=$_POST[$n."question"];
							$ansA1=$_POST[$n."answerA"];
							$ansB1=$_POST[$n."answerB"];
							$ansC1=$_POST[$n."answerC"];
							$ansD1=$_POST[$n."answerD"];
							$ans1=$choose;
						}
						else if($n==5)
						{
							$type1=1;
							$name1=$_POST[$n."question"];
							$ansA1=$_POST[$n."answerA"];
							$ansB1=$_POST[$n."answerB"];
							$ansC1=$_POST[$n."answerC"];
							$ansD1=$_POST[$n."answerD"];
							$ans1=$choose;
						}
						break;
					case "answer":
						if($n==1)
						{
							$type1=2;
							$name1=$_POST[$n."question"];
							$ans1=$_POST[$n."answer"];
						}
						else if($n==2)
						{
							$type2=2;
							$name2=$_POST[$n."question"];
							$ans2=$_POST[$n."answer"];
						}
						else if($n==3)
						{
							$type3=2;
							$name3=$_POST[$n."question"];
							$ans3=$_POST[$n."answer"];
						}
						else if($n==4)
						{
							$type4=2;
							$name4=$_POST[$n."question"];
							$ans4=$_POST[$n."answer"];
						}
						else if($n==5)
						{
							$type5=2;
							$name5=$_POST[$n."question"];
							$ans5=$_POST[$n."answer"];
						}
						
						break;
				}
				$n++;
			}
			else{
				break;
			}
		}
		echo $qname;
		$con = mysql_connect("localhost","root","");
		mysql_select_db("ques",$con);
		$query = "SELECT * FROM ques WHERE uid='$_REQUEST[uid]' and qname='$qname'";
		$result = mysql_query($query);
		$row = mysql_fetch_row($result);
		if($row==0)
		{
			mysql_query("INSERT INTO ques (uid, qname, type1, name1, ansA1, ansB1, ansC1, ansD1, ans1, type2, name2, ansA2, ansB2, ansC2, ansD2, ans2, type3, name3, ansA3, ansB3, ansC3, ansD3, ans3, type4, name4, ansA4, ansB4, ansC4, ansD4, ans4, type5, name5, ansA5, ansB5, ansC5, ansD5, ans5)
			VALUES ('$_REQUEST[uid]','$qname','$type1','$name1','$ansA1','$ansB1','$ansC1','$ansD1','$ans1','$type2','$name2','$ansA2','$ansB2','$ansC2','$ansD2','$ans2','$type3','$name3','$ansA3','$ansB3','$ansC3','$ansD3','$ans3','$type4','$name4','$ansA4','$ansB4','$ansC4','$ansD4','$ans4','$type5','$name5','$ansA5','$ansB5','$ansC5','$ansD5','$ans5')");
			?>
			<script>
			function JumpUrl(){
				location='friend.php?uid=<?php echo $_REQUEST['uid']; ?>';
			}
			document.write("Successful submit!");
			setTimeout('JumpUrl()',10000);
			</script>
			<?php
			exit;
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